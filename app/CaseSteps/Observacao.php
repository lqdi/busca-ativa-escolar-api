<?php
/**
 * busca-ativa-escolar-api
 * Observacao.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:15
 */

namespace BuscaAtivaEscolar\CaseSteps;

use BuscaAtivaEscolar\Child;
use Illuminate\Database\Eloquent\Builder;

class Observacao extends CaseStep {

	protected $table = "case_steps_observacao";

	public $stepFields = [
		'report_date',
		'report_index',

		'is_child_still_in_school',
		'evasion_reason',

		'observations',
	];

	protected function onStart($prevStep = null) {

		$this->child->setStatus(Child::STATUS_OBSERVATION);

		if(!$prevStep || !$prevStep->assignedUser) return $this->flagAsPendingAssignment();
		$this->assignToUser($prevStep->assignedUser);

	}

	protected function onComplete() : bool {

		// Closes or interrupts the underlying case, depending on the child's status on the last report
		if($this->report_index === 4 && $this->is_child_still_in_school) {
			return $this->childCase->complete();
		}

		if(!$this->is_child_still_in_school) {
			return $this->childCase->interrupt();
		}

		return true;

	}

	public function applyAssignableUsersFilter(Builder $query) {
		return $query->whereIn('type', ['supervisor_operacional', 'coordenador_operacional']);
	}

	public function validate($data, $isCompletingStep = false) {
		$data['is_completing_step'] = $isCompletingStep;

		return validator($data, [
			'report_date' => 'required_for_completion|date',
			'report_index' => 'digits:1|in:1,2,3,4',
			'is_child_still_in_school' => 'required_for_completion|boolean',
			'evasion_reason' => 'required_if:is_child_still_in_school,0',
			'observations' => 'string|nullable',
		]);
	}

}