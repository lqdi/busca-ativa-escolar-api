<?php
/**
 * busca-ativa-escolar-api
 * Child.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:20
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model  {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	const STATUS_OUT_OF_SCHOOL = "out_of_school";
	const STATUS_OBSERVATION = "in_observation";
	const STATUS_IN_SCHOOL = "in_school";

	protected $table = "children";
	protected $fillable = [
		'name',

		'tenant_id',
		'city_id',

		'mother_name',
		'father_name',
		'age',

		'current_case_id',

		'current_step_type',
		'current_step_id',

		'child_status',
	];

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	public function currentCase() {
		return $this->hasOne('BuscaAtivaEscolar\ChildCase', 'id', 'current_case_id');
	}

	public function currentStep() {
		return $this->morphTo();
	}

	public function cases() {
		return $this->hasMany('BuscaAtivaEscolar\ChildCase', 'child_id', 'id');
	}

}