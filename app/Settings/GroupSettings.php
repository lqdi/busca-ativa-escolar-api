<?php
/**
 * busca-ativa-escolar-api
 * GroupSettings.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 13/02/2017, 18:39
 */

namespace BuscaAtivaEscolar\Settings;


use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\SerializableObject;

class GroupSettings extends SerializableObject {

	public $alerts = [
		10 =>  true, // Adolescente em conflito com a lei
		20 =>  true, // Criança ou adolescente com deficiência(s)
		30 =>  true, // Criança ou adolescente com doença(s) que impeça(m) ou dificulte(m) a frequência à escola
		40 =>  true, // Criança ou adolescente em abrigo
		50 =>  true, // Criança ou adolescente em situação de rua
		60 =>  true, // Criança ou adolescente vítima de abuso / violência sexual
		70 =>  true, // Evasão porque sente a escola desinteressante
		80 =>  true, // Falta de documentação da criança ou adolescente
		90 =>  true, // Falta de infraestrutura escolar
		100 =>  true, // Falta de transporte escolar
		110 =>  true, // Gravidez na adolescência
		120 =>  true, // Preconceito ou discriminação racial
		130 =>  true, // Trabalho infantil
		140 =>  true, // Uso, abuso ou dependência de substâncias psicoativas
		150 =>  true, // Violência familiar
		160 =>  true, // Violência na escola
		500 =>  true, // Importados do Educacenso
	];

	/**
	 * Checks if this group handles a certain alert cause
	 * @param integer $cause_id The alert cause ID to test for
	 * @return bool
	 */
	public function handlesAlertCause($cause_id) {
		return boolval($this->alerts[intval($cause_id)]);
	}

	/**
	 * Gets list of alert cause IDs that are handled by this group
	 * @return array
	 */
	public function getHandledAlertCauses() {
		return collect($this->alerts)
			->filter()
			->keys()
			->toArray();
	}

	/**
	 * Gets the list of case cause IDs that are handled by this group, inferred by their corresponding alert causes
	 * @return array
	 */
	public function getHandledCaseCauses() {
		return collect($this->alerts)
			->filter()
			->keys()
			->map(function ($alert_cause_id) {
				return AlertCause::getByID($alert_cause_id)->case_cause_ids;
			})
			->flatten()
			->toArray();
	}

	/**
	 * Gets list of alert cause IDs that are not handled by this group
	 * @return array
	 */
	public function getUnhandledAlertCauses() {
		return collect($this->alerts)
			->filter(function ($item){
				return !boolval($item);
			})
			->keys()
			->toArray();
	}

	/**
	 * Updates the settings with form data
	 * @param array $data
	 */
	public function update($data) {
		if(!isset($data['alerts'])) return;
		if(!is_array($data['alerts'])) throw new \InvalidArgumentException('invalid_format');

		foreach($data['alerts'] as $alertCauseID => $handlesAlert) {
			$alertCauseID = intval($alertCauseID);
			if(!AlertCause::getByID($alertCauseID)) throw new \InvalidArgumentException('invalid_alert_cause_id');
			$this->alerts[$alertCauseID] = boolval($handlesAlert);

		}

	}

}