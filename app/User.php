<?php
/**
 * busca-ativa-escolar-api
 * Iser.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 20:26
 */

namespace BuscaAtivaEscolar;

use BuscaAtivaEscolar\Notifications\PasswordReset;
use BuscaAtivaEscolar\Settings\UserSettings;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\Sortable;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * @property int $id
 *
 * @property string name
 * @property string $email
 * @property string $password
 * @property string $tenant_id
 * @property string $city_id
 * @property string $group_id
 * @property string $uf
 * @property string $type
 * @property string $dob
 * @property string $cpf
 * @property string $work_phone
 * @property string $work_mobile
 * @property string $personal_mobile
 * @property string $skype_username
 * @property string $work_address
 * @property string $work_cep
 * @property string $work_neighborhood
 * @property string $work_city_id
 * @property string $work_city_name
 * @property string $work_uf
 * @property string $institution
 * @property string $position
 * @property string $is_suspended
 * @property string $suspended_by
 *
 * @property Tenant|null $tenant
 * @property City|null $city
 * @property Group|null $group
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 *
 * @property string $remember_token
 * @property-read UserSettings $settings
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract {

	use Authenticatable;
	use Authorizable;
	use IndexedByUUID;
	use Notifiable;
	use SoftDeletes;
	use TenantScopedModel;
	use Sortable;

	const ID_EDUCACENSO_BOT = "b6b720e1-bee4-4cbb-9700-f1651db45094";

	// Types of user
	const TYPE_SUPERUSER = "superuser";
	const TYPE_GESTOR_NACIONAL = "gestor_nacional";
	const TYPE_COMITE_NACIONAL = "comite_nacional";
	const TYPE_GESTOR_POLITICO = "gestor_politico";
	const TYPE_GESTOR_ESTADUAL = "gestor_estadual";
	const TYPE_COMITE_ESTADUAL = "comite_estadual";
	const TYPE_GESTOR_OPERACIONAL = "coordenador_operacional";
	const TYPE_SUPERVISOR_INSTITUCIONAL = "supervisor_institucional";
	const TYPE_SUPERVISOR_ESTADUAL = "supervisor_estadual";
	const TYPE_TECNICO_VERIFICADOR = "tecnico_verificador";
	const TYPE_AGENTE_COMUNITARIO = "agente_comunitario";

	// Which user types are allowed to be assigned
	static $ALLOWED_TYPES = [
		self::TYPE_GESTOR_POLITICO,
		self::TYPE_GESTOR_OPERACIONAL,
		self::TYPE_SUPERVISOR_INSTITUCIONAL,
		self::TYPE_TECNICO_VERIFICADOR,
		self::TYPE_AGENTE_COMUNITARIO,
		self::TYPE_GESTOR_ESTADUAL,
		self::TYPE_SUPERVISOR_ESTADUAL,
	];

	public static $TENANT_SCOPED_TYPES = [
		self::TYPE_GESTOR_POLITICO,
		self::TYPE_GESTOR_OPERACIONAL,
		self::TYPE_SUPERVISOR_INSTITUCIONAL,
		self::TYPE_TECNICO_VERIFICADOR,
		self::TYPE_AGENTE_COMUNITARIO,
	];

	public static $UF_SCOPED_TYPES = [
		self::TYPE_GESTOR_ESTADUAL,
		self::TYPE_COMITE_ESTADUAL,
		self::TYPE_SUPERVISOR_ESTADUAL,
	];

	public static $GLOBAL_SCOPED_TYPES = [
		self::TYPE_SUPERUSER,
		self::TYPE_GESTOR_NACIONAL,
		self::TYPE_COMITE_NACIONAL,
	];

    protected $fillable = [
    	'name',
		'email',
		'password',

		'tenant_id',
		'city_id',
		'group_id',
		'uf',

		'type',

		'dob',
		'cpf',

		'work_phone',
		'work_mobile',

		'personal_mobile',
		'skype_username',

		'work_address',
		'work_cep',
		'work_neighborhood',
		'work_city_id',
		'work_city_name',
		'work_uf',

		'institution',
		'position',

		'is_suspended',
		'suspended_by',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	// ------------------------------------------------------------------------

	/**
	 * The tenant this user belongs to.
	 * Will be null when users are global users (SUPERUSER and GESTOR_NACIONAL)
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	/**
	 * The city this user registered at, always the same city as the tenant.
	 * Will be null when users are global users (SUPERUSER and GESTOR_NACIONAL)
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	/**
	 * The user group this user belongs to.
	 * Will be null when users are global users (SUPERUSER and GESTOR_NACIONAL)
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function group() {
		return $this->hasOne('BuscaAtivaEscolar\Group', 'id', 'group_id');
	}

	/**
	 * Internal, primary key for API routing.
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'id';
	}

	/**
	 * Resolves which e-mail to send notifications to
	 * @return string
	 */
	public function routeNotificationForMail() {
		return $this->email;
	}

	/**
	 * Resolves which phone number to send SMS to
	 * @return string
	 */
	public function routeNotificationForNexmo() {
		return $this->personal_mobile;
	}

	/**
	 * Gets the user's list of preferred channels for receiving notifications
	 * @param string $relationship The type of relationship (default, assigned_to_me, assigned_to_group or all_cases)
	 * @return array
	 */
	public function getNotificationChannels($relationship = 'default') {
		return $this->getSettings()->getNotificationChannels($relationship);
	}

	/**
	 * Updates the user settings object
	 * @param UserSettings $settings
	 */
	public function setSettings(UserSettings $settings) {
		$this->settings = $settings->serialize();
		$this->save();
	}

	/**
	 * Gets the user settings object
	 * @return UserSettings
	 */
	public function getSettings() {
		if(!$this->settings) return new UserSettings();
		return UserSettings::unserialize($this->settings);
	}

	/**
	 * Gets the list of permissions for the user, based on their type
	 * @return array
	 */
	public function getPermissions() {
		if(!$this->type) return [];
		$permissions = config('user_type_permissions.' . $this->type, []);

		if($this->hasType(self::TYPE_SUPERVISOR_INSTITUCIONAL) && $this->belongsToPrimaryGroup()) {
			array_push($permissions, 'settings.educacenso');
		}

		return $permissions;
	}

	/**
	 * Checks if a user is of a certain type
	 * @param null|string $type The type to check against (@see User::TYPE_*)
	 * @return bool
	 */
	public function hasType(?string $type) {
		if(!$this->type) return false;
		if(!$type) return false;
		return $this->type === $type;
	}

	/**
	 * Returns one of the available phone numbers in the account, following the priority:
	 * work phone, work mobile and personal mobile
	 * @return string
	 */
	public function getContactPhone() {
		if($this->work_phone) return $this->work_phone;
		if($this->work_mobile) return $this->work_mobile;
		return $this->personal_mobile;
	}

	/**
	 * Checks if the user belongs to the primary tenant group
	 * @return bool
	 */
	public function belongsToPrimaryGroup() {
		return $this->tenant->primary_group_id && $this->group_id === $this->tenant->primary_group_id;
	}

	/**
	 * Gets the list of user types this user can manage, based on their type
	 * @return array
	 */
	public function getWhoCanManage() {
		if(!$this->type) return [];
		return config('user_type_permissions.can_manage_types.' . $this->type, []);
	}

	/**
	 * Gets the list of user types this user can view/filter, based on their type
	 * @return array
	 */
	public function getWhoCanFilter() {
		if(!$this->type) return [];
		return config('user_type_permissions.can_filter_types.' . $this->type, []);
	}

	/**
	 * Checks if a user has a certain permission
	 * @param string $permission
	 * @param array $arguments
	 * @return bool
	 */
	public function can($permission, $arguments = []) {
		if(!$this->type) return false;
		return in_array($permission, config('user_type_permissions.' . $this->type, []));
	}

	/**
	 * Checks if a user lacks a certain permission
	 * @param string $permission
	 * @param array $arguments
	 * @return bool
	 */
	public function cannot($permission, $arguments = []) {
		return !$this->can($permission);
	}

	/**
	 * Checks if the user can manage/edit a specific user
	 * @param User $user The user being edited
	 * @return bool
	 */
	public function canManageUser(User $user) {
		$canManageTypes = config('user_type_permissions.can_manage_types.' . $this->type, []);
		return in_array($user->type, $canManageTypes);
	}

	/**
	 * Checks if a user is global or restricted/assigned to a specific tenant.
	 * @return bool True when tenant-based, false when global.
	 */
	public function isRestrictedToTenant() {
		return !in_array($this->type, self::$GLOBAL_SCOPED_TYPES) && !in_array($this->type, self::$UF_SCOPED_TYPES);
	}

	/**
	 * Checks if a user is global or restricted/assigned to tenants in a specific state.
	 * @return bool True when state-based, false when global.
	 */
	public function isRestrictedToUF() {
		return in_array($this->type, self::$UF_SCOPED_TYPES);
	}

	/**
	 * Checks if a user is global or restricted/assigned to tenants in a specific state.
	 * @return bool True when state-based, false when global.
	 */
	public function isGlobal() {
		return in_array($this->type, self::$GLOBAL_SCOPED_TYPES);
	}

	/**
	 * Gets the front-end URL for completing a password reset.
	 * @return string
	 */
	public function getPasswordResetURL() {
		return str_finish(env('APP_PANEL_URL'), '/') . "password_reset?email={$this->email}&token={$this->remember_token}";
	}

	/**
	 * Generates a token and sends an e-mail to the user requesting the password reset.
	 */
	public function sendPasswordResetNotification() {
		$this->generatePasswordResetToken();
		$this->notify(new PasswordReset());
	}

	/**
	 * Generates and persists a token for the password reset.
	 */
	public function generatePasswordResetToken() {
		$this->remember_token = str_random(40);
		$this->save();
	}

	/**
	 * Completes a password reset request, effectively changing the user password
	 * @param string $token The reset token provided
	 * @param string $newPassword The new password
	 * @throws \Exception One of these failure reasons:
	 *     reset_not_requested, missing_token, token_mismatch, token_mismatch, password_too_short
	 */
	public function resetPassword(string $token, string $newPassword) {
		if(!$this->remember_token) throw new \Exception("reset_not_requested");
		if(!$token) throw new \Exception("missing_token");
		if($token !== $this->remember_token) throw new \Exception("token_mismatch");
		if(strlen($newPassword) < 6) throw new \Exception("password_too_short");

		$this->remember_token = null;
		$this->password = password_hash($newPassword, PASSWORD_DEFAULT);
		$this->save();
	}

	/**
	 * Validates data inputted to the user
	 *
	 * @param array $data The given data
	 * @param bool $isCreating Are we creating or updating a user?
	 * @param bool $needsTenantID Does this user require a tenant ID?
	 * @param bool $needsUF Does this user require a UF?
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validate($data, $isCreating = false, $needsTenantID = true, $needsUF = false) {

		return validator($data, [
			'name' => 'required|string',
			'email' => ($isCreating ? 'required' : 'nullable') . '|email',
			'password' => ($isCreating ? 'required' : 'nullable') . '|min:6',

			'tenant_id' => ($needsTenantID) ? 'required' : 'nullable',
			'city_id' => 'nullable',
			'group_id' => 'nullable',

			'uf' => ($needsUF) ? 'required' : 'nullable',

			'type' => 'required:in:' . join(",", self::$ALLOWED_TYPES),

			'dob' => 'required|date',
			'cpf' => 'required|alpha_dash',

			'work_phone' => 'nullable|alpha_dash',
			'work_mobile' => 'nullable|alpha_dash',
			'personal_mobile' => 'nullable|alpha_dash',
			'skype_username' => 'nullable|alpha_dash',

			'work_address' => 'nullable|string',
			'work_cep' => 'nullable|string',
			'work_neighborhood' => 'nullable|string',
			'work_city_id' => 'nullable|string',
			'work_city_name' => 'nullable|string',
			'work_uf' => 'nullable|string',

			'institution' => 'nullable|string',
			'position' => 'nullable|string',
		]);
	}

	public function toExportArray() {
		return [
			'UF' => $this->tenant->city->uf ?? '',
			'Município' => $this->tenant->city->name ?? '',
			'Nome interno' => $this->tenant->name ?? '',
			'Data de adesão' => $this->tenant ? $this->tenant->created_at->toDateTimeString() : '',
			'Data de cadastro' => $this->created_at ? $this->created_at->toDateTimeString() : '',
			'Nome do usuário' => $this->name,
			'E-mail' => $this->email,
			'Telefone Institucional' => $this->work_phone,
			'Celular Institucional' => $this->work_mobile,
			'Celular Pessoal' => $this->personal_mobile,
			'Data de nascimento' => $this->dob,
			'Tipo' => trans('user.type.' . $this->type),
			'Grupo' => $this->group->name ?? '',
			'Instituição' => $this->institution,
			'Posição' => $this->position,
			'Status' => $this->deleted_at ? 'Inativo' : 'Ativo',
		];
	}

	// ------------------------------------------------------------------------

	/**
	 * Registers a user with given data.
	 * Expected fields are "email" and "password".
	 *
	 * @param array $data The user data
	 * @return User A registered user
	 * @throws \Exception When a user already exists with same e-mail, or when query fails
	 */
	public static function register(array $data) {
		$data['email'] = trim(strtolower($data['email']));
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		$existingUser = self::query()->where('email', $data['email'])->first();
		if($existingUser) throw new \Exception("email_already_exists");

		return self::create($data);
	}

	/**
	 * Checks if a user with a specific e-mail already exists in the database
	 * @param string $email The e-mail to check against
	 * @return bool
	 */
	public static function checkIfExists($email) {
		return (self::query()
				->where('email', '=', $email)
				->whereNull('deleted_at')
				->count() > 0);
	}

	/**
	 * Gets the list of users belonging to the specified groups
	 * @param int[] $groupIDs A list of group IDs to search for
	 * @return User[]|Collection The resulting list of users
	 */
	public static function findByGroupIDs($groupIDs) {
		return self::query()->whereIn('group_id', $groupIDs)->get();
	}
}
