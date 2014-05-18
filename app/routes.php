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
Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/');
});

Route::get('/', function()
{
    if (Auth::check())
    {
        return View::make('pages.home');
    }
    return View::make('pages.index');
});

Route::post('search','SearchController@showSearchResults');

Route::get('private', array('before' => 'auth', function()
{
    return 'Authenticated!';
}));

Route::get('restaurants/{id}/{name}', 'RestaurantInstanceController@showRestaurant')
    ->where(array('id' => '[0-9]+'));