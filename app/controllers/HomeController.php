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
            $viewedItem = food_instance::where('id','=',$viewedItemID)->get();
            array_push($viewedItems,$viewedItem[0]);
        }
        $viewedItemPictures = ImageController::ServeArrayFoodBase64FromArrayURLs($viewedItemIDs);

        $reviews = review::where('users_id','=',Auth::user()->id)->take(8)->orderBy('timestamp', 'DESC')->lists('food_instance_id');
        foreach($reviews as $review){
            $reviewItem = food_instance::where('id', '=', $review)->get();
            array_push($reviewItems,$reviewItem[0]);
        }

        $reviewItemPictures = ImageController::ServeArrayFoodBase64FromArrayURLs($reviews);
        return View::make('pages.home')->with('history',$viewHistory)->with('reviewItems',$reviewItems)->with('viewedItemsIDs',$viewedItemIDs)
            ->with('viewedItemPictures',$viewedItemPictures)->with('reviewItemPictures', $reviewItemPictures)->with('viewedItems',$viewedItems);
	}

}
