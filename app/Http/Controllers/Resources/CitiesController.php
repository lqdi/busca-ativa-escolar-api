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

	public function show(City $city) {
		// TODO: move to fractal response
		return response()->json($city);
	}

}