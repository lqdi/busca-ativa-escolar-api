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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class City extends Model {

	use SoftDeletes;
	use IndexedByUUID;
	use HasSlug;

	protected $table = "cities";
	protected $fillable = [
		'uf',
		'name',
		'slug',

		'cod_ibge',
		'webdoc_url',
	];

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'city_id', 'id');
	}

	public function getSlugOptions(): SlugOptions {
		return SlugOptions::create()
			->generateSlugsFrom(['uf','name'])
			->saveSlugsTo('slug');
	}


}