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

	protected static $cached = [];

	protected static $data = [
		11 => ['id' => '11', 'region_id' => 1, 'name' => 'Rondônia', 'code' => 'RO', 'slug' => 'ro'],
		12 => ['id' => '12', 'region_id' => 1, 'name' => 'Acre', 'code' => 'AC', 'slug' => 'ac'],
		13 => ['id' => '13', 'region_id' => 1, 'name' => 'Amazonas', 'code' => 'AM', 'slug' => 'am'],
		14 => ['id' => '14', 'region_id' => 1, 'name' => 'Roraima', 'code' => 'RR', 'slug' => 'rr'],
		15 => ['id' => '15', 'region_id' => 1, 'name' => 'Pará', 'code' => 'PA', 'slug' => 'pa'],
		16 => ['id' => '16', 'region_id' => 1, 'name' => 'Amapá', 'code' => 'AP', 'slug' => 'ap'],
		17 => ['id' => '17', 'region_id' => 1, 'name' => 'Tocantins', 'code' => 'TO', 'slug' => 'to'],
		21 => ['id' => '21', 'region_id' => 2, 'name' => 'Maranhão', 'code' => 'MA', 'slug' => 'ma'],
		22 => ['id' => '22', 'region_id' => 2, 'name' => 'Piauí', 'code' => 'PI', 'slug' => 'pi'],
		23 => ['id' => '23', 'region_id' => 2, 'name' => 'Ceará', 'code' => 'CE', 'slug' => 'ce'],
		24 => ['id' => '24', 'region_id' => 2, 'name' => 'Rio Grande do Norte', 'code' => 'RN', 'slug' => 'rn'],
		25 => ['id' => '25', 'region_id' => 2, 'name' => 'Paraíba', 'code' => 'PB', 'slug' => 'pb'],
		26 => ['id' => '26', 'region_id' => 2, 'name' => 'Pernambuco', 'code' => 'PE', 'slug' => 'pe'],
		27 => ['id' => '27', 'region_id' => 2, 'name' => 'Alagoas', 'code' => 'AL', 'slug' => 'al'],
		28 => ['id' => '28', 'region_id' => 2, 'name' => 'Sergipe', 'code' => 'SE', 'slug' => 'se'],
		29 => ['id' => '29', 'region_id' => 2, 'name' => 'Bahia', 'code' => 'BA', 'slug' => 'ba'],
		31 => ['id' => '31', 'region_id' => 3, 'name' => 'Minas Gerais', 'code' => 'MG', 'slug' => 'mg'],
		32 => ['id' => '32', 'region_id' => 3, 'name' => 'Espirito Santo', 'code' => 'ES', 'slug' => 'es'],
		33 => ['id' => '33', 'region_id' => 3, 'name' => 'Rio de Janeiro', 'code' => 'RJ', 'slug' => 'rj'],
		35 => ['id' => '35', 'region_id' => 3, 'name' => 'São Paulo', 'code' => 'SP', 'slug' => 'sp'],
		41 => ['id' => '41', 'region_id' => 4, 'name' => 'Paraná', 'code' => 'PR', 'slug' => 'pr'],
		42 => ['id' => '42', 'region_id' => 4, 'name' => 'Santa Catarina', 'code' => 'SC', 'slug' => 'sc'],
		43 => ['id' => '43', 'region_id' => 4, 'name' => 'Rio Grande do Sul', 'code' => 'RS', 'slug' => 'rs'],
		50 => ['id' => '50', 'region_id' => 5, 'name' => 'Mato Grosso do Sul', 'code' => 'MS', 'slug' => 'ms'],
		51 => ['id' => '51', 'region_id' => 5, 'name' => 'Mato Grosso', 'code' => 'MT', 'slug' => 'mt'],
		52 => ['id' => '52', 'region_id' => 5, 'name' => 'Goiás', 'code' => 'GO', 'slug' => 'go'],
		53 => ['id' => '53', 'region_id' => 5, 'name' => 'Distrito Federal', 'code' => 'DF', 'slug' => 'df'],
	];

	protected static $indexes = [
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