<?php
/**
 * busca-ativa-escolar-api
 * TenantSignupController.php
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
use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Exceptions\ValidationException;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\TenantSignup;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use BuscaAtivaEscolar\Utils;
use Carbon\Carbon;
use DB;
use Event;
use Excel;
use Illuminate\Support\Str;

class TenantSignupController extends BaseController  {

    const PERMITED_FILES_MIME_TYPES = [
        'image/jpeg',
        'image/png'
    ];

	public function register() {
		$data = request()->all();

		if(!isset($data['city_id'])) return $this->api_failure('missing_city_id');

		$city = City::find($data['city_id']);

		if(!$city) return $this->api_failure('invalid_city');

		$existingTenant = Tenant::where('city_id', $city->id)->first();
		$existingSignUp = TenantSignup::where('city_id', $city->id)->first();

		if($existingTenant) return $this->api_failure('tenant_already_registered');
		if($existingSignUp) return $this->api_failure('signup_in_progress');

		try {

			$validator = TenantSignup::validate($data);

			if($validator->fails()) {
				return $this->api_failure('invalid_input', $validator->failed());
			}

			if(User::checkIfExists($data['admin']['email'])) {
				return $this->api_failure('political_admin_email_in_use');
			}

			$signup = TenantSignup::createFromForm($data);

			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

	}

	public function get_pending() {
		$pending = TenantSignup::with('city');

		$sort = request('sort', []);
		$filter = request('filter', []);
		$max = request('max', null);

		TenantSignup::applySorting($pending, request('sort'));

		if(isset($filter['city_name']) && strlen($filter['city_name']) > 0) {
			$pending->whereHas('city', function ($sq) use ($filter) {
				return $sq->where('name_ascii', 'REGEXP', Str::ascii($filter['city_name']));
			});
		}

		if(isset($filter['city_uf']) && strlen($filter['city_uf']) > 0) {
			$pending->whereHas('city', function ($sq) use ($filter) {
				return $sq->where('uf', 'REGEXP', Str::ascii($filter['city_uf']));
			});
		}

		switch($filter['status']) {
			case "all": $pending->withTrashed(); break;
			case "rejected": $pending->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 0); break;
            case "canceled": $pending->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 1); break;
			case "pending_approval": $pending->where('is_approved', 0); break;
			case "pending_setup": $pending->where( 'is_approved', 1)->where('is_provisioned', 0 ); break;
            case "active": $pending->where('is_approved', 1)->where('is_provisioned', 1); break;
			case "pending": default: break;
		}

		if(isset($filter['created_at']) && strlen($filter['created_at']) > 0) {
			$numDays = intval($filter['created_at']);
			$cutoffDate = Carbon::now()->addDays(-$numDays);

			$pending->where('created_at', '>=', $cutoffDate->format('Y-m-d H:i:s'));
		}

		$columns = (isset($sort['cities.name:city_id'])) ? ['tenant_signups.*', 'cities.name'] : ['*'];

		$pending = $max ? $pending->paginate($max, $columns) : $pending->get($columns);
		$meta = $max ? Utils::buildPaginatorMeta($pending) : null;

		$pending->each(function (&$item) { /* @var $item TenantSignup */
			if($item->is_approved && !$item->is_provisioned) {
				$item->provision_url = env('APP_PANEL_URL') . "/admin_setup/" . $item->id . '?token=' . $item->getURLToken();
			}
		});
		
		return response()->json(['data' => $max ? $pending->items() : $pending, 'meta' => $meta]);
	}

	public function export_signups() {

        $city_name = request('city_name');
        $city_uf = request('city_uf');
        $status = request('status');
        $created_at = request('created_at');


		$query = TenantSignup::query()
			->with(['city','judge','tenant.operationalAdmin', 'tenant.politicalAdmin'])
			->orderBy('created_at', 'ASC');

        if(isset($city_name) && strlen($city_name) > 0) {
            $query->whereHas('city', function ($sq) use ($city_name) {
                return $sq->where('name_ascii', 'REGEXP', Str::ascii($city_name));
            });
        }

        if(isset($city_uf) && strlen($city_uf) > 0) {
            $query->whereHas('city', function ($sq) use ($city_uf) {
                return $sq->where('uf', 'REGEXP', Str::ascii($city_uf));
            });
        }

        switch($status) {
            case "all": $query->withTrashed(); break;
            case "rejected": $query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 0); break;
            case "canceled": $query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 1); break;
            case "pending_approval": $query->where('is_approved', 0); break;
            case "pending_setup": $query->where( 'is_approved', 1)->where('is_provisioned', 0 ); break;
            case "active": $query->where('is_approved', 1)->where('is_provisioned', 1); break;
            case "pending": default: break;
        }

        if(isset($created_at) && strlen($created_at) > 0) {
            $numDays = intval($created_at);
            $cutoffDate = Carbon::now()->addDays(-$numDays);

            $query->where('created_at', '>=', $cutoffDate->format('Y-m-d H:i:s'));
        }

		$signups = $query
			->get()
			->map(function ($signup) { /* @var $signup TenantSignup */
				return $signup->toExportArray();
			})
			->toArray();

		Excel::create('buscaativaescolar_adesoes', function($excel) use ($signups) {

			$excel->sheet('signups', function($sheet) use ($signups) {

				$sheet->setOrientation('landscape');
				$sheet->fromArray($signups);

			});

		})->export('xls');
	}

	public function get_via_token(TenantSignup $signup) {
		$token = request('token');
		$validToken = $signup->getURLToken();

		if(!$token) return $this->api_failure('invalid_token');
		if($token !== $validToken) return $this->api_failure('token_mismatch');
		if(!$signup->is_approved) return $this->api_failure('not_approved');
		if($signup->is_provisioned) return $this->api_failure('already_provisioned');
		$cityId = $signup['original']['city_id'];
		$city = $signup->getCitybyId($cityId);
        $signup->setAttribute('city', $city);
		return response()->json($signup);
	}

	public function approve(TenantSignup $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');

			$signup->approve(Auth::user());
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function reject(TenantSignup $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');

			$signup->reject(Auth::user());
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function resendNotification(TenantSignup $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');
			if($signup->is_provisioned) return $this->api_failure('tenant_already_provisioned');

			$signup->sendNotification();
			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function updateRegistrationEmail(TenantSignup $signup) {
		try {

			if(!$signup) return $this->api_failure('invalid_signup_id');
			if(!in_array(request('type'), ['admin', 'mayor'])) return $this->api_failure('invalid_email_type');

			$signup->updateRegistrationEmail(request('type'), request('email'));

			return response()->json(['status' => 'ok', 'signup_id' => $signup->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function complete(TenantSignup $signup) {
		$token = request('token');
		$validToken = $signup->getURLToken();

		if(!$token) return $this->api_failure('invalid_token');
		if($token !== $validToken) return $this->api_failure('token_mismatch');
		if(!$signup->is_approved) return $this->api_failure('not_approved');
		if($signup->is_provisioned) return $this->api_failure('already_provisioned');

		$politicalAdmin = request('political', []);
		$operationalAdmin = request('operational', []);

		if(trim(strtolower($politicalAdmin['email'])) === trim(strtolower($operationalAdmin['email']))) {
			return $this->api_failure("admin_emails_are_the_same");
		}

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

	public function uploadfile(){
        $file = request()->file('file');
        if(!in_array($file->getMimeType(), self::PERMITED_FILES_MIME_TYPES)){
            return response()->json(["reason" => "Arquivo inválido",  "status" => "error"], 400);
        }
        $attachment = Attachment::createFromImageTituloEleitor($file, "Titulo de eleitor de prefeito - " . date('Y-m-d H:i:s'));
        return response()->json(['status' => 'ok', 'link' => $attachment->getURLPublic()]);
    }

}