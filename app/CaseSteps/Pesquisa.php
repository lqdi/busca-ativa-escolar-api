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

	// TODO: when this step is filled, calculate "age" field via "dob" field

	protected function onStart($prevStep = null) {
		$this->flagAsPendingAssignment();
	}

	public function validate($data, $isCompletingStep = false) {
		$data['is_completing_step'] = $isCompletingStep;

		return validator($data, [
			'name' => 'required_for_completion',
			'gender' => 'required_for_completion|' . \BuscaAtivaEscolar\Data\Gender::getSlugValidationMask(),
			'race' => 'required_for_completion|' . \BuscaAtivaEscolar\Data\Race::getSlugValidationMask(),
			'dob' => 'required_for_completion|date',
			'rg' => 'alpha_num',
			'cpf' => 'digits:11',

			'has_been_in_school' => 'required_for_completion|boolean',
			'reason_not_enrolled' => 'required_if:has_been_in_school,true|string',

			'school_last_grade' => 'required_if:has_been_in_school,true|' . \BuscaAtivaEscolar\Data\SchoolGrade::getSlugValidationMask(),
			'school_last_year' => 'required_if:has_been_in_school,true|digits:4',
			'school_last_name' => 'required_if:has_been_in_school,true|string',
			'school_last_status' => 'required_if:has_been_in_school,true|string',
			'school_last_age' => 'required_if:has_been_in_school,true|numeric',
			'school_last_address' => 'required_if:has_been_in_school,true|string',

			'is_working' => 'required_for_completion|boolean',
			'work_activity' => 'required_if:is_working,true|' . \BuscaAtivaEscolar\Data\WorkActivity::getSlugValidationMask(),
			'work_activity_other' => 'required_if:work_activity,other|string',
			'work_is_paid' => 'required_if:is_working,true|boolean',
			'work_weekly_hours' => 'required_if:is_working,true|numeric',

			'parents_has_mother' => 'required_for_completion|boolean',
			'parents_has_father' => 'required_for_completion|boolean',
			'parents_has_brother' => 'required_for_completion|boolean',

			'parents_who_is_guardian' => 'required_for_completion|in:mother,father,brother',
			'parents_income' => 'required_for_completion|numeric',
			'mother_name' => 'required_for_completion|string',

			'guardian_name' => 'required_for_completion|string',
			'guardian_rg' => 'alpha_num',
			'guardian_cpf' => 'digits:11',
			'guardian_dob' => 'date',
			'guardian_phone' => 'alpha_dash',
			'guardian_race' =>  \BuscaAtivaEscolar\Data\Race::getSlugValidationMask(),
			'guardian_schooling' =>  \BuscaAtivaEscolar\Data\SchoolingLevel::getSlugValidationMask(),
			'guardian_job' => 'string',

			'case_cause_ids' => 'array|min:1',

			'handicapped_at_sus' => 'required_for_completion|boolean',
			'handicapped_reason_not_enrolled' => 'required_if:handicapped_at_sus,true|string',

			'place_address' => 'required_for_completion|string',
			'place_cep' => 'digits:8',
			'place_reference' => 'string',
			'place_neighborhood' => 'required_for_completion|string',
			'place_city' => 'required_for_completion|string',
			'place_uf' => 'required_for_completion|string|size:2',
			'place_kind' => 'required_for_completion|in:urbano,rural',
			'place_is_quilombola' => 'required_for_completion|boolean',
		]);
	}

}