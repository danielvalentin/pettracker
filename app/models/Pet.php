<?php

class Pet extends Eloquent {
	
	public function household()
	{
		return $this->belongsTo('Household');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function petevents()
	{
		return $this->hasMany('Petevent');
	}

	public function formatdate($stamp)
	{
		$time = strtotime($stamp);
		return date('Y-m-d H:i:s');
	}

	public function info()
	{
		return array(
			'id' => $this->id,
			'household_id' => $this->household_id,
			'user_id' => $this->user_id,
			'name' => $this->name,
			'created_at' => customdate::format($this->created_at),
			'updated_at' => customdate::format($this->updated_at),
			'household' => $this->household_id,
			'petevents' => $this->petevents->lists('id')
		);
	}

}
