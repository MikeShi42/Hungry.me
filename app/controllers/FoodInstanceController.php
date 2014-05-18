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
        $foodImageDatas = ImageController::ServeCollectionFoodBase64URLs($id);
        $restaurantImageBase64URL = array();
        foreach($foodImageDatas as $foodImageData){
            array_push($restaurantImageBase64URL,ImageController::createBase64URL($foodImageData[0],$foodImageData[1]));
        }

        $reviews = array();
        $reviewsQuery = review::where('food_instance_id','=',$id);
        if($reviewsQuery->count()>0){
            $reviews = $reviewsQuery->get();
        }

        $rating= array('Rating' => $reviews->avg('rating')/5.0*100,'Count' => $reviews->count());

        return View::make('pages.food_instance')->with('food',$foodInstance)->with('rating', $rating)
            ->with('foodImagesBase64URL', $restaurantImageBase64URL)->with('foodImagesBase64', $foodImageDatas);
    }



}