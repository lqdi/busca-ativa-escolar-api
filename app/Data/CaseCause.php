<?php
/**
 * busca-ativa-escolar-api
 * CaseCause.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 28/12/2016, 13:16
 */

namespace BuscaAtivaEscolar\Data;


class CaseCause extends StaticObject  {

	protected static $data = [
		10 => ['id' => 10, 'alert_cause_id' => 10, 'slug' => 'adolescente_em_conflito_com_a_lei', 'label' => "Adolescente em conflito com a lei "],
		21 => ['id' => 21, 'alert_cause_id' => 20, 'slug' => 'crianca_com_deficiencia_fisica', 'label' => "Criança ou adolescente com deficiência física ", 'is_handicapped' => true],
		22 => ['id' => 22, 'alert_cause_id' => 20, 'slug' => 'crianca_com_deficiencia_intelectual', 'label' => "Criança ou adolescente com deficiência intelectual ", 'is_handicapped' => true],
		23 => ['id' => 23, 'alert_cause_id' => 20, 'slug' => 'crianca_com_deficiencia_mental', 'label' => "Criança ou adolescente com deficiência mental", 'is_handicapped' => true],
		24 => ['id' => 24, 'alert_cause_id' => 20, 'slug' => 'crianca_com_deficiencia_sensorial', 'label' => "Criança ou adolescente com deficiência sensorial", 'is_handicapped' => true],
		30 => ['id' => 30, 'alert_cause_id' => 30, 'slug' => 'crianca_com_doencas', 'label' => "Criança ou adolescente com doenças (que impedem e/ou dificultem a frequência à escola)"],
		40 => ['id' => 40, 'alert_cause_id' => 40, 'slug' => 'crianca_em_abrigo', 'label' => "Criança ou adolescente em abrigos"],
		50 => ['id' => 50, 'alert_cause_id' => 50, 'slug' => 'crianca_na_rua', 'label' => "Criança ou adolescente em situação de rua "],
		60 => ['id' => 60, 'alert_cause_id' => 60, 'slug' => 'crianca_vitima_abuso', 'label' => "Criança ou adolescente que sofrem ou sofreram abuso / violência sexual "],
		70 => ['id' => 70, 'alert_cause_id' => 70, 'slug' => 'evasao_desinteresse', 'label' => "Evasão porque sente a escola desinteressante "],
		80 => ['id' => 80, 'alert_cause_id' => 80, 'slug' => 'falta_documentacao', 'label' => "Falta de documentação da criança ou adolescente "],
		91 => ['id' => 91, 'alert_cause_id' => 90, 'slug' => 'falta_infraestrutura_escola', 'label' => "Falta de infraestrutura escolar (Escola) "],
		92 => ['id' => 92, 'alert_cause_id' => 90, 'slug' => 'falta_infraestrutura_vagas', 'label' => "Falta de infraestrutura escolar (Vagas) "],
		100 => ['id' => 100, 'alert_cause_id' => 100, 'slug' => 'falta_transporte', 'label' => "Falta de transporte escolar "],
		110 => ['id' => 110, 'alert_cause_id' => 110, 'slug' => 'gravidez_adolescencia', 'label' => "Gravidez na adolescência "],
		120 => ['id' => 120, 'alert_cause_id' => 120, 'slug' => 'preconceito_racial', 'label' => "Preconceito ou discriminação racial "],
		130 => ['id' => 130, 'alert_cause_id' => 130, 'slug' => 'trabalho_infantil', 'label' => "Trabalho infantil "],
		140 => ['id' => 140, 'alert_cause_id' => 140, 'slug' => 'uso_substancias', 'label' => "Uso, abuso ou dependência de substâncias psicoativas "],
		150 => ['id' => 150, 'alert_cause_id' => 150, 'slug' => 'violencia_familiar', 'label' => "Violência familiar "],
		161 => ['id' => 161, 'alert_cause_id' => 160, 'slug' => 'violencia_escolar_genero', 'label' => "Violência na escola (Discriminação de gênero) "],
		162 => ['id' => 162, 'alert_cause_id' => 160, 'slug' => 'violencia_escolar_raca', 'label' => "Violência na escola (Discriminação racial) "],
		163 => ['id' => 163, 'alert_cause_id' => 160, 'slug' => 'violencia_escolar_religiao', 'label' => "Violência na escola (Discriminação religiosa) "],
	];

	protected static $indexes = [
		'slug' => [
			'adolescente_em_conflito_com_a_lei' => 10,
			'crianca_com_deficiencia_fisica' => 21,
			'crianca_com_deficiencia_intelectual' => 22,
			'crianca_com_deficiencia_mental' => 23,
			'crianca_com_deficiencia_sensorial' => 24,
			'crianca_com_doencas' => 30,
			'crianca_em_abrigo' => 40,
			'crianca_na_rua' => 50,
			'crianca_vitima_abuso' => 60,
			'evasao_desinteresse' => 70,
			'falta_documentacao' => 80,
			'falta_infraestrutura_escola' => 91,
			'falta_infraestrutura_vagas' => 92,
			'falta_transporte' => 100,
			'gravidez_adolescencia' => 110,
			'preconceito_racial' => 120,
			'trabalho_infantil' => 130,
			'uso_substancias' => 140,
			'violencia_familiar' => 150,
			'violencia_escolar_genero' => 161,
			'violencia_escolar_raca' => 162,
			'violencia_escolar_religiao' => 163,
		]
	];

	/**
	 * @var integer The ID of the case cause
	 */
	public $id;

	/**
	 * @var string The slug of the case cause
	 */
	public $slug;

	/**
	 * @var string The human-readable name for the case cause
	 */
	public $label;

	/**
	 * @var integer The ID of the alert cause this case cause relates to
	 */
	public $alert_cause_id;

	/**
	 * @var bool Does this cause imply the child is handicapped?
	 */
	public $is_handicapped = false;

	/**
	 * Gets an alert cause by it's slug
	 * @param string $slug
	 * @return CaseCause
	 */
	public static function getBySlug($slug) {
		return self::getByIndex('slug', $slug);
	}

	/**
	 * Gets all case cause IDs that indicate handicapped children
	 * @return array
	 */
	public static function getAllHandicappedIDs() {
		return collect(self::$data)
			->filter(function ($item) {
				return isset($item['is_handicapped']) && boolval($item['is_handicapped']) === true;
			})
			->pluck('id')
			->toArray();
	}

}