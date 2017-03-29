<?php
/**
 * busca-ativa-escolar-api
 * SignUp.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 21/02/2017, 19:06
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Mailables\SignupApproved;
use BuscaAtivaEscolar\Mailables\SignupRejected;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class SignUp extends Model {

	use IndexedByUUID;
	use SoftDeletes;
	use Sortable;

	protected $table = "signups";
	protected $fillable = [
		'city_id',
		'tenant_id',
		'is_approved',
		'is_provisioned',
		'ip_addr',
		'user_agent',
		'data',

		// Sort-only fields
		'cities.name',
	];

	protected $casts = [
		'is_approved' => 'boolean',
		'is_provisioned' => 'boolean',
		'data' => 'array',
	];

	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	public function judge() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'judged_by');
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function approve(User $judge) {
		$this->is_approved = true;
		$this->judged_by = $judge->id;
		$this->save();

		$this->sendNotification();
	}

	public function reject(User $judge) {
		$this->is_approved = false;
		$this->judged_by = $judge->id;
		$this->save();

		$this->delete();

		$this->sendRejectionNotification();
	}

	public function sendNotification() {
		$target = $this->data['admin']['email'];
		Mail::to($target)->send(new SignupApproved($this));
	}

	public function sendRejectionNotification() {
		$target = $this->data['admin']['email'];
		Mail::to($target)->send(new SignupRejected($this));
	}

	public function getURLToken() {
		return self::generateURLToken($this);
	}


	// -----------------------------------------------------------------------------------------------------------------

	public static function generateURLToken(SignUp $signup) {
		return sha1(env('APP_KEY') . $signup->id . $signup->created_at);
	}

	/**
	 * Creates a new tenant sign-up request
	 * @param array $data The data received from the form
	 * @return string The ID of the sign-up request
	 */
	public static function createFromForm($data) {
		$signup = new SignUp();

		$signup->is_approved = false;
		$signup->is_provisioned = false;
		$signup->ip_addr = $_SERVER['REMOTE_ADDR'];
		$signup->user_agent = $_SERVER['HTTP_USER_AGENT'];

		$signup->city_id = $data['city_id'];
		$signup->tenant_id = null;
		$signup->data = collect($data)->only(['city_id', 'mayor', 'admin'])->toArray();

		$signup->save();

		return $signup;
	}

	/**
	 * Validates a sign-up request
	 * @param array $data The data received from the form
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public static function validate($data) {
		return validator($data, [
			'city_id' => 'required',
			'admin.dob' => 'required|date',
			'admin.email' => 'required|email',
			'admin.name' => 'required|string',
			'admin.phone' => 'required|alpha_dash',
			'admin.mobile' => 'nullable|alpha_dash',
			'admin.institution' => 'required|string',
			'admin.position' => 'required|string',
			'mayor.name' => 'required|string',
			'mayor.dob' => 'required|date',
			'mayor.email' => 'required|email',
			'mayor.phone' => 'required|alpha_dash',
			'mayor.mobile' => 'nullable|alpha_dash',
		]);
	}

}