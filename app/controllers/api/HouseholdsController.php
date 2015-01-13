<?php

class HouseholdsController extends Controller {

	public function getAll()
	{
		if(!Auth::check())
		{
			return Response::json(array(
				'errors' => 'You must be logged in to create a household'
			));
		}
		
		$user = Auth::user();
		$arr = array();
		$households = $user->households->all();
		if(!empty($households))
		{
			foreach($households as $household)
			{
				$arr[] = $household->info();
			}
		}

		return Response::json(array(
			'households' => $arr
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
		$household = $user->households->find($id);

		return Response::json(array(
			'household' => $household->info()
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
		$name = Input::get('household.name');
		$user = Auth::user();

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
			$household = new Pet();
			$household->user_id = $user->id;
			$household->name = $name;
			$household->created_at = time();
			$household->updated_at = time();

			$pet->save();

			return Response::json(array(
				'household' => $household->info()
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
