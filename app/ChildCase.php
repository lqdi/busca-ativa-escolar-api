<?php
/**
 * busca-ativa-escolar-api
 * ChildCase.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 28/12/2016, 22:00
 */

namespace BuscaAtivaEscolar;


use Illuminate\Database\Eloquent\Model;

class ChildCase extends Model  {

	// TODO: consts to model out case statuses

	protected $table = "children_cases";
	protected $fillable = [
		'child_id',

		'case_status',

		'name',

		'risk_level',

		'is_open', // TODO: reevaluate necessity of these flags
		'is_current',

		'assigned_group_id',
		'assigned_user_id',

		'created_by_user_id',

		'current_step_id',
		'current_step_type',
	];

	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	public function assignedUser() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'assigned_user_id');
	}

	public function currentStep() {
		return $this->morphTo();
	}

	public function steps() {
		// TODO: handle this, as we're planning on polymorphic relationships
		/*
		 * Possibility: children_case_steps table as polymorphic link
		 * - children_case_steps
		 *      - id
		 *      - case_id
		 *      - data_type = BuscaAtivaEscolar\AlertaStepData
		 *      - data_id
		 * - step_data_alerta
		 *      - id (shared interface)
		 *      - case_id (shared interface)
		 *      - type = BuscaAtivaEscolar\AlertaStepData (shared interface)
		 *      - <alerta fields>
		 */

	}

}