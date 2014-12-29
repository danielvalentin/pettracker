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
