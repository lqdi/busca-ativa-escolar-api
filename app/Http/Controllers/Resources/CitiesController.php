<?php
/**
 * busca-ativa-escolar-api
 * CitiesController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 27/12/2016, 14:26
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\TenantSignup;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\CitySearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use Illuminate\Support\Str;

class CitiesController extends BaseController  {

	public function index() {

		$filters = [];

		if(request()->has('uf')) $filters['uf'] = request('uf');
		if(request()->has('region')) $filters['region'] = request('region');
		if(request()->has('name')) $filters['name'] = request('name');

		$query = City::search($filters);
		$results = $query->simplePaginate(64);

		// TODO: move to fractal response

		return response()->json($results);

	}

	public function search(Search $search) {

		$parameters = request()->only(['uf', 'name']);
		$parameters['uf'] = strtolower(Str::ascii($parameters['uf']));
		$parameters['name_ascii'] = strtolower(Str::ascii($parameters['name']));

		$query = ElasticSearchQuery::withParameters($parameters)
			->addTextField('name_ascii')
			->filterByTerm('uf', false)
			->getQuery();

		$results = $search->search(new City(), $query, 20);

		return fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(CitySearchResultsTransformer::class, $query))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

	public function check_availability() {

		$tenant = Tenant::where('city_id', request('id'))->first();

		if($tenant) {
			return response()->json(['is_available' => false, 'stage' => 'tenant']);
		}

		$ongoingSignup = TenantSignup::where('city_id',  request('id'))->first();

		if($ongoingSignup) {
			return response()->json(['is_available' => false, 'stage' => 'sign_up']);
		}

		return response()->json(['is_available' => true]);

	}

	public function show(City $city) {
		// TODO: move to fractal response
		return response()->json($city);
	}

}