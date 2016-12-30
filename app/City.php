<?php
/**
 * busca-ativa-escolar-api
 * City.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 20:25
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class City extends Model {

	use SoftDeletes;
	use IndexedByUUID;

	protected $table = "cities";
	protected $fillable = [
		'uf',
		'region',

		'name',

		'ibge_city_id',
		'ibge_uf_id',
		'ibge_region_id',

		'webdoc_url',
	];

	// ------------------------------------------------------------------------

	/**
	 * The tenant associated with this city.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'city_id', 'id');
	}

	/**
	 * Internal, determines primary key for API routing.
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'id';
	}

	// ------------------------------------------------------------------------

	/**
	 * Gets the UF that contains this city
	 * @return IBGE\UF
	 */
	public function getUF() {
		return IBGE\UF::getByCode($this->uf);
	}

	/**
	 * Gets the Region that contains this city's UF
	 * @return IBGE\Region
	 */
	public function getRegion() {
		return $this->getUF()->getRegion();
	}

	// ------------------------------------------------------------------------

	/**
	 * Builds a query for searching cities
	 * @param array $filters The associative array of filter keys and values
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function search(array $filters) {
		$query = self::query();

		if(isset($filters['uf'])) $query->where('uf', $filters['uf']);
		if(isset($filters['region'])) $query->where('region', $filters['region']);
		if(isset($filters['name'])) {
			// TODO: extract to elasticsearch/sphinx
			$query->where("name", "REGEXP", $filters['name']);
		}

		return $query;
	}


}