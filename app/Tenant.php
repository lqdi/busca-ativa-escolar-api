<?php
/**
 * busca-ativa-escolar-api
 * Tenant.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 20:26
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Exceptions\ValidationException;
use BuscaAtivaEscolar\Mailables\UserCredentialsForNewTenant;
use BuscaAtivaEscolar\Settings\TenantSettings;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\Sortable;
use Cache;
use Carbon\Carbon;
use DB;
use Geocoder\Geocoder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;
use Mail;

/**
 * @property int $id
 *
 * @property string $name
 * @property string $city_id
 * @property string $uf
 * @property string $operational_admin_id
 * @property string $political_admin_id
 * @property boolean $is_registered
 * @property boolean $is_active
 * @property boolean $is_setup
 * @property Carbon|null $last_active_at
 * @property Carbon|null $registered_at
 * @property Carbon|null $activated_at
 * @property float $map_lat
 * @property float $map_lng
 *
 * @property City $city
 * @property Group $primary_group
 * @property TenantSettings $settings
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Tenant extends Model  {

	use IndexedByUUID;
	use SoftDeletes;
	use Sortable;

	protected $table = "tenants";

	protected $fillable = [
		'name',
		'city_id',
		'uf',

		'operational_admin_id',
		'political_admin_id',

		'is_registered',
		'is_active',
		'is_setup',

		'last_active_at',

		'registered_at',
		'activated_at',
		
		'map_lat',
		'map_lng',
	];

	protected $casts = [
		'is_registered' => 'boolean',
		'is_active' => 'boolean',

		'last_active_at' => 'datetime',
		'registered_at' => 'datetime',
		'activated_at' => 'datetime'
	];

	// ------------------------------------------------------------------------

	/**
	 * The operational admin ("coordenador operacional") for this instance
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function operationalAdmin() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'operational_admin_id')->withTrashed();
	}

	/**
	 * The political admin ("gestor político") for this instance
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function politicalAdmin() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'political_admin_id')->withTrashed();
	}

	/**
	 * The primary/default group for users
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function primaryGroup() {
		return $this->hasOne('BuscaAtivaEscolar\Group', 'tenant_id', 'id');
	}

	/**
	 * The city this tenant is associated with
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	/**
	 * Internal, primary key for API routing.
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'id';
	}

	/**
	 * Gets the expected deadline for a step by its slug, as configured in the tenant
	 * @param string $step_slug
	 * @return int
	 */
	public function getDeadlineFor($step_slug) {
		return $this->getSettings()->stepDeadlines[$step_slug] ?? 0;
	}

	/**
	 * Gets the Tenant's map center coordinates, or null if none found
	 * @return array|null
	 */
	public function getMapCoordinates() {
		if(!$this->map_lat || !$this->map_lng) {
			$geocoder = app('geocoder'); /* @var $geocoder Geocoder */

			$place = $geocoder->geocode("{$this->name} - Brasil")->get()->first();

			if(!$place) {
				Log::error("Failed to geocode tenant map center: {$this->name}");
				return null;
			}

			$this->update(['map_lat' => $place->getLatitude(), 'map_lng' => $place->getLongitude()]);
		}

		return ['lat' => $this->map_lat, 'lng' => $this->map_lng, 'zoom' => 10];
	}

	// ------------------------------------------------------------------------

	/**
	 * Updates the tenant settings object
	 * @param TenantSettings $settings
	 */
	public function setSettings(TenantSettings $settings) {
		$this->settings = $settings->serialize();
		$this->save();
	}

	/**
	 * Gets the tenant's current settings
	 * @return TenantSettings
	 */
	public function getSettings() {
		if(!$this->settings) return new TenantSettings();
		return TenantSettings::unserialize($this->settings);
	}

	// ------------------------------------------------------------------------

	/**
	 * Generates a display name for a tenant, based on city UF code and name.
	 * Formats using national standards (UF always uppercase, city name with each word first char uppercase).
	 * @param City $city The city the tenant will be associated with
	 * @return string
	 */
	public static function generateNameFromCity(City $city) {
		return strtoupper($city->uf) . ' / ' . ucwords($city->name);
	}

	/**
	 * Provisions a tenant based on sign-up data
	 *
	 * @param TenantSignup $signup
	 * @param array $politicalAdminData
	 * @param array $operationalAdminData
	 *
	 * @throws \Exception on failure
	 *
	 * @returns Tenant
	 */
	public static function provision(TenantSignup $signup, array $politicalAdminData, array $operationalAdminData) {

		$city = $signup->city;

		if(!$city) {
			throw new ValidationException('invalid_signup_city');
		}

		if(User::checkIfExists($politicalAdminData['email'])) {
			throw new ValidationException('political_admin_email_in_use');
		}

		if(User::checkIfExists($operationalAdminData['email'])) {
			throw new ValidationException('operational_admin_email_in_use');
		}

		$now = date('Y-m-d H:i:s');

		$tenant = Tenant::create([
			'uf' => $city->uf,
			'name' => Tenant::generateNameFromCity($city),
			'city_id' => $city->id,
			'operational_admin_id' => null,
			'political_admin_id' => null,
			'is_registered' => false,
			'is_active' => false,
			'last_active_at' => $now,
			'registered_at' => $signup->created_at,
			'activated_at' => $now,
		]);

		$politicalAdminData['type'] = User::TYPE_GESTOR_POLITICO;
		$politicalAdminData['uf'] = $tenant->uf;
		$politicalAdminData['tenant_id'] = $tenant->id;

		$operationalAdminData['type'] = User::TYPE_GESTOR_OPERACIONAL;
		$operationalAdminData['tenant_id'] = $tenant->id;
		$operationalAdminData['uf'] = $tenant->uf;

		$politicalAdmin = new User();
		$politicalAdmin->fill($politicalAdminData);
		$politicalAdmin->password = password_hash($politicalAdminData['password'], PASSWORD_DEFAULT);

		$validator = $politicalAdmin->validate($politicalAdminData, true, true, false);

		if($validator->fails()) {
			$tenant->delete();
			throw new ValidationException('invalid_political_admin_data', $validator);
		}

		$operationalAdmin = new User();
		$operationalAdmin->fill($operationalAdminData);
		$operationalAdmin->password = password_hash($operationalAdminData['password'], PASSWORD_DEFAULT);

		$validator = $operationalAdmin->validate($operationalAdminData, true, true, false);

		if($validator->fails()) {
			$tenant->delete();
			throw new ValidationException('invalid_operational_admin_data', $validator);
		}


		$politicalAdmin->save();
		$operationalAdmin->save();

		Group::createDefaultPrimaryGroup($tenant);

		$tenant->political_admin_id = $politicalAdmin->id;
		$tenant->operational_admin_id = $operationalAdmin->id;
		$tenant->is_registered = true;
		$tenant->is_active = true;
		$tenant->save();

		$signup->is_provisioned = true;
		$signup->tenant_id = $tenant->id;
		$signup->save();

		Mail::to($politicalAdmin->email)->send(new UserCredentialsForNewTenant($signup, $tenant, $politicalAdmin, $politicalAdminData['password']));
		Mail::to($operationalAdmin->email)->send(new UserCredentialsForNewTenant($signup, $tenant, $operationalAdmin, $operationalAdminData['password']));

		return $tenant;

	}

	/**
	 * Gets a list of all tenant IDs within a specific state
	 * @param string $uf
	 * @return array
	 */
	public static function getIDsWithinUF($uf) {
		return Cache::remember('uf_tenants_' . $uf, config('cache.timeouts.uf_tenants'), function () use ($uf) {
			return DB::table('tenants')
				->where('uf', $uf)
				->get(['id'])
				->pluck('id')
				->toArray();
		});
	}

}