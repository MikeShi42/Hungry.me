<?php

class food_instance extends Eloquent {
	public $timestamps = false;
	
	public function restaurant()
	{
		return $this->belongsTo('restaurant', 'restaurants_id');
	}
	public function food_type()
	{
		return $this->belongsTo('food_type', 'food_types_id');
	}
}

?>