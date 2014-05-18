<?php
class foodInstanceController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showFoodInstance($id, $name)
    {
        $foodInstance = food_instance::find($id);
		if(Auth::check())
		{
			$users_id = Auth::user()->id;
			$food_instances_food_types_id = $foodInstance->food_types_id;
			$food_instances_restaurants_id = $foodInstance->restaurants_id;
			$history = new viewed_food_history;
			$history->users_id = $users_id;
			$history->food_instances_id = $id;
			$history->food_instances_food_types_id = $food_instances_food_types_id;
			$history->food_instances_restaurants_id = $food_instances_restaurants_id;
			$history->save();
		}
		
        $foodImageDatas = ImageController::ServeCollectionFoodBase64URLs($id);
        $foodImageBase64URL = array();
        foreach($foodImageDatas as $foodImageData){
            array_push($foodImageBase64URL,ImageController::createBase64URL($foodImageData[0],$foodImageData[1]));
        }

        $reviews = array();
        $reviewsQuery = review::where('food_instance_id','=',$id);
        if($reviewsQuery->count()>0){
            $reviews = $reviewsQuery->get();
        }

        $ratingSum = 0;
        $numReviews = count($reviews);
        foreach($reviews as $review){
            $ratingSum = $ratingSum + $review->rating;
        }
        $avgRating = -1;
        if($numReviews>0)
            $avgRating = $ratingSum/$numReviews;

        $rating= array('Rating' => $avgRating,'Count' => $numReviews, 'Reviews'=>$reviews);

		$safm = ImageController::ServeFoodBase64Image($id);
		$b64ww = ImageController::createBase64URL('',$safm[1]);
		
        return View::make('pages.food_instance')->with('food',$foodInstance)->with('rating', $rating)->with('foodImageBase64', $b64ww);
    }



}