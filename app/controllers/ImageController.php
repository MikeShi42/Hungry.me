<?php

class ImageController extends BaseController
{
	function GetAndSaveImage()
	{
		$message = 'Upload failed!';
		if(Input::hasFile('image') && Input::file('image')->isValid())
		{
			$file = Input::file('image');
			$type = Input::get('type');
			if($type == 'restaurant' && Input::has('restaurants_id'))
			{
				$image = new Restaurant_Image;
				$image->restaurants_id = Input::get('restaurants_id');
				$image->imageData = base64_encode(File::get($file));
				$image->save();
				$message = 'Upload successful!';
			}else if($type == 'food' && Input::has('food_instances_id'))
			{
				$food_instances_id = Input::get('food_instances_id');
				$food_instance = food_instance::find($food_instances_id);
				$image = new Food_Image;
				$image->food_instances_id = $food_instances_id;
				$image->food_instances_food_types_id = $food_instance->food_types_id;
				$image->food_instances_restaurants_id = $food_instance->restaurants_id;
				$image->imageData = base64_encode(File::get($file));
				$image->save();
				$message = 'Upload successful!';
			}
		}
		return Redirect::to('imgupload')->with('message', $message);
	}
}