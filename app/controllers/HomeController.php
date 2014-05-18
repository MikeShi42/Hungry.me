<?php

class HomeController extends BaseController {


	public function showHome()
	{
        $viewHistory = array();
        $reviewItems = array();

        //get view history
        $viewedItemIDs = array();
        $viewedItemTimeStamps = array();
        $viewItemIDsQuery = review::where('users_id','=',Auth::user()->id);
        if($viewItemIDsQuery->count()>0)
        {
            $viewedItemIDs = $viewItemIDsQuery->lists('food_instance_id');
            $viewedItemTimeStamps = $viewItemIDsQuery->lists('timestamp');
        }

        $viewedItems = array();
        foreach($viewedItemIDs as $viewedItemID){
            $viewedItemID = food_instance::where('id','=','')
        }

		return View::make('pages.home')->with('history',$viewHistory)->with('reviews',$reviewItems);
	}

}
