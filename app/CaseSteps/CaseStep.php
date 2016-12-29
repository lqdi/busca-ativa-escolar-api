<?php
/**
 * busca-ativa-escolar-api
 * CaseStep.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:22
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class CaseStep extends Model {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	// TODO: lay out step statuses (or should we use flags?)
	// TODO: maybe move mandatory step fields to __construct, or use a way to compose it

	public function getRouteKeyName() {
		return 'id';
	}

	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	public function childCase() {
		return $this->hasOne('BuscaAtivaEscolar\ChildCase', 'id', 'case_id');
	}

	public static function generate(Tenant $tenant, ChildCase $case, $class, array $data) {
		$data['tenant_id'] = $tenant->id;
		$data['case_id'] = $case->id;
		$data['step_type'] = $class;

		// TODO: does this work? or do we need a linear factory method?

		return ($class)::create($data);
	}

}