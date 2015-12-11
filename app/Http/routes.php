<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('{id}', [
	'uses' => 'IndexController@index',
	'as' => 'program'
]);

Route::post('{id}/inquire', [
	'uses' => 'IndexController@inquire',
	'as' => 'inquire'
]);

Route::get('inquire/success', [
	'uses' => 'IndexController@inquireSuccess',
	'as' => 'sendSuccess'
]);

Route::post('{id}', 'IndexController@store');
