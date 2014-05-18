<?php

class review extends Eloquent {
	public $timestamps = false;

	public function User()
	{
		$this->belongsTo('User', 'users_id');
	}
	
	public function food_instance()
	{
		$this->belongsTo('food_instance', 'food_instance_id');
	}
}

?>