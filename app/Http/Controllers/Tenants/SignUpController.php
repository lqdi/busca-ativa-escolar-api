<?php
/**
 * busca-ativa-escolar-api
 * TenantSignUpController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:09
 */

namespace BuscaAtivaEscolar\Http\Controllers\Tenants;


use Auth;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Exceptions\ValidationException;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\SignUp;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use DB;
use Event;
use Illuminate\Support\Str;

class SignUpController extends BaseController  {

	public function register() {
		$data = request()->all();

		if(!isset($data['city_id'])) return $this->api_failure('missing_city_id');

		$city = City::find($data['city_id']);

		if(!$city) return $this->api_failure('invalid_city');

		$existingTenant = Tenant::where('city_id', $city->id)->first();
		$existingSignUp = SignUp::where('city_id', $city->id)->first();

		if($existingTenant) return $this->api_failure('tenant_already_registered');
		if($existingSignUp) return $this->api_failure('signup_in_progress');

		try {

			$validator = SignUp::validate($data);

			if($validator->fails()) {
				return $this->api_failure('invalid_input', $validator->failed());
			}

			if(User::checkIfExists($data['admin']['email'])) {
				return $this->api_failure('political_admin_email_in_use');
			}

			$signup = SignUp::createFromForm($data);

			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

	}

	public function get_pending() {
		$pending = SignUp::with('city')
			->where('is_provisioned', false);

		$sort = request('sort', []);
		$filter = request('filter', []);

		SignUp::applySorting($pending, request('sort'));

		if(isset($filter['city_name']) && strlen($filter['city_name']) > 0) {
			$pending->whereHas('city', function ($sq) use ($filter) {
				return $sq->where('name_ascii', 'REGEXP', Str::ascii($filter['city_name']));
			});
		}

		switch($filter['status']) {
			case "all": $pending->withTrashed(); break;
			case "rejected": $pending->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 0); break;
			case "pending_approval": $pending->where('is_approved', 0); break;
			case "pending_setup": $pending->where( 'is_approved', 1)->where('is_provisioned', 0 ); break;
			case "pending": default: break;
		}

		if(isset($filter['created_at']) && strlen($filter['created_at']) > 0) {
			$numDays = intval($filter['created_at']);
			$cutoffDate = Carbon::now()->addDays(-$numDays);

			$pending->where('created_at', '>=', $cutoffDate->format('Y-m-d H:i:s'));
		}

		$columns = (isset($sort['cities.name:city_id'])) ? ['signups.*', 'cities.name'] : ['*'];

		$pending = $pending->get($columns);

		$pending->each(function (&$item) { /* @var $item SignUp */
			if($item->is_approved && !$item->is_provisioned) {
				$item->provision_url = env('APP_PANEL_URL') . "/admin_setup/" . $item->id . '?token=' . $item->getURLToken();
			}
		});
		
		return response()->json(['data' => $pending]);
	}

	public function get_via_token(SignUp $signup) {
		$token = request('token');
		$validToken = $signup->getURLToken();

		if(!$token) return $this->api_failure('invalid_token');
		if($token !== $validToken) return $this->api_failure('token_mismatch');
		if(!$signup->is_approved) return $this->api_failure('not_approved');
		if($signup->is_provisioned) return $this->api_failure('already_provisioned');

		return response()->json($signup);
	}

	public function approve(SignUp $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');

			$signup->approve(Auth::user());
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function reject(SignUp $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');

			$signup->reject(Auth::user());
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function resendNotification(SignUp $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');
			if($signup->is_provisioned) return $this->api_failure('tenant_already_provisioned');

			$signup->sendNotification();
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function updateRegistrationEmail(SignUp $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');
			if(!in_array(request('type'), ['admin', 'mayor'])) return $this->api_failure('invalid_email_type');

			$signup->updateRegistrationEmail(request('type'), request('email'));

			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function complete(SignUp $signup) {
		$token = request('token');
		$validToken = $signup->getURLToken();

		if(!$token) return $this->api_failure('invalid_token');
		if($token !== $validToken) return $this->api_failure('token_mismatch');
		if(!$signup->is_approved) return $this->api_failure('not_approved');
		if($signup->is_provisioned) return $this->api_failure('already_provisioned');

		$politicalAdmin = request('political', []);
		$operationalAdmin = request('operational', []);

		try {
			$tenant = Tenant::provision($signup, $politicalAdmin, $operationalAdmin);

			return response()->json(['status' => 'ok', 'tenant_id' => $tenant->id]);
		} catch (ValidationException $ex) {
			if($ex->getValidator()) return $this->api_validation_failed($ex->getReason(), $ex->getValidator());
			return $this->api_failure($ex->getReason());
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function completeSetup() {

		$tenant = Auth::user()->tenant;

		if(!$tenant) return $this->api_failure('user_has_no_tenant');

		$tenant->is_setup = true;
		$tenant->save();

		return response()->json(['status' => 'ok']);

	}

}