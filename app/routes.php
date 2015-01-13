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

// Pages
Route::get('/', array(
	'as' => 'frontpage',
	'uses' => 'PageController@index'
));
Route::get('/about', array(
	'as' => 'about',
	'uses' => 'PageController@about'
));

// Users
Route::any('user/login', array(
	'as' => 'userlogin',
	'uses' => 'UserController@login'
));
Route::any('user/signup', array(
	'as' => 'usersignup',
	'uses' => 'UserController@signup'
));
Route::any('user/logout', array(
	'as' => 'userlogout',
	'uses' => 'UserController@logout'
));

// App
Route::get('/overview', array(
	'as' => 'overview',
	'uses' => 'OverviewController@index'
));

/*
 * API
 */

// Households
Route::get('/api/households', array(
	'as' => 'getAllHouseholds',
	'uses' => 'HouseholdsController@getAll'
));
Route::get('/api/households/{id}', array(
	'as' => 'getHousehold',
	'uses' => 'HouseholdsController@get'
))->where('id','[0-9]+');
Route::post('/api/households', array(
	'as' => 'createHousehold',
	'uses' => 'HouseholdsController@create'
));

// Pets
Route::get('/api/pets/{id}', array(
	'as' => 'getPet',
	'uses' => 'PetsController@get'
));
Route::post('/api/pets', array(
	'as' => 'createPet',
	'uses' => 'PetsController@create'
));

// Petevents
Route::get('/api/petevents/{id}', array(
	'as' => 'getEvent',
	'uses' => 'PeteventsController@get'
));
Route::post('/api/petevents', array(
	'as' => 'createPetevent',
	'uses' => 'PeteventsController@create'
));

