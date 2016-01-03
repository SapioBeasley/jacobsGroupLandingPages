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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', [
	'middleware' => 'auth',
	'uses' => 'IndexController@index',
	'as' => 'index'
]);

Route::get('/create', [
	'middleware' => 'auth',
	'uses' => 'IndexController@create',
	'as' => 'program.create'
]);

Route::get('{id}/edit', [
	'middleware' => 'auth',
	'uses' => 'IndexController@edit',
	'as' => 'program.edit'
]);

Route::put('{id}/update', [
	'middleware' => 'auth',
	'uses' => 'IndexController@update',
	'as' => 'program.update'
]);

Route::delete('{id}/destroy', [
	'middleware' => 'auth',
	'uses' => 'IndexController@destroy',
	'as' => 'program.destroy'
]);

Route::post('/store', [
	'middleware' => 'auth',
	'uses' => 'IndexController@store',
	'as' => 'program.store'
]);

Route::post('{id}/upload', 'IndexController@upload');


Route::get('{id}', [
	'uses' => 'IndexController@show',
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
