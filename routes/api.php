<?php
Route::get('/versions', function() {
	return response()->json(['available_versions' => ['v1']]);
});

Route::group(['prefix' => 'auth'], function () {
	Route::post('/token', 'Auth\TokenController@authenticate');
	Route::get('/identity', 'Auth\TokenController@identity')->middleware('jwt.auth');
});

Route::group(['prefix' => 'v1', 'middleware' => 'api'], function () {

	Route::group(['middleware' => 'jwt.auth'], function() { // Authenticated routes

		// Children
		Route::resource('/children', 'Resources\ChildrenController');
		Route::post('/children/search', 'Resources\ChildrenController@search');
		Route::get('/children/{child}/comments', 'Resources\ChildrenController@comments');
		Route::get('/children/{child}/attachments', 'Resources\ChildrenController@attachments');
		Route::get('/children/{child}/activity', 'Resources\ChildrenController@activity_log');
		Route::post('/children/{child}/comments', 'Resources\ChildrenController@addComment');
		Route::post('/children/{child}/attachments', 'Resources\ChildrenController@addAttachment');

		// Child Cases
		Route::resource('/cases', 'Resources\CasesController');

		// Users
		Route::resource('/users', 'Resources\UsersController');
		Route::post('/users/search', 'Resources\UsersController@search');

		// User Groups
		Route::resource('/groups', 'Resources\GroupsController');

		// Case Steps
		Route::post('/steps/{step_type}/{step_id}/complete', 'Resources\StepsController@complete');
		Route::get('/steps/{step_type}/{step_id}/assignable_users', 'Resources\StepsController@getAssignableUsers');
		Route::post('/steps/{step_type}/{step_id}/assign_user', 'Resources\StepsController@assignUser');
		Route::post('/steps/{step_type}/{step_id}', 'Resources\StepsController@update');
		Route::get('/steps/{step_type}/{step_id}', 'Resources\StepsController@show');

		// INEP Schools
		Route::post('/schools/search', 'Resources\SchoolsController@search');
	});

	// Attachment download
	// TODO: IMPORTANT: authenticate this with special timed download token
	Route::get('/attachments/download/{attachment}', 'Resources\AttachmentsController@download')->name('api.attachments.download');

	// Static data
	Route::get('/language.json', 'Resources\LanguageController@generateLanguageFile');
	Route::get('/static/static_data', 'Resources\StaticDataController@render');

	// Open data for sign-up
	Route::post('/cities/search', 'Resources\CitiesController@search');
	Route::resource('/cities', 'Resources\CitiesController');
	Route::resource('/tenants', 'Tenants\TenantsController');

});
