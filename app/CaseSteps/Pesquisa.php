<?php
/**
 * busca-ativa-escolar-api
 * PesquisaCaseStep.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:51
 */

namespace BuscaAtivaEscolar\CaseSteps;

use BuscaAtivaEscolar\Child;

class Pesquisa extends CaseStep {

	protected $table = "case_steps_pesquisa";

	public $stepFields = [
		'name',
		'gender',
		'race',
		'dob',
		'rg',
		'cpf',

		'has_been_in_school',
		'reason_not_enrolled',

		'school_last_grade',
		'school_last_year',
		'school_last_name',
		'school_last_status',
		'school_last_age',
		'school_last_address',

		'is_working',
		'work_activity',
		'work_activity_other',
		'work_is_paid',
		'work_weekly_hours',

		'parents_has_mother',
		'parents_has_father',
		'parents_has_brother',

		'parents_who_is_guardian',
		'parents_income',
		'mother_name',

		'guardian_name',
		'guardian_rg',
		'guardian_cpf',
		'guardian_dob',
		'guardian_phone',
		'guardian_race',
		'guardian_schooling',
		'guardian_job',

		'case_cause_ids',

		'handicapped_at_sus',
		'handicapped_reason_not_enrolled',

		'place_address',
		'place_cep',
		'place_reference',
		'place_neighborhood',
		'place_city',
		'place_uf',
		'place_kind',
		'place_is_quilombola',

	];

	protected $casts = [
		'case_cause_ids' => 'array'
	];

	protected function onStart($prevStep = null) {
		$this->flagAsPendingAssignment();
	}

	protected function onComplete($nextStep = null) {
		// While on the front-end we technically save before completing, this may not always be true
		$this->onUpdated();
	}

	protected function onUpdated() {

		if($this->gender) {
			$this->child->gender = $this->gender;
			$this->save();
		}

		if($this->case_cause_ids) {
			$this->childCase->case_cause_ids = $this->case_cause_ids;
			$this->childCase->save();
		}

		$this->child->calculateAgeThroughBirthday($this->dob);
	}

	public function validate($data, $isCompletingStep = false) {
		$data['is_completing_step'] = $isCompletingStep;

		return validator($data, [
			'name' => 'required_for_completion',
			'gender' => 'required_for_completion|' . \BuscaAtivaEscolar\Data\Gender::getSlugValidationMask(),
			'race' => 'required_for_completion|' . \BuscaAtivaEscolar\Data\Race::getSlugValidationMask(),
			'dob' => 'required_for_completion|date',
			'rg' => 'nullable|alpha_num',
			'cpf' => 'nullable|digits:11',

			'has_been_in_school' => 'required_for_completion|boolean',
			'reason_not_enrolled' => 'nullable|required_if:has_been_in_school,0|string',

			'school_last_grade' => 'nullable|required_if:has_been_in_school,1|' . \BuscaAtivaEscolar\Data\SchoolGrade::getSlugValidationMask(),
			'school_last_year' => 'nullable|required_if:has_been_in_school,1|digits:4',
			'school_last_name' => 'nullable|required_if:has_been_in_school,1|string',
			'school_last_status' => 'nullable|required_if:has_been_in_school,1|string',
			'school_last_age' => 'nullable|required_if:has_been_in_school,1|numeric',
			'school_last_address' => 'nullable|required_if:has_been_in_school,1|string',

			'is_working' => 'required_for_completion|boolean',
			'work_activity' => 'nullable|required_if:is_working,1|' . \BuscaAtivaEscolar\Data\WorkActivity::getSlugValidationMask(),
			'work_activity_other' => 'nullable|required_if:work_activity,other|string',
			'work_is_paid' => 'nullable|required_if:is_working,1|boolean',
			'work_weekly_hours' => 'nullable|required_if:is_working,1|numeric',

			'parents_has_mother' => 'nullable|boolean',
			'parents_has_father' => 'nullable|boolean',
			'parents_has_brother' => 'nullable|boolean',

			'parents_who_is_guardian' => 'required_for_completion|in:mother,father,brother',
			'parents_income' => 'nullable|numeric',
			'mother_name' => 'required_for_completion|string',

			'guardian_name' => 'required_for_completion|string',
			'guardian_rg' => 'nullable|alpha_num',
			'guardian_cpf' => 'nullable|digits:11',
			'guardian_dob' => 'nullable|date',
			'guardian_phone' => 'nullable|alpha_dash',
			'guardian_race' =>  'nullable|' . \BuscaAtivaEscolar\Data\Race::getSlugValidationMask(),
			'guardian_schooling' =>  'nullable|' . \BuscaAtivaEscolar\Data\SchoolingLevel::getSlugValidationMask(),
			'guardian_job' => 'nullable|string',

			'case_cause_ids' => 'array|min:1',

			'handicapped_at_sus' => 'nullable|boolean',
			'handicapped_reason_not_enrolled' => 'nullable|required_if:handicapped_at_sus,1|string',

			'place_address' => 'required_for_completion|string',
			'place_cep' => 'nullable|digits:8',
			'place_reference' => 'nullable|string',
			'place_neighborhood' => 'required_for_completion|string',
			'place_city' => 'required_for_completion|string',
			'place_uf' => 'required_for_completion|string|size:2',
			'place_kind' => 'required_for_completion|in:urban,rural',
			'place_is_quilombola' => 'nullable|boolean',
		]);
	}

}