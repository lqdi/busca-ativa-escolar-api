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
	Route::post('token', 'Auth\TokenBaseController@authenticate');
	Route::get('profile', 'Auth\TokenBaseController@profile')->middleware('jwt.auth');
});

Route::group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function () {
});
