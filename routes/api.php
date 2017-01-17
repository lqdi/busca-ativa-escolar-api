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

Route::get('/versions', function() {
	return response()->json(['available_versions' => ['v1']]);
});

Route::group(['prefix' => 'auth'], function () {
	Route::post('/token', 'Auth\TokenController@authenticate');
	Route::get('/identity', 'Auth\TokenController@identity')->middleware('jwt.auth');
});

Route::group(['prefix' => 'v1', 'middleware' => 'api'], function () {

	Route::group(['middleware' => 'jwt.auth'], function() { // Authenticated routes
		Route::resource('/children', 'Resources\ChildrenController');
		Route::resource('/cases', 'Resources\CasesController');

		Route::post('/steps/{step_type}/{step_id}/complete', 'Resources\StepsController@complete');
		Route::get('/steps/{step_type}/{step_id}/assignable_users', 'Resources\StepsController@getAssignableUsers');
		Route::post('/steps/{step_type}/{step_id}/assign_user', 'Resources\StepsController@assignUser');
		Route::post('/steps/{step_type}/{step_id}', 'Resources\StepsController@update');
		Route::get('/steps/{step_type}/{step_id}', 'Resources\StepsController@show');
	});

	Route::get('/static/static_data', 'Resources\StaticDataController@render');

	Route::resource('/cities', 'Resources\CitiesController');
	Route::resource('/tenants', 'Tenants\TenantsController');

});
