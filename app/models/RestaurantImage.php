<?php

class RestaurantImage extends Eloquent
{
	public $timestamps = false;
	
	public function restaurant()
	{
		return $this->belongsTo('restaurant', 'restaurants_id');
	}
}