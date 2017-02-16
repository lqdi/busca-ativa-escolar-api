<?php
/**
 * busca-ativa-escolar-api
 * ChildTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 07/01/2017, 23:41
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\Child;
use League\Fractal\TransformerAbstract;

class ChildTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'cases',
		'currentCase',
		'currentStep',
		'submitter',
	];

	protected $defaultIncludes = [
		'cases',
		'submitter',
	];

	public function transform(Child $child) {
		return [
			'id' => $child->id,
			'name' => $child->name,

			'tenant_id' => $child->tenant_id,

			'mother_name' => $child->mother_name,
			'father_name' => $child->father_name,

			'risk_level' => $child->risk_level,
			'gender' => $child->gender,
			'age' => $child->age,

			'current_case_id' => $child->current_case_id,

			'current_step_type' => $child->current_step_type,
			'current_step_id' => $child->current_step_id,

			'is_late' => ($this->deadline_status === Child::DEADLINE_STATUS_LATE),

			'alert_status' => $child->alert_status,
			'deadline_status' => $child->deadline_status,
			'child_status' => $child->child_status,

			'created_at' => $child->created_at ? $child->created_at->toIso8601String() : null,
			'updated_at' => $child->updated_at ? $child->updated_at->toIso8601String() : null,
		];
	}

	public function includeCases(Child $child) {
		$cases = $child->cases;
		return $this->collection($cases, new CaseTransformer, false);
	}

	public function includeCurrentCase(Child $child) {
		$currentCase = $child->currentCase;
		return $this->item($currentCase, new CaseTransformer, false);
	}

	public function includeCurrentStep(Child $child) {
		$currentStep = $child->currentStep;
		return $this->item($currentStep, new StepTransformer, false);
	}

	public function includeSubmitter(Child $child) {
		if(!$child->submitter) return null;
		return $this->item($child->submitter, new UserTransformer(), false);
	}

}