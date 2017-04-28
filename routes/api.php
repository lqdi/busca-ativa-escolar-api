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
		Route::get('/children/{child}/alert', 'Resources\ChildrenController@getAlert')->middleware('can:cases.view');
		Route::resource('/children', 'Resources\ChildrenController');
		Route::post('/children/search', 'Resources\ChildrenController@search')->middleware('can:cases.view');
		Route::get('/children/{child}/comments', 'Resources\ChildrenController@comments')->middleware('can:cases.view');
		Route::get('/children/{child}/attachments', 'Resources\ChildrenController@attachments')->middleware('can:cases.view');
		Route::get('/children/{child}/activity', 'Resources\ChildrenController@activityLog')->middleware('can:cases.view');
		Route::post('/children/{child}/comments', 'Resources\ChildrenController@addComment')->middleware('can:cases.view');
		Route::post('/children/{child}/attachments', 'Resources\ChildrenController@addAttachment')->middleware('can:cases.view');
		Route::delete('/children/{child}/attachments/{attachment}', 'Resources\ChildrenController@removeAttachment')->middleware('can:cases.manage');


		// My alerts
		Route::get('/alerts/mine', 'Resources\AlertsController@get_mine');

		// Pending alerts
		Route::get('/alerts/pending', 'Resources\AlertsController@get_pending')->middleware('can:alerts.pending');
		Route::post('/alerts/{child}/accept', 'Resources\AlertsController@accept')->middleware('can:alerts.pending');
		Route::post('/alerts/{child}/reject', 'Resources\AlertsController@reject')->middleware('can:alerts.pending');

		// Child Cases
		Route::group(['middleware' => 'can:cases.view'], function() {
			Route::post('/cases/{case}/cancel', 'Resources\CasesController@cancel');
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
		Route::get('/groups', 'Resources\GroupsController@index');
		Route::group(['middleware' => 'can:settings.manage'], function() {

			// User Groups
			Route::post('/groups', 'Resources\GroupsController@store');
			Route::get('/groups/{group}', 'Resources\GroupsController@show');
			Route::put('/groups/{group}/settings', 'Resources\GroupsController@update_settings');
			Route::put('/groups/{group}', 'Resources\GroupsController@update');
			Route::delete('/groups/{group}', 'Resources\GroupsController@destroy');

			// Tenant Settings
			Route::get('/settings/tenant', 'Resources\SettingsController@get_tenant_settings')->middleware('can:settings.manage');
			Route::put('/settings/tenant', 'Resources\SettingsController@update_tenant_settings')->middleware('can:settings.manage');

		});

		// Maintenance
		Route::group(['middleware' => 'can:maintenance'], function() {
			Route::get('/maintenance/import_jobs', 'Maintenance\ImportController@index');
			Route::post('/maintenance/import_jobs/new', 'Maintenance\ImportController@upload_file');
			Route::post('/maintenance/import_jobs/{job}/process', 'Maintenance\ImportController@process_job');
			Route::get('/maintenance/import_jobs/{job}', 'Maintenance\ImportController@get_job');

			Route::get('/maintenance/sms_conversations', 'Maintenance\SmsStatusController@get_conversations');
			Route::get('/maintenance/system_health', 'Maintenance\SystemHealthController@get_health');
		});

		// Case Steps
		Route::post('/steps/{step_type}/{step_id}/complete', 'Resources\StepsController@complete')->middleware('can:cases.manage');
		Route::get('/steps/{step_type}/{step_id}/assignable_users', 'Resources\StepsController@getAssignableUsers')->middleware('can:cases.manage');
		Route::post('/steps/{step_type}/{step_id}/assign_user', 'Resources\StepsController@assignUser')->middleware('can:cases.manage');
		Route::post('/steps/{step_type}/{step_id}', 'Resources\StepsController@update')->middleware('can:cases.manage');
		Route::get('/steps/{step_type}/{step_id}', 'Resources\StepsController@show')->middleware('can:cases.view');

		// Sign-ups
		Route::any('/signups/pending', 'Tenants\SignUpController@get_pending');
		Route::post('/signups/complete_setup', 'Tenants\SignUpController@completeSetup')->middleware('can:tenant.complete_setup');
		Route::post('/signups/{signup}/approve', 'Tenants\SignUpController@approve');
		Route::post('/signups/{signup}/reject', 'Tenants\SignUpController@reject');
		Route::post('/signups/{signup}/resend_notification', 'Tenants\SignUpController@resendNotification');

		// Tenants (authenticated)
		Route::any('/tenants/all', 'Tenants\TenantsController@all')->middleware('can:tenants.manage');
		Route::get('/tenants/recent_activity', 'Tenants\TenantsController@get_recent_activity');

		// INEP Schools
		Route::post('/schools/search', 'Resources\SchoolsController@search')->name('api.school.search');

		// Notifications
		Route::get('/notifications/unread', 'Resources\NotificationsController@getUnread');
		Route::post('/notifications/{id}/mark_as_read', 'Resources\NotificationsController@markAsRead');

		Route::get('/user_preferences', 'Resources\PreferencesController@getSettings');
		Route::post('/user_preferences', 'Resources\PreferencesController@updateSettings');

		// Reports
		Route::post('/reports/children', 'Resources\ReportsController@query_children')->middleware('can:reports.view');
		Route::get('/reports/country_stats', 'Resources\ReportsController@country_stats');

	});

	// Attachment download
	// TODO: IMPORTANT: authenticate this with special timed download token
	Route::get('/attachments/download/{attachment}', 'Resources\AttachmentsController@download')->name('api.attachments.download');

	// Static data
	Route::get('/language.json', 'Resources\LanguageController@generateLanguageFile');
	Route::get('/static/static_data', 'Resources\StaticDataController@render');

	// Open data for sign-up
	Route::post('/cities/search', 'Resources\CitiesController@search')->name('api.cities.search');
	Route::post('/cities/check_availability', 'Resources\CitiesController@check_availability');
	Route::resource('/cities', 'Resources\CitiesController');
	Route::resource('/tenants', 'Tenants\TenantsController');

	// Password reset
	Route::post('/password_reset/begin', 'Auth\IdentityController@begin_password_reset');
	Route::post('/password_reset/complete', 'Auth\IdentityController@complete_password_reset');

	// Sign-up
	Route::post('/signups/register', 'Tenants\SignUpController@register');
	Route::get('/signups/via_token/{signup}', 'Tenants\SignUpController@get_via_token');
	Route::post('/signups/{signup}/complete', 'Tenants\SignUpController@complete');

	Route::post('/integration/lp/alert_spawn', 'Integration\AlertSpawnController@spawn_alert');
	Route::any('/integration/sms/on_receive', 'Integration\SmsConversationController@on_message_received');
	Route::get('/integration/forms/{form}', 'Integration\FormBuilderController@render_form');

});
