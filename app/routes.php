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

// Authentication filter
Route::filter('auth', function ()
{
	if ( ! Session::has('access_token') || ! Session::has('user') )
	{
		return Redirect::route('auth');
	}
});

// Get winner
Route::get('winner', function ()
{
	return View::make('projects/winner')
		->with('projects', Project::with('votes')->get());
});

Route::get('/auth', array('as' => 'auth', 'uses' => 'AuthController@index'));
Route::get('/thanks', array('as' => 'thanks', 'uses' => 'VotesController@thanks'));

Route::group(array('before' => 'auth'), function() {
	Route::get('/', array('as' => 'all_votes', 'uses' => 'VotesController@index'));
	Route::post('/', array('as' => 'create_vote', 'uses' => 'VotesController@create'));
});
