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
use BuscaAtivaEscolar\Jobs\ProcessSmsSchool;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\SchoolCustomTransformer;
use BuscaAtivaEscolar\Transformers\SchoolSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\SchoolTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use BuscaAtivaEscolar\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Notifications\Notifiable;
use Queue;

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
        $schools = $request->request;

        $user = auth()->user(); /* @var $user User */

        foreach ($schools as $key => $school) {

            if( $school['school_email'] == null OR $school['school_email'] == "" ){
                $data['status'] = "error";
                $data['message'] = "Email inválido";
                return response()->json($data, 403);
            }

            $school = School::whereSchoolEmail($school['school_email'])->first();
            
            if($school->token == null){
                $school->token = str_random(40);
                $school->save();
            }

            $job = EmailJob::createFromType(SchoolEducacensoEmail::TYPE, $user, $school);
            Queue::pushOn('emails', new ProcessEmailJob($job));

            if($school->school_cell_phone != null && $school->school_cell_phone != ""){
                Queue::pushOn('sms_school', new ProcessSmsSchool($school));
            }

        }

        $data['status'] = "ok";
        $data['message'] = "Mensagens encaminhadas para fila de envio";

        return response()->json($data, 200);
    }

    /**
     * @return mixed
     */
    public function all_educacenso()
    {

        $currentCursor = request('cursor', null);
        $previousCursor = request('previous', null);
        $max = request('max', 5);

        $tenant_id = $this->currentUser()->tenant->id;

        $schools_array_id = Pesquisa::query()
            ->select('school_last_id')
            ->whereHas('child', function ($query_child) {
                $query_child->where('educacenso_year', '=', request('year_educacenso', 2018));
            })
            ->whereHas('childCase', function ($query_childCase) {
                $query_childCase->where('current_step_type', '=', 'BuscaAtivaEscolar\CaseSteps\Alerta');
            })
            ->where('tenant_id', $tenant_id)
            ->groupBy('school_last_id')
            ->pluck('school_last_id')
            ->toArray();


        $query_school = School::query();
        $query_school->whereIn('id', $schools_array_id);

        $max = request('max', 5);

        $paginator = $query_school->paginate($max);
        $collection = $paginator->getCollection();

        return fractal()
            ->collection($collection)
            ->transformWith(new SchoolTransformer())
            ->serializeWith(new SimpleArraySerializer())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->respond();


//        $schools = DB::select(
//            "select ".
//            "sc.id, sc.name, sc.city_name, sc.school_cell_phone, sc.school_phone, sc.school_email, ".
//            "count(csp.school_last_id) as count_children, ".
//            "count(case when csa.place_cep is not null then 0 end) as count_with_cep ".
//            "from schools as sc ".
//            "inner join case_steps_pesquisa as csp on sc.id = csp.school_last_id ".
//            "inner join case_steps_alerta as csa on csp.child_id = csa.child_id ".
//            "inner join children as ch on ch.id = csa.child_id ".
//            "where sc.id in (".implode(",",$schools_array_id).") and ch.educacenso_year = ".request('year_educacenso', 2018)." ".
//            "group by sc.id"
//        );
//
//        return fractal()
//            ->collection($schools)
//            ->transformWith(new SchoolCustomTransformer())
//            ->serializeWith(new SimpleArraySerializer())
//            ->respond();

    }

    /**
     * @param School $school
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(School $school){

        $input = request()->all();
        $school = School::findOrFail((int)$input['id']);
        $school->fill($input);

        try {
            $school->save();
        } catch (\Illuminate\Database\QueryException $e) {

            $data['status'] = "error";
            $data['message'] = "Email pertence a outra escola";
            $data['school'] = $school;
            return response()->json($data, 403);
        }

        return response()->json(['status' => 'ok', 'updated' => $input]);

    }


}