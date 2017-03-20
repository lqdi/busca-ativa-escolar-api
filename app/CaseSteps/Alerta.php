<?php
/**
 * busca-ativa-escolar-api
 * Alerta.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:43
 */

namespace BuscaAtivaEscolar\CaseSteps;

class Alerta extends CaseStep  {

	protected $table = "case_steps_alerta";

	public $stepFields = [
		'name',
		'gender',
		'race',
		'dob',
		'rg',

		'cpf',
		'nis',
		'alert_cause_id',

		'mother_name',
		'mother_rg',
		'mother_phone',

		'father_name',
		'father_rg',
		'father_phone',

		'place_address',
		'place_cep',
		'place_reference',
		'place_neighborhood',
		'place_city_id',
		'place_city_name',
		'place_uf',
		'place_phone',
		'place_mobile',
		'place_lat',
		'place_lng',
		'place_map_region',
		'place_map_geocoded_address',
	];

	protected $casts = [
		'place_map_geocoded_address' => 'array',
	];

	protected function onComplete() : bool {

		if($this->gender) $this->child->gender = $this->gender;
		if($this->name) $this->child->name = $this->name;
		if($this->mother_name) $this->child->mother_name = $this->mother_name;
		if($this->father_name) $this->child->father_name = $this->father_name;

		$this->child->save();

		if(!$this->dob) return true;

		$this->child->recalculateAgeThroughBirthday($this->dob);

		$address = $this->child->updateCoordinatesThroughGeocoding("{$this->place_address} - {$this->place_city_name} - {$this->place_uf}");

		$this->update([
			'place_lat' => ($address) ? $address->getLatitude() : null,
			'place_lng' => ($address) ? $address->getLongitude() : null,
			'place_map_region' => ($address) ? $address->getSubLocality() : null,
			'place_map_geocoded_address' => ($address) ? $address->toArray() : null,
		]);

		return true;

	}

	public function validate($data, $isCompletingStep = false) {
		return validator($data, [
			'name' => 'required',
			'gender' => \BuscaAtivaEscolar\Data\Gender::getSlugValidationMask(),
			'race' => \BuscaAtivaEscolar\Data\Race::getSlugValidationMask(),
			'dob' => 'date',
			'rg' => 'alpha_num',

			'cpf' => 'digits:11',
			'nis' => 'alpha_num',
			'alert_cause_id' => 'required|' . \BuscaAtivaEscolar\Data\AlertCause::getSlugValidationMask('id'),

			'mother_name' => 'required|string',
			'mother_rg' => 'alpha_num',
			'mother_phone' => 'alpha_dash',

			'father_name' => 'string',
			'father_rg' => 'alpha_num',
			'father_phone' => 'alpha_dash',

			'place_address' => 'required|string',
			'place_cep' => 'digits:8',
			'place_reference' => 'string',
			'place_neighborhood' => 'required|string',
			'place_city_id' => 'required|string',
			'place_city_name' => 'required|string',
			'place_uf' => 'required|string|size:2',
			'place_phone' => 'alpha_dash',
			'place_mobile' => 'alpha_dash',
		]);
	}

}