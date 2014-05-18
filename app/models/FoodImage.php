<?php

class FoodImage extends Eloquent
{
	public $timestamps = false;
	
	public function food_instance()
	{
		return $this->belongsTo('food_instance', 'food_instances_id');
	}
}