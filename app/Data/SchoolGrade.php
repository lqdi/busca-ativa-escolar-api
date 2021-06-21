<?php

/**
 * busca-ativa-escolar-api
 * SchoolGrade.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 10/01/2017, 16:22
 */

namespace BuscaAtivaEscolar\Data;


class SchoolGrade extends StaticObject
{

	protected static $data = [
		1 => ['id' => 1, 'order' => 1, 'slug' => 'preescola_4anos', 'label' => "Pré-escola (4 anos)"],
		2 => ['id' => 2, 'order' => 2, 'slug' => 'preescola_5anos', 'label' => "Pré-escola (5 anos)"],
		3 => ['id' => 3, 'order' => 3, 'slug' => 'ef_1ano', 'label' => "Ensino Fundamental - Anos iniciais (1º ano)"],
		4 => ['id' => 4, 'order' => 4, 'slug' => 'ef_2ano', 'label' => "Ensino Fundamental - Anos iniciais (2º ano)"],
		5 => ['id' => 5, 'order' => 5, 'slug' => 'ef_3ano', 'label' => "Ensino Fundamental - Anos iniciais (3º ano)"],
		6 => ['id' => 6, 'order' => 6, 'slug' => 'ef_4ano', 'label' => "Ensino Fundamental - Anos iniciais (4º ano)"],
		7 => ['id' => 7, 'order' => 7, 'slug' => 'ef_5ano', 'label' => "Ensino Fundamental - Anos iniciais (5º ano)"],
		8 => ['id' => 8, 'order' => 8, 'slug' => 'ef_6ano', 'label' => "Ensino Fundamental - Anos finais (6º ano)"],
		9 => ['id' => 9, 'order' => 9, 'slug' => 'ef_7ano', 'label' => "Ensino Fundamental - Anos finais (7º ano)"],
		10 => ['id' => 10, 'order' => 10, 'slug' => 'ef_8ano', 'label' => "Ensino Fundamental - Anos finais (8º ano)"],
		11 => ['id' => 11, 'order' => 11, 'slug' => 'ef_9ano', 'label' => "Ensino Fundamental - Anos finais (9º ano)"],
		12 => ['id' => 12, 'order' => 12, 'slug' => 'em_1ano', 'label' => "Ensino Médio - 1º ano"],
		13 => ['id' => 13, 'order' => 13, 'slug' => 'em_2ano', 'label' => "Ensino Médio - 2º ano"],
		14 => ['id' => 14, 'order' => 14, 'slug' => 'em_3ano', 'label' => "Ensino Médio - 3º ano"],
		15 => ['id' => 15, 'order' => 15, 'slug' => 'eja_finais', 'label' => "EJA (ensino fundamental anos finais)"],
		16 => ['id' => 16, 'order' => 16, 'slug' => 'eja_iniciais', 'label' => "EJA (ensino fundamental anos iniciais)"],
		17 => ['id' => 17, 'order' => 17, 'slug' => 'eja_alfabetizado', 'label' => "EJA (Alfabetizado)"],
		18 => ['id' => 18, 'order' => 18, 'slug' => 'creche_1ano', 'label' => "Creche (1 ano)"],
		19 => ['id' => 19, 'order' => 19, 'slug' => 'creche_2ano', 'label' => "Creche (2 anos)"],
		20 => ['id' => 20, 'order' => 20, 'slug' => 'creche_3ano', 'label' => "Creche (3 anos)"],
		21 => ['id' => 21, 'order' => 21, 'slug' => 'creche_4ano', 'label' => "Creche (4 anos)"],
	];

	protected static $indexes = [
		'slug' => [
			'preescola_4anos' => 1,
			'preescola_5anos' => 2,
			'ef_1ano' => 3,
			'ef_2ano' => 4,
			'ef_3ano' => 5,
			'ef_4ano' => 6,
			'ef_5ano' => 7,
			'ef_6ano' => 8,
			'ef_7ano' => 9,
			'ef_8ano' => 10,
			'ef_9ano' => 11,
			'em_1ano' => 12,
			'em_2ano' => 13,
			'em_3ano' => 14,
			'eja_finais' => 15,
			'eja_iniciais' => 16,
			'eja_alfabetizado' => 17,
			'creche_1ano' => 18,
			'creche_2ano' => 19,
			'creche_3ano' => 20,
			'creche_4ano' => 21,
		]
	];

	/**
	 * @var integer The ID of the school grade
	 */
	public $id;

	/**
	 * @var string The slug of the school grade
	 */
	public $slug;

	/**
	 * @var string The human-readable name for the school grade
	 */
	public $label;

	/**
	 * @var integer The sequence order of the school grade
	 */
	public $order;

	/**
	 * Gets an school grade by it's slug
	 * @param string $slug
	 * @return SchoolGrade
	 */
	public static function getBySlug($slug)
	{
		return self::getByIndex('slug', $slug);
	}
}
