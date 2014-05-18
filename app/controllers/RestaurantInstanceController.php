<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 5/17/14
 * Time: 5:46 PM
 */

class RestaurantInstanceController extends BaseController {

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

    public function showRestaurant($id, $name)
    {
        $restaurant = restaurant::find($id);
        $foods = food_instance::where('restaurants_id', '=',$id)->get();
        $ratings = array();
        foreach($foods as $food){
            $reviewFoodObject = review::where('food_instance_id','=',$food->id);
            $ratings[$food->id] = array('Rating' => $reviewFoodObject->avg('rating')/5.0*100,
                'Count' => $reviewFoodObject->count());
        }
        return View::make('pages.restaurant_instance')->with('foods',$foods)->with('restaurant', $restaurant)->with('ratings', $ratings);
    }

}