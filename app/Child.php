<?php
/**
 * busca-ativa-escolar-api
 * Child.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:20
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model  {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	protected $table = "children";
	protected $fillable = [
		'name',

		'tenant_id',
		'city_id',

		'child_status',
	];


	// TODO: REFACTOR: push these out by creating an Indexer observer (currently violates SRP)

	public function buildSearchQuery() {
		// TODO: builds ElasticSearch query
	}

	public function saveSearchIndex() {
		// TODO: creates/updates ElasticSearch document
	}

	private function buildSearchableDocument() {
		// TODO: generate object with all available case properties
	}



}