<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('login/fb', 'LoginController@FacebookRedirect');
Route::get('login/fb/callback', 'LoginController@FacebookCallback');
Route::get('login', function(){ return Redirect::to('login/fb'); });
Route::get('logout', 'LoginController@Logout');

Route::get('/', function()
{
    if (Auth::check())
    {
        $controller = new HomeController;
        return $controller->showHome();
    }else{
        return View::make('pages.index');
    }
});

Route::post('search','SearchController@showSearchResults');

Route::get('imgupload', function()
{
	return View::make('imgupload')->with('message', Session::get('message'));
});
Route::post('upload', 'ImageController@GetAndSaveImage');

//Route::get('imgview', 'ImageController@LoadImage');
//Route::get('serveImage', 'ImageController@ServeImage');

Route::get('restaurants/{id}/{name}', 'RestaurantInstanceController@showRestaurant')
    ->where(array('id' => '[0-9]+'));

Route::get('tempOpinion', function(){ return csrf_token(); });
//this route requires a parameter _token with the value of csrf_token() to work (e.g. updateReview?food_instance_id=10&rating=3&_token=asdfasdfasdfasdf )
Route::post('updateReview', array('before' => 'auth|csrf', 'uses' => 'ReviewController@UpdateReview'));
Route::get('getReview', 'ReviewController@GetReview');

Route::get('food/{id}/{name}','FoodInstanceController@showFoodInstance');
Route::get('randomStars', function()
{
    $food_instances = food_instance::all();
    $controller = new ReviewController;
    Input::merge(array('_token' => 'B9HkQzjxi7Zi2S6UYyRG1oSzU9OfpjOluxOn3VRv', 'reviewText' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'));
    foreach($food_instances as $food)
    {
        Input::merge(array('food_instance_id' => $food->id, 'rating' => rand(1, 5)));
        $controller->UpdateReview();
        echo $food->id . ' ' . Input::get('rating') . '<br>';
    }
});
