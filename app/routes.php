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

Route::get('/', function()
{
	$entries = Entry::all();
	return View::make('entries')->with('entries', $entries);
});

Route::get('addEntry.php', function()
{
	$entry = new Entry;
	$entry->entry = Input::get('entry', 'Default');
	$entry->save();
	
	return HomeController->showEntries();
});
