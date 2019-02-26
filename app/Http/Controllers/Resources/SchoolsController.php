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


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\SchoolSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use Illuminate\Support\Str;

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

	public function sendNotificationSchool() {

        $email = request('email');

        try {

//            // TODO: rate limiting
//
            $school = new School();
//
            if(!$school) {
                return $this->api_failure();
            }
//
            $school->sendNotification();
//
            return $this->api_success();


        } catch (\Exception $ex) {
            $this->api_failure('reset_send_failed');
        }
    }

}