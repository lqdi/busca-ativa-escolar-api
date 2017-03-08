<?php
/**
 * busca-ativa-escolar-api
 * GestaoDoCaso.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:11
 */

namespace BuscaAtivaEscolar\CaseSteps;

use Illuminate\Database\Eloquent\Builder;

class GestaoDoCaso extends CaseStep {

	protected $table = "case_steps_gestao_do_caso";

	public $stepFields = [
		'actions_description',
	];

	protected function onStart($prevStep = null) {
		$this->flagAsPendingAssignment();
	}

	public function applyAssignableUsersFilter(Builder $query) {
		return $query->whereIn('type', ['supervisor_operacional', 'coordenador_operacional']);
	}

	public function validate($data, $isCompletingStep = false) {
		return validator($data, [
			'actions_description' => 'required|string',
		]);
	}

}