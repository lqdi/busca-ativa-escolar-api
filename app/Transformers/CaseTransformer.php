<?php
/**
 * busca-ativa-escolar-api
 * CaseTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 07/01/2017, 23:46
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\ChildCase;
use League\Fractal\TransformerAbstract;

class CaseTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'steps',
		'child',
		'assignedUser',
	];

	protected $defaultIncludes = [
		'steps',
	];

	public function transform(ChildCase $case) {
		return [
			'id' => $case->id,
			'child_id' => $case->child_id,

			'case_status' => $case->case_status,

			'name' => $case->name,

			'risk_level' => $case->risk_level,

			'is_current' => $case->is_current,

			'assigned_group_id' => $case->assigned_group_id,
			'assigned_user_id' => $case->assigned_user_id,

			'created_by_user_id' => $case->created_by_user_id,

			'current_step_id' => $case->current_step_id,
			'current_step_type' => $case->current_step_type,

			'created_at' => $case->created_at->toIso8601String(),
			'updated_at' => $case->created_at->toIso8601String(),
		];
	}

	public function includeSteps(ChildCase $case) {
		$steps = $case->fetchSteps();
		return $this->collection($steps, new StepTransformer(), false);
	}

	public function includeChild(ChildCase $case) {
		$child = $case->child;
		return $this->item($child, new ChildTransformer, false);
	}

	public function includeAssignedUser(ChildCase $case) {
		$assignedUser = $case->assignedUser;
		return $this->item($assignedUser, new UserTransformer, false);
	}

}