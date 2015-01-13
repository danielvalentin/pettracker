<?php

class Petevent extends Eloquent {
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function pet()
	{
		return $this->belongsTo('Pet');
	}

	public function info()
	{
		return array(
			'id' => $this->id,
			'pet_id' => $this->household_id,
			'user_id' => $this->user_id,
			'text' => $this->text,
			'created_at' => customdate::format($this->created_at),
			'updated_at' => customdate::format($this->updated_at),
			'pet' => $this->pet_id
		);
	}

}
