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

	public function operationalAdmin() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'operational_admin_id');
	}

	public function politicalAdmin() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'political_admin_id');
	}

	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	public function getRouteKeyName() {
		return 'id';
	}

}