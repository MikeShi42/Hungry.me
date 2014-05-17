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

Route::any('addEntry.php', function()
{
	$entryText = Input::get('entry');
	$message = "Entry successfully added!";
	if($entryText && strlen(trim($entryText)) > 0)
	{
		$entry = new Entry;
		$entry->entry = $entryText;
		$entry->save();
		Log::info('Added new entry');
	}else
	{	
		$message = "Invalid entry.";
	}
	
	$entries = Entry::all();
	return View::make('entries')->with('entries', $entries)->with('message', $message);
});
