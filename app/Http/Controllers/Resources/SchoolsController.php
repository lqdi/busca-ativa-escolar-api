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
use BuscaAtivaEscolar\EmailJob;
use BuscaAtivaEscolar\EmailTypes\SchoolEducacensoEmail;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Jobs\ProcessEmailJob;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\SchoolSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\SchoolTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use BuscaAtivaEscolar\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Notifications\Notifiable;


class SchoolsController extends BaseController
{

    use Notifiable;

    /**
     * @param Search $search
     * @return mixed
     * @throws \Exception
     */
    public function search(Search $search)
    {

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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function sendNotificationSchool(Request $request)
    {
        $email = $request->request;

        $user = auth()->user(); /* @var $user User */

        foreach ($email as $key => $value) {
            $school = School::whereSchoolEmail($value['school_email'])->first();
            $job = EmailJob::createFromType(SchoolEducacensoEmail::TYPE, $user, $school);
            \Queue::pushOn('emails', new ProcessEmailJob($job));
        }

        $data['status'] = "ok";
        $data['message'] = "Mensagens encaminhadas com sucesso";

        return response()->json($data, 200);
    }

    /**
     * @return mixed
     */
    public function all_educacenso()
    {

        $tenant_id = $this->currentUser()->tenant->id;

        $schools_array_id = Pesquisa::query()
            ->select('school_last_id')
            ->whereHas('child', function ($query_child) {
                $query_child->where('educacenso_year', '=', 2018);
            })
            ->whereHas('childCase', function ($query_childCase) {
                $query_childCase->where('current_step_type', '=', 'BuscaAtivaEscolar\CaseSteps\Alerta');
            })
            ->where('tenant_id', $tenant_id)
            ->groupBy('school_last_id')
            ->pluck('school_last_id')
            ->toArray();

        //return schools where in $schools_array_id
        $query_school = School::where('id', '!=', null)
            ->whereIn('id', $schools_array_id);

        $max = request('max', 128);

        $paginator = $query_school->paginate($max);
        $collection = $paginator->getCollection();

        return fractal()
            ->collection($collection)
            ->transformWith(new SchoolTransformer())
            ->serializeWith(new SimpleArraySerializer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->respond();

    }

    /**
     * @param School $school
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(School $school){

        $input = request()->all();
        $school = School::findOrFail((int)$input['id']);
        $school->fill($input);

        $school->save();

        return response()->json(['status' => 'ok', 'updated' => $input]);

    }


}