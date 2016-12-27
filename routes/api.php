<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
	Route::post('token', 'Auth\TokenController@authenticate');
	Route::get('profile', 'Auth\TokenController@profile')->middleware('jwt.auth');
});

Route::group(['prefix' => 'v1'], function () {

	Route::group(['middleware' => 'jwt.auth'], function() {
		// Authenticated routes
	});

	Route::resource('cities', 'Resources\CitiesController');

});
