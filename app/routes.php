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
Route::get('updateReview', array('before' => 'auth|csrf', 'uses' => 'ReviewController@UpdateReview'));
Route::get('getReview', 'ReviewController@GetReview');
