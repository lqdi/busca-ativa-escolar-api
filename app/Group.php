<?php
/**
 * busca-ativa-escolar-api
 * Group.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 23/01/2017, 18:10
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Settings\GroupSettings;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model {

	use IndexedByUUID;
	use SoftDeletes;
	use TenantScopedModel;

	protected $table = "groups";
	protected $fillable = [
		'tenant_id',

		'name',
		'is_primary',
	];

	protected $casts = [
		'is_primary' => 'boolean'
	];

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * The tenant this user group belongs to.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	/**
	 * The users belonging in this user group.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users() {
		return $this->hasMany('BuscaAtivaEscolar\User', 'group_id', 'id');
	}

	// -----------------------------------------------------------------------------------------------------------------

	/**
	 * Updates the group settings object
	 * @param GroupSettings $settings
	 */
	public function setSettings(GroupSettings $settings) {
		$this->settings = $settings->serialize();
		$this->save();
	}

	/**
	 * Gets the group settings object
	 * @return GroupSettings
	 */
	public function getSettings() {
		if(!$this->settings) return new GroupSettings();
		return GroupSettings::unserialize($this->settings);
	}

	/**
	 * Creates the default primary group for a tenant (Secretaria da Educação)
	 * @param Tenant $tenant
	 * @return Group
	 */
	public static function createDefaultPrimaryGroup(Tenant $tenant) {
		return self::create([
			'tenant_id' => $tenant->id,
			'name' => 'Secretaria da Educação',
			'is_primary' => true
		]);
	}

}