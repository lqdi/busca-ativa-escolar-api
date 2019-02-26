<?php
/**
 * busca-ativa-escolar-api
 * SchoolsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/01/2017, 19:26
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\SchoolSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\SchoolTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class SchoolsController extends BaseController {

	public function search(Search $search) {

		$parameters = request()->only(['id', 'uf', 'city_id', 'name']);
		$parameters['uf'] = strtolower(Str::ascii($parameters['uf']));
		$parameters['name'] = Str::ascii($parameters['name']);

		$query = ElasticSearchQuery::withParameters($parameters)
			->searchTextInColumns('name', ['name', 'id'])
			->filterByTerm('city_id', false)
			->filterByTerm('uf', false)
			->getQuery();

		$results = $search->search(new School(), $query, 12);

		return fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(SchoolSearchResultsTransformer::class, $query))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

	public function all_educacenso(){

        $tenant_id =  $this->currentUser()->tenant->id;

        //return array with schools' id from Pesquisa Model
        $schools_array_id  = Pesquisa::query()
            ->select('school_last_id')
            ->whereHas('child', function ($query_child) {
                $query_child->where('educacenso_year', '=', 2018);
            })
            ->where('tenant_id', $tenant_id)
            ->groupBy('school_last_id')
            ->pluck('school_last_id')
            ->toArray();

        $query_school = School::where('id', '!=', null)
            ->whereIn('id', $schools_array_id);

        $max = request('max', 128);
        if($max > 128) $max = 128;
        if($max < 16) $max = 16;

        $paginator = $query_school->paginate($max);
        $collection = $paginator->getCollection();

        return fractal()
            ->collection($collection)
            ->transformWith(new SchoolTransformer())
            ->serializeWith(new SimpleArraySerializer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->respond();

    }


}