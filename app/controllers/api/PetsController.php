<?php

class PetsController extends Controller {

	public function getAll($id)
	{
		if(!Auth::check())
		{
			return Response::json(array(
				'errors' => 'You must be logged in to create a household'
			));
		}
		
		$user = Auth::user();
		$pets = $user->households->find($id)->pets->each(function($pet){
			return $pet->info();
		});

		return Response::json(array(
			'pets' => $pets
		));
	}

	public function get($id)
	{
		if(!Auth::check())
		{
			return Response::json(array(
				'errors' => 'You must be logged in to create a household'
			));
		}
		
		$user = Auth::user();
		$pet = $user->pets->find($id);

		return Response::json(array(
			'pets' => $pet->info(),
			'petevents' => $pet->petevents->all()
		));
	}

	public function create()
	{
		if(!Auth::check())
		{
			return Response::json(array(
				'errors' => 'You must be logged in to create a household'
			));
		}
		$name = Input::get('pet.name');
		$user = Auth::user();

		$household = Household::find(Input::get('pet.household_id'));
		if(!$household)
		{
			return Response::json(array(
				'errors' => 'That household was not found. Has it been deleted?'
			));
		}
		$householdusers = $household->users->lists('id');
		$householdusers[] = $household->user_id;
		$ids = implode(',',$householdusers);
		if(!in_array($user->id, $householdusers))
		{
			return Response::json(array(
				'errors' => 'That household was not found. Has it been deleted?'
			));
		}

		$validator = Validator::make(array(
			'name' => $name
		), array(
			'name' => array(
				'required',
				'min:2',
				'max:75'
			)
		));

		if($validator->passes())
		{
			$pet = new Pet();
			$pet->household_id = $household->id;
			$pet->user_id = $user->id;
			$pet->name = $name;
			$pet->created_at = time();
			$pet->updated_at = time();

			$pet->save();

			return Response::json(array(
				'pet' => $pet->info()
			));
		}
		else
		{
			return Response::json(array(
				'errors' => 'Name must be between 2 and 75 characters'
			));
		}

	}

}
