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


use BuscaAtivaEscolar\Settings\TenantSettings;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model  {

	use IndexedByUUID;
	use SoftDeletes;

	protected $table = "tenants";

	protected $fillable = [
		'name',
		'city_id',
		'operational_admin_id',
		'political_admin_id',

		'is_registered',
		'is_active',

		'last_active_at',

		'registered_at',
		'activated_at',
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
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'operational_admin_id');
	}

	/**
	 * The political admin ("gestor político") for this instance
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function politicalAdmin() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'political_admin_id');
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

}