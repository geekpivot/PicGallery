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
	return View::make('pages.index');
});


Route::get('file', function()
{
	$file =  Flysystem::connection('awss3')->put('test.txt', 'This is the text of my app');

	return 'Done';
});

Route::get('login', ['as' => 'user.login', 'uses' => 'AuthController@authenticate']);
Route::post('login', 'AuthController@login');
Route::post('register', [ 'as' => 'user.register', 'uses' => 'AuthController@register']);
Route::get('logout', 'AuthController@logout');

