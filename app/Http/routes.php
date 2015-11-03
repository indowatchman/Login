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

Route::get('/home', 'HomeController@home');

Route::get('register', [
	'as' => 'register', 'uses' => 'SimpleauthController@register'
]);

Route::post('register', [
	'as' => 'post-registration', 'uses' => 'SimpleauthController@doRegister'
]);

Route::get('/registration/activate{code}', [
	'as' => 'activate', 'uses' => 'SimpleauthController@activate'
]);

Route::get('/login', [
	'as' => 'login', 'uses' => 'SimpleauthController@login'
]);

Route::post('/login', [
	'as' => 'login', 'uses' => 'SimpleauthController@ceklogin'
]);

Route::get('logout', [
	'as' => 'logout', 'uses' => 'SimpleauthController@logout'
]);