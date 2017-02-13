<?php
/**
 * busca-ativa-escolar-api
 * TenantSettings.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 13/02/2017, 18:39
 */

namespace BuscaAtivaEscolar\Settings;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\SerializableObject;

class TenantSettings extends SerializableObject {

	public $alertPriorities = [
		10 =>  'high', // Adolescente em conflito com a lei
		20 =>  'high', // Criança ou adolescente com deficiência(s)
		30 =>  'medium', // Criança ou adolescente com doença(s) que impeça(m) ou dificulte(m) a frequência à escola
		40 =>  'high', // Criança ou adolescente em abrigo
		50 =>  'high', // Criança ou adolescente em situação de rua
		60 =>  'high', // Criança ou adolescente vítima de abuso / violência sexual
		70 =>  'low', // Evasão porque sente a escola desinteressante
		80 =>  'low', // Falta de documentação da criança ou adolescente
		90 =>  'medium', // Falta de infraestrutura escolar
		100 =>  'low', // Falta de transporte escolar
		110 =>  'medium', // Gravidez na adolescência
		120 =>  'high', // Preconceito ou discriminação racial
		130 =>  'high', // Trabalho infantil
		140 =>  'high', // Uso, abuso ou dependência de substâncias psicoativas
		150 =>  'high', // Violência familiar
		160 =>  'high', // Violência na escola
	];

	public $stepDeadlines = [
		'alerta' => 15,
		'pesquisa' => 30,
		'analise_tecnica' => 30,
		'gestao_do_caso' => 0,
		'rematricula' => 30,
		'1a_observacao' => 60,
		'2a_observacao' => 60,
		'3a_observacao' => 60,
		'4a_observacao' => 60,
	];

	const BLOCKED_STEP_DEADLINES = ['gestao_do_caso'];

	public function getAlertPriority($cause_id) {
		if(!isset($this->alertPriorities[intval($cause_id)])) return null;
		return $this->alertPriorities[intval($cause_id)];
	}

	public function getStepDeadline($step_slug) {
		if(!isset($this->stepDeadlines[$step_slug])) return null;
		return $this->stepDeadlines[$step_slug];
	}

	public function update($data) {

		if(isset($data['alertPriorities'])) {
			if(!is_array($data['alertPriorities'])) throw new \InvalidArgumentException('invalid_format');

			foreach($data['alertPriorities'] as $alertCauseID => $alertPriority) {

				$alertCauseID = intval($alertCauseID);

				if(!AlertCause::getByID($alertCauseID)) throw new \InvalidArgumentException('invalid_alert_cause_id');
				if(!in_array($alertPriority, ['low', 'medium', 'high'])) throw new \InvalidArgumentException('invalid_priority');

				$this->alertPriorities[$alertCauseID] = $alertPriority;

			}
		}

		if(isset($data['stepDeadlines'])) {
			if(!is_array($data['stepDeadlines'])) throw new \InvalidArgumentException('invalid_format');

			foreach($data['stepDeadlines'] as $stepSlug => $stepDeadline) {

				if(!in_array($stepSlug, CaseStep::SLUGS)) throw new \InvalidArgumentException('invalid_step_slug');

				$this->stepDeadlines[$stepSlug] = intval($stepDeadline);

			}
		}

	}



}