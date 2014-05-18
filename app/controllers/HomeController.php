<?php

class HomeController extends BaseController {


	public function showHome()
    {
        $viewHistory = array();
        $reviewItems = array();
        //get view history
        $viewedItemIDs = array();
        $viewItemIDsQuery = DB::table('viewed_food_histories')->where('users_id','=',Auth::user()->id)->take(8);
        if($viewItemIDsQuery->count()>0)
        {
            $viewedItemIDs = $viewItemIDsQuery->orderBy('timestamp','DESC')->lists('food_instances_id');
        }

        $viewedItems = array();
        foreach($viewedItemIDs as $viewedItemID){
            $viewedItems[] = food_instance::where('id','=',$viewedItemID)->get();
        }
        $viewedItemPictures = ImageController::ServeArrayFoodBase64FromArrayURLs($viewedItemIDs);

        $reviews = review::where('users_id','=',Auth::user()->id)->take(8)->orderBy('timestamp', 'DESC')->lists('food_instance_id');
        foreach($reviews as $review){
            $reviewItems[] = food_instance::where('id', '=', $review)->get();
        }
        $reviewItemPictures = ImageController::ServeArrayFoodBase64FromArrayURLs($reviews);

        return View::make('pages.home')->with('history',$viewHistory)->with('reviews',$reviewItems)
            ->with('viewedItemPictures',$viewedItemPictures)->with('reviewItemPictures', $reviewItemPictures);
	}

}
