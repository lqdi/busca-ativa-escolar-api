<?php
Route::get('/versions', function() {
	return response()->json(['available_versions' => ['v1']]);
});

Route::group(['prefix' => 'auth'], function () {
	Route::post('/token', 'Auth\IdentityController@authenticate');
});

Route::group(['prefix' => 'v1', 'middleware' => 'api'], function () {

	Route::group(['middleware' => 'jwt.auth'], function() { // Authenticated routes

		// Children
		Route::get('/children/map', 'Resources\ChildrenController@getMap')->middleware('can:cases.map');
		Route::resource('/children', 'Resources\ChildrenController');
		Route::post('/children/search', 'Resources\ChildrenController@search')->middleware('can:cases.view');
		Route::get('/children/{child}/comments', 'Resources\ChildrenController@comments')->middleware('can:cases.view');
		Route::get('/children/{child}/attachments', 'Resources\ChildrenController@attachments')->middleware('can:cases.view');
		Route::get('/children/{child}/activity', 'Resources\ChildrenController@activityLog')->middleware('can:cases.view');
		Route::post('/children/{child}/comments', 'Resources\ChildrenController@addComment')->middleware('can:cases.view');
		Route::post('/children/{child}/attachments', 'Resources\ChildrenController@addAttachment')->middleware('can:cases.view');


		// My alerts
		Route::get('/alerts/mine', 'Resources\AlertsController@get_mine');

		// Pending alerts
		Route::get('/alerts/pending', 'Resources\AlertsController@get_pending')->middleware('can:alerts.pending');
		Route::post('/alerts/{child}/accept', 'Resources\AlertsController@accept')->middleware('can:alerts.pending');
		Route::post('/alerts/{child}/reject', 'Resources\AlertsController@reject')->middleware('can:alerts.pending');

		// Child Cases
		Route::group(['middleware' => 'can:cases.view'], function() {
			Route::resource('/cases', 'Resources\CasesController');
		});

		// Users
		Route::post('/users/search', 'Resources\UsersController@search')->middleware('can:users.view');
		Route::get('/users/myself', 'Auth\IdentityController@identity');
		Route::group(['middleware' => 'can:users.manage'], function() {
			Route::post('/users/{user_id}/restore', 'Resources\UsersController@restore');
			Route::resource('/users', 'Resources\UsersController');
		});

		// Settings
		Route::group(['middleware' => 'can:settings.manage'], function() {

			// User Groups
			Route::resource('/groups', 'Resources\GroupsController');
			Route::put('/groups/{group}/settings', 'Resources\GroupsController@update_settings');

			// Tenant Settings
			Route::get('/settings/tenant', 'Resources\SettingsController@get_tenant_settings')->middleware('can:settings.manage');
			Route::put('/settings/tenant', 'Resources\SettingsController@update_tenant_settings')->middleware('can:settings.manage');

		});

		// Case Steps
		Route::post('/steps/{step_type}/{step_id}/complete', 'Resources\StepsController@complete')->middleware('can:cases.manage');
		Route::get('/steps/{step_type}/{step_id}/assignable_users', 'Resources\StepsController@getAssignableUsers')->middleware('can:cases.manage');
		Route::post('/steps/{step_type}/{step_id}/assign_user', 'Resources\StepsController@assignUser')->middleware('can:cases.manage');
		Route::post('/steps/{step_type}/{step_id}', 'Resources\StepsController@update')->middleware('can:cases.manage');
		Route::get('/steps/{step_type}/{step_id}', 'Resources\StepsController@show')->middleware('can:cases.view');

		// Sign-ups
		Route::get('/signups/pending', 'Tenants\SignUpController@get_pending');
		Route::post('/signups/complete_setup', 'Tenants\SignUpController@completeSetup')->middleware('can:tenant.complete_setup');
		Route::post('/signups/{signup}/approve', 'Tenants\SignUpController@approve');
		Route::post('/signups/{signup}/reject', 'Tenants\SignUpController@reject');
		Route::post('/signups/{signup}/resend_notification', 'Tenants\SignUpController@resendNotification');

		// Tenants (authenticated)
		Route::get('/tenants/all', 'Tenants\TenantsController@all')->middleware('can:tenants.manage');
		Route::get('/tenants/recent_activity', 'Tenants\TenantsController@get_recent_activity');

		// INEP Schools
		Route::post('/schools/search', 'Resources\SchoolsController@search');

		// Reports
		Route::post('/reports/children', 'Resources\ReportsController@query_children')->middleware('can:reports.view');

	});

	// Attachment download
	// TODO: IMPORTANT: authenticate this with special timed download token
	Route::get('/attachments/download/{attachment}', 'Resources\AttachmentsController@download')->name('api.attachments.download');

	// Static data
	Route::get('/language.json', 'Resources\LanguageController@generateLanguageFile');
	Route::get('/static/static_data', 'Resources\StaticDataController@render');

	// Open data for sign-up
	Route::post('/cities/search', 'Resources\CitiesController@search');
	Route::post('/cities/check_availability', 'Resources\CitiesController@check_availability');
	Route::resource('/cities', 'Resources\CitiesController');
	Route::resource('/tenants', 'Tenants\TenantsController');

	// Sign-up
	Route::post('/signups/register', 'Tenants\SignUpController@register');
	Route::get('/signups/via_token/{signup}', 'Tenants\SignUpController@get_via_token');
	Route::post('/signups/{signup}/complete', 'Tenants\SignUpController@complete');

	Route::post('/integration/lp/alert_spawn', 'Integration\AlertSpawnController@spawn_alert');
	Route::any('/integration/sms/on_receive', 'Integration\SmsConversationController@on_message_received');

});
