<?php

class ReviewController extends BaseController
{
	//input: food_instance_id, [rating], [ratingText]
	//TODO if food_instance_id or food_instance_food_type_id are renamed in the database, please rename them here as well
	function UpdateReview()
	{
		$users_id = Auth::user()->id;
		if(Input::has('food_instance_id'))
		{
			$food_instance_id = Input::get('food_instance_id');
			$review = review::where('users_id', '=', $users_id)->where('food_instance_id', '=', $food_instance_id)->first();
			if(empty($review)) //if a review doesn't already exist for this user and food instance
			{
				$review = new Review;
				$review->users_id = $users_id;
				$review->food_instance_id = $food_instance_id;
				$review->food_instance_food_type_id = food_instance::find($food_instance_id)->food_types_id;
			}
			$review->rating = Input::get('rating', 0);
			$review->reviewText = Input::get('reviewText', '');
			$success = $review->save();
			if($success) return '{ success: true }';
		}
		return '{ success: false }';
	}
	
	//input: food_instance_id, [users_id]
	function GetReview()
	{
		$users_id = Input::get('users_id', Auth::user()->id);
		if(Input::has('food_instance_id'))
		{
			$food_instance_id = Input::get('food_instance_id');
			$review = review::where('users_id', '=', $users_id)->where('food_instance_id', '=', $food_instance_id)->first();
			if(empty($review)) return 'No review found.';
			return 'To be placed in a view<br>Rating: ' . $review->rating . '<br>Review: ' . $review->reviewText;
		}
	}
}