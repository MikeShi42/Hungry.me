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
				$image = new RestaurantImage;
				$image->restaurants_id = Input::get('restaurants_id');
				$image->imageData = base64_encode(File::get($file));
				$image->save();
				$message = 'Upload successful!';
			}else if($type == 'food' && Input::has('food_instances_id'))
			{
				$food_instances_id = Input::get('food_instances_id');
				$food_instance = food_instance::find($food_instances_id);
				$image = new FoodImage;
				$image->food_instances_id = $food_instances_id;
				$image->food_instances_food_type_id = $food_instance->food_types_id; //TODO this really should be food_types_id, but this is just to match the database..
				$image->food_instances_restaurants_id = $food_instance->restaurants_id;
				$image->imageData = base64_encode(File::get($file));
				$image->save();
				$message = 'Upload successful!';
			}
		}
		return Redirect::to('imgupload')->with('message', $message);
	}
	
	//displays all images of the given type with the given restaurant_id or food_instances_id
	function LoadImage()
	{
		if(Input::has('type'))
		{
			$type = Input::get('type');
			$images = null;
			if($type == 'restaurant' && Input::has('restaurants_id'))
			{
				$images = RestaurantImage::where('restaurants_id', '=', Input::get('restaurants_id'))->get()->toArray();
			}else if($type == 'food' && Input::has('food_instances_id'))
			{
				$images = FoodImage::where('food_instances_id', '=', Input::get('food_instances_id'))->get()->toArray();
			}
			if(!is_null($images))
			{
				foreach($images as $image)
				{
					$id = $image['id'];
					echo "<img src=\"serveImage?type=$type&id=$id\">"; //TODO IS THIS VULNERABLE TO INJECTION? PERHAPS ADD A CLASS TO THESE IMAGES
				}
			}
		}
	}
	
	//Serves the image with the given id, of the given type (restaurant or food)
	function ServeImage()
	{
		if(Input::has('type') && Input::has('id'))
		{
			$type = Input::get('type');
			$imageRaw = null;
			if($type == 'restaurant')
			{
				$imageRaw = RestaurantImage::find(Input::get('id'))->imageData;
			}else if($type == 'food')
			{
				$imageRaw = FoodImage::find(Input::get('id'))->imageData;
			}
			$image = base64_decode($imageRaw);
			header('Content-Type: image'); //TODO DO WE NEED JPEG/GIF/PNG/ETC?
			echo $image;
			return;
		}
	}
}