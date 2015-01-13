<?php

class Household extends Eloquent {
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function users()
	{
		return $this->belongsToMany('User', 'households_users');
	}

	public function pets()
	{
		return $this->hasMany('Pet');
	}

	public function info()
	{
		return array(
			'id' => $this->id,
			'user_id' => $this->user_id,
			'name' => $this->name,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'pets' => $this->pets->lists('id') 
		);
	}

}
