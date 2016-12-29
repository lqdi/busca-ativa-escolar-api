<?php
/**
 * busca-ativa-escolar-api
 * UFs.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 27/12/2016, 12:40
 */

namespace BuscaAtivaEscolar\IBGE;


use BuscaAtivaEscolar\Data\StaticObject;

class UF extends StaticObject  {

	private static $cached = [];

	private static $data = [
		11 => ['id' => '11', 'region_id' => 1, 'name' => 'Rondônia', 'code' => 'RO'],
		12 => ['id' => '12', 'region_id' => 1, 'name' => 'Acre', 'code' => 'AC'],
		13 => ['id' => '13', 'region_id' => 1, 'name' => 'Amazonas', 'code' => 'AM'],
		14 => ['id' => '14', 'region_id' => 1, 'name' => 'Roraima', 'code' => 'RR'],
		15 => ['id' => '15', 'region_id' => 1, 'name' => 'Pará', 'code' => 'PA'],
		16 => ['id' => '16', 'region_id' => 1, 'name' => 'Amapá', 'code' => 'AP'],
		17 => ['id' => '17', 'region_id' => 1, 'name' => 'Tocantins', 'code' => 'TO'],
		21 => ['id' => '21', 'region_id' => 2, 'name' => 'Maranhão', 'code' => 'MA'],
		22 => ['id' => '22', 'region_id' => 2, 'name' => 'Piauí', 'code' => 'PI'],
		23 => ['id' => '23', 'region_id' => 2, 'name' => 'Ceará', 'code' => 'CE'],
		24 => ['id' => '24', 'region_id' => 2, 'name' => 'Rio Grande do Norte', 'code' => 'RN'],
		25 => ['id' => '25', 'region_id' => 2, 'name' => 'Paraíba', 'code' => 'PB'],
		26 => ['id' => '26', 'region_id' => 2, 'name' => 'Pernambuco', 'code' => 'PE'],
		27 => ['id' => '27', 'region_id' => 2, 'name' => 'Alagoas', 'code' => 'AL'],
		28 => ['id' => '28', 'region_id' => 2, 'name' => 'Sergipe', 'code' => 'SE'],
		29 => ['id' => '29', 'region_id' => 2, 'name' => 'Bahia', 'code' => 'BA'],
		31 => ['id' => '31', 'region_id' => 3, 'name' => 'Minas Gerais', 'code' => 'MG'],
		32 => ['id' => '32', 'region_id' => 3, 'name' => 'Espirito Santo', 'code' => 'ES'],
		33 => ['id' => '33', 'region_id' => 3, 'name' => 'Rio de Janeiro', 'code' => 'RJ'],
		35 => ['id' => '35', 'region_id' => 3, 'name' => 'São Paulo', 'code' => 'SP'],
		41 => ['id' => '41', 'region_id' => 4, 'name' => 'Paraná', 'code' => 'PR'],
		42 => ['id' => '42', 'region_id' => 4, 'name' => 'Santa Catarina', 'code' => 'SC'],
		43 => ['id' => '43', 'region_id' => 4, 'name' => 'Rio Grande do Sul', 'code' => 'RS'],
		50 => ['id' => '50', 'region_id' => 5, 'name' => 'Mato Grosso do Sul', 'code' => 'MS'],
		51 => ['id' => '51', 'region_id' => 5, 'name' => 'Mato Grosso', 'code' => 'MT'],
		52 => ['id' => '52', 'region_id' => 5, 'name' => 'Goiás', 'code' => 'GO'],
		53 => ['id' => '53', 'region_id' => 5, 'name' => 'Distrito Federal', 'code' => 'DF'],
	];

	private static $indexes = [
		'code' => [
			'RO' => 11,
			'AC' => 12,
			'AM' => 13,
			'RR' => 14,
			'PA' => 15,
			'AP' => 16,
			'TO' => 17,
			'MA' => 21,
			'PI' => 22,
			'CE' => 23,
			'RN' => 24,
			'PB' => 25,
			'PE' => 26,
			'AL' => 27,
			'SE' => 28,
			'BA' => 29,
			'MG' => 31,
			'ES' => 32,
			'RJ' => 33,
			'SP' => 35,
			'PR' => 41,
			'SC' => 42,
			'RS' => 43,
			'MS' => 50,
			'MT' => 51,
			'GO' => 52,
			'DF' => 53,
		]
	];

	/**
	 * Gets an UF by it's short code
	 * @param string $code The short UF code (eg.: SP)
	 * @return UF
	 */
	public static function getByCode($code) {
		return self::getByIndex('code', $code);
	}

	/**
	 * @var integer Unique numeric ID for the UF
	 */
	public $id;

	/**
	 * @var string UF name (unicode)
	 */
	public $name;

	/**
	 * @var string The UF short code (two characters, uppercase)
	 */
	public $code;

	/**
	 * @var integer The ID of the region this UF is contained by
	 */
	public $region_id;

	/**
	 * Gets the region that contains the UF
	 * @return Region
	 */
	public function getRegion() {
		return Region::getByID($this->region_id);
	}

}