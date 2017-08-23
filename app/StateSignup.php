<?php
/**
 * busca-ativa-escolar-api
 * StateSignup.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/08/2017, 19:31
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Mailables\StateSignupApproved;
use BuscaAtivaEscolar\Mailables\StateSignupRejected;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mail;

/**
 * @property int $id
 * @property string $uf
 * @property string $user_id
 * @property bool $is_approved
 * @property string $ip_addr
 * @property string $user_agent
 * @property array $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 *
 * @property User|null $user
 * @property User|null $judged_by
 */
class StateSignup extends Model {

	use IndexedByUUID;
	use SoftDeletes;
	use Sortable;

	protected $table = "state_signups";
	protected $fillable = [
		'uf',
		'user_id',
		'judged_by',

		'is_approved',

		'ip_addr',
		'user_agent',
		'data',

		// Sort-only fields
		'created_at',
	];

	protected $casts = [
		'is_approved' => 'boolean',
		'data' => 'array',
	];

	public function user() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'user_id');
	}

	public function judge() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'judged_by');
	}

	// -----------------------------------------------------------------------------------------------------------------

	public function approve(User $judge) {
		$this->is_approved = true;
		$this->judged_by = $judge->id;
		$this->save();

		$userFields = [
			'dob',
			'cpf',
			'email',
			'name',
			'phone',
			'mobile',
			'institution',
			'position',
		];

		$adminData = collect($this->data['admin'])->only($userFields)->toArray();
		$adminData['uf'] = $this->uf;
		$adminData['tenant_id'] = null;
		$adminData['type'] = User::TYPE_GESTOR_ESTADUAL;
		$adminData['password'] = password_hash($this->data['admin']['password'], PASSWORD_DEFAULT);

		$supervisorData = collect($this->data['supervisor'])->only($userFields)->toArray();
		$supervisorData['uf'] = $this->uf;
		$supervisorData['tenant_id'] = null;
		$supervisorData['type'] = User::TYPE_SUPERVISOR_ESTADUAL;
		$supervisorData['password'] = password_hash($this->data['supervisor']['password'], PASSWORD_DEFAULT);

		// TODO: validate user data again

		$admin = User::create($adminData);
		$supervisor = User::create($supervisorData);

		$this->user_id = $admin->id;
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

	public function updateRegistrationEmail($type, $email) {
		if(!in_array($type, ['admin', 'supervisor'])) {
			throw new \InvalidArgumentException("Invalid e-mail type: {$type}; valid types are: admin | supervisor");
		}

		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$data = $this->data;
		$data[$type]['email'] = $email;
		$this->data = $data;
		$this->save();
	}

	public function sendNotification() {
		$target = $this->data['admin']['email'];
		Mail::to($target)->send(new StateSignupApproved($this));
	}

	public function sendRejectionNotification() {
		$target = $this->data['admin']['email'];
		Mail::to($target)->send(new StateSignupRejected($this));
	}


	// -----------------------------------------------------------------------------------------------------------------


	/**
	 * Creates a new state sign-up request
	 * @param array $data The data received from the form
	 * @return string The ID of the sign-up request
	 */
	public static function createFromForm($data) {
		$signup = new StateSignup();

		$signup->is_approved = false;
		$signup->ip_addr = $_SERVER['REMOTE_ADDR'];
		$signup->user_agent = $_SERVER['HTTP_USER_AGENT'];

		$signup->uf = $data['uf'];
		$signup->data = collect($data)->only(['uf', 'admin', 'supervisor'])->toArray();

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
			'uf' => 'required|string',
			'admin.dob' => 'required|date',
			'admin.cpf' => 'required|alpha_dash',
			'admin.email' => 'required|email',
			'admin.name' => 'required|string',
			'admin.phone' => 'required|alpha_dash',
			'admin.mobile' => 'nullable|alpha_dash',
			'admin.institution' => 'required|string',
			'admin.position' => 'required|string',
			'admin.password' => 'required|string',
			'supervisor.dob' => 'required|date',
			'supervisor.cpf' => 'required|alpha_dash',
			'supervisor.email' => 'required|email',
			'supervisor.name' => 'required|string',
			'supervisor.phone' => 'required|alpha_dash',
			'supervisor.mobile' => 'nullable|alpha_dash',
			'supervisor.institution' => 'required|string',
			'supervisor.position' => 'required|string',
			'supervisor.password' => 'required|string',
		]);
	}


}