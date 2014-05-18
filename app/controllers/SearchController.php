<?php

class SearchController extends BaseController {

    public function showSearchResults()
    {
        $searchString = Input::get('searchString');
        $searchBy = Input::get('searchBy');

        $searchKeyWords = explode(' ',$searchString);
        $searchResults = array();

        //Search food instances
        if($searchBy == 'I')
        {
            $resultsItems = array();
            //Searching food instances by name
            $resultNames = array();
            foreach($searchKeyWords as $keyword)
            {
                $foodNameQueryResult = food_instance::where('name','LIKE','%'.$keyword.'%');
                if($foodNameQueryResult->count()>0)
                    $resultNames = array_merge($resultNames,$foodNameQueryResult->get()->toArray());
            }
            $resultsItems = array_merge($resultNames,$resultsItems);
            //Searching food instance by tag
            foreach($searchKeyWords as $keyword)
            {
                //get id of tag
                $tagIDsQueryResult = DB::table('tags')->where('tagText','LIKE','%'.$keyword.'%');
                //get food_instance

                if($tagIDsQueryResult->count()>0)
                {
                    $tagIDs = $tagIDsQueryResult->lists('id');
                    $food_instance_ids = array();
                    foreach($tagIDs as $tagID)
                    {
                        $food_instance_ids =array_merge($food_instance_ids,DB::table('food_instances_has_tags')->where('tags_id','=',$tagID)->lists('food_instances_id'));
                    }
                    $resultTags = array();
                    foreach($food_instance_ids as $food_instance_id)
                    {
                        $resultTags=array_merge($resultTags,food_instance::where('id','=',$food_instance_id)->get()->toArray());
                    }
                    $resultsItems = array_merge($resultsItems,$resultTags);
                }
            }
            $resultsItems = array_unique($resultsItems, SORT_REGULAR);

            //get reviews and pictures
            $resultItemsReviews = array();
            //$resultsItemsPictures = array();
            if(sizeof($resultsItems)>0){
                foreach($resultsItems as $item){
                    $food_instance_id = $item['id'];
                    $resultItemsReviews = array_merge($resultItemsReviews,DB::table('reviews')->where('food_instance_id','=',$food_instance_id)->get());
                    //$resultsItemsPictures = array_push($resultsItemsPictures,DB::table('food_images')->where('food_instance_id','=',$food_instance_id)->pluck('imageData'));
                }
            }

            $searchResults = array($resultsItems,$resultItemsReviews/*,$resultsItemsPictures*/);

        }

        //Search Restauraunts
        if($searchBy == 'R'){

            $resultsRestaurant = array();
            foreach($searchKeyWords as $keyword)
            {
                $resultsRestaurantQuery = restaurant::where('name','LIKE','%'.$keyword.'%');
                if($resultsRestaurantQuery->count())
                    $resultsRestaurant = array_merge($resultsRestaurant,$resultsRestaurantQuery->get()->toArray());
            }

            //get restaurant pics
            $resultsRestaurantImages = array();
            if(sizeof($resultsRestaurant)>0){
                foreach($resultsRestaurant as $restaurant){
                    $resultsRestaurantImages = array_merge($resultsRestaurantImages,DB::table('restaurant_images')->where('restaurant_ids','=',$restaurant['id'])->lists('imageData'));
                }
            }

            $searchResults = array($resultsRestaurant,$resultsRestaurantImages);
        }


        return View::make('pages.search_result')->with('results', $searchResults);
    }

}
