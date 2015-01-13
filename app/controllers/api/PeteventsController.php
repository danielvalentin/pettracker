<?php

class PeteventsController extends Controller {

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
		$petevent = Petevent::find($id);

		return Response::json(array(
			'petevent' => $petevent->info()
		));
	}

	public function create()
	{
		if(!Auth::check())
		{
			return Response::json(array(
				'errors' => 'You must be logged in to create an event'
			));
		}
		$text = Input::get('petevent.text');
		$user = Auth::user();

		$pet = Pet::find(Input::get('petevent.pet_id'));
		if(!$pet)
		{
			return Response::json(array(
				'errors' => 'That pet was not found. Has it been deleted?'
			));
		}

		$validator = Validator::make(array(
			'text' => $text
		), array(
			'text' => array(
				'required',
				'min:2',
				'max:150'
			)
		));

		if($validator->passes())
		{
			$petevent = new Petevent();
			$petevent->pet_id = $pet->id;
			$petevent->user_id = $user->id;
			$petevent->text = $text;
			$petevent->created_at = time();
			$petevent->updated_at = time();

			$petevent->save();

			return Response::json(array(
				'petevent' => $petevent->info()
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
