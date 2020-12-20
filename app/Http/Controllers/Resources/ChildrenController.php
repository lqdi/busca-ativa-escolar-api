<?php
/**
 * busca-ativa-escolar-api
 * ChildrenController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/12/2016, 16:16
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use Auth;
use BuscaAtivaEscolar\City;
use function Aws\map;
use BuscaAtivaEscolar\ActivityLog;
use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Group;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\IBGE\UF;
use BuscaAtivaEscolar\Jobs\ProcessExportChildrenJob;
use BuscaAtivaEscolar\Jobs\ProcessReportSeloJob;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\AttachmentTransformer;
use BuscaAtivaEscolar\Transformers\ChildExportResultsTransformer;
use BuscaAtivaEscolar\Transformers\ChildSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\ChildTransformer;
use BuscaAtivaEscolar\Transformers\CommentTransformer;
use BuscaAtivaEscolar\Transformers\LogEntryTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\StepTransformer;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use File;
use function foo\func;
use function GuzzleHttp\Psr7\parse_query;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Rap2hpoutre\FastExcel\FastExcel;

class ChildrenController extends BaseController  {

	protected function prepareSearchQuery() : ElasticSearchQuery {
		$params = $this->filterAsciiFields(request()->all(), ['name', 'cause_name', 'assigned_user_name', 'location_full', 'step_name']);

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) {
			$params['tenant_id'] = Auth::user()->tenant_id;
		}

		// Scope the query to state agents
		if(Auth::user()->isRestrictedToUF()) {
			$params['assigned_uf'] = Auth::user()->uf;
		}

		// Scope the query to visitantes estaduais
        if( Auth::user()->type == User::TYPE_VISITANTE_ESTADUAL_UM
            OR Auth::user()->type == User::TYPE_VISITANTE_ESTADUAL_DOIS
            OR Auth::user()->type == User::TYPE_VISITANTE_ESTADUAL_TRES
            OR Auth::user()->type == User::TYPE_VISITANTE_ESTADUAL_QUATRO) {
            unset($params['assigned_uf']);
            $params['uf'] = Auth::user()->uf;
        }

		if(isset($params['uf'])) $params['uf'] = Str::lower($params['uf']);
		if(isset($params['assigned_uf'])) $params['assigned_uf'] = Str::lower($params['assigned_uf']);

		$query = ElasticSearchQuery::withParameters($params)
			->filterByTerm('tenant_id', false)
			->filterByTerm('uf', false)
			->filterByTerm('assigned_uf', false)
			->addTextFields(['name', 'cause_name', 'step_name', 'assigned_user_name'], 'match')
			->searchTextInColumns(
				'location_full',
				['place_address^3', 'place_cep^2', 'place_city^2', 'place_uf', 'place_neighborhood', 'place_reference']
			)
			->filterByTerms('alert_status', false)
			->filterByTerms('case_status', false)
			->filterByTerms('risk_level', $params['risk_level_null'] ?? false)
			//->filterByTerms('case_cause_ids', false)
			//->filterByTerm('assigned_user_id', $params['assigned_user_id_null'] ?? false)
			->filterByTerm('current_step_type', false)
			->filterByTerm('step_slug', false)
			->filterByTerms('gender',$params['gender_null'] ?? false)
			->filterByTerms('place_kind',$params['place_kind_null'] ?? false)
			->filterByRange('age',$params['age_null'] ?? false);


		// Scope query within user, when relevant
		if(Auth::user()->type === User::TYPE_TECNICO_VERIFICADOR) {
			$query->filterByOneOf(['assigned_user_id' => ['type' => 'term', 'search' => Auth::user()->id]]);
		}

		// Scope query within group responsabilities (via parameterized case cause ids)
		if(Auth::user()->type === User::TYPE_SUPERVISOR_INSTITUCIONAL) {
			$group = Auth::user()->group; /* @var $group Group */
			$tenant = Auth::user()->tenant;

			if(!$group) $group = $tenant->primaryGroup;
			if(!$group) $group = new Group();

			//adiciona os motivos de alertas 500 e 600 a supervisores da educacao sempre
            $handledAlertCauses = $group->getSettings()->getHandledAlertCauses();
            if ($group->is_primary) { array_unshift($handledAlertCauses, 500, 600 ); }

			$filters = [
				'assigned_user_id' => ['type' => 'term', 'search' => Auth::user()->id],

                // Essa regra está sendo desativada, pois não é possível retornar o getHandledCaseCauses dos grupos ...
                //'case_cause_ids' => ['type' => 'terms', 'search' => $group->getSettings()->getHandledCaseCauses()],
				'alert_cause_id' => ['type' => 'terms', 'search' => $handledAlertCauses],
			];


			//Essa regra impossibilita o retorno das outras etapas para Supervisores da educacao
            //			if($group->id === $tenant->primaryGroup->id) {
            //				$filters['current_step_type'] = ['type' => 'term', 'search' => 'BuscaAtivaEscolar\\CaseSteps\\Rematricula'];
            //			}

			$query->filterByOneOf($filters);

		}

		return $query;
	}

	public function search(Search $search) {

		$query = $this->prepareSearchQuery();

		$attempted = $query->getAttemptedQuery();
		$query = $query->getQuery();

		$results = $search->search(new Child(), $query, 2000);

		return fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(new ChildSearchResultsTransformer(), $query, $attempted))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

	public function export(Search $search) {

		$query = $this->prepareSearchQuery();

		$attempted = $query->getAttemptedQuery();
		$query = $query->getQuery();

		$results = $search->search(new Child(), $query, 2000);

		$data = fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(new ChildExportResultsTransformer(), $query, $attempted))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->toArray();

		$tenantID = auth()->user()->tenant_id ?? 'global';

		$exportFile = uniqid("export_", true);
		$exportFolder = storage_path('app/export/' . $tenantID);

		$exported = \Excel::create($exportFile, function($excel) use ($data) {

			$excel->sheet('export', function($sheet) use ($data) {
				$sheet->fromArray($data['results']);
			});

		})->store('xls', $exportFolder, true);

		$token = \JWTAuth::fromUser(auth()->user());

		return $this->api_success([
			'export_file' => $exported['file'],
			'download_url' => route('api.children.download_exported', ['filename' => $exported['file'], 'token' => $token])
		]);

	}

	public function download_exported($filename) {

		$tenantID = auth()->user()->tenant_id ?? 'global';
		$token = request('token');

		\JWTAuth::invalidate($token);

		return response()->download(storage_path('app/export/' . $tenantID . '/' . basename($filename)));

	}

	protected function filterAsciiFields($input, $fields) {
		$output = [];

		foreach($input as $key => $value) {
			if(in_array($key, $fields)) $value = Str::ascii($value);
			$output[$key] = $value;
		}

		return $output;
	}

	protected function list() {
		$paginator = Child::with('cases')->paginate(64);
		$collection = $paginator->getCollection();

		return fractal()
			->collection($collection)
			->transformWith(new ChildTransformer)
			->paginateWith(new IlluminatePaginatorAdapter($paginator))
			->excludeCases()
			->respond();
	}

	public function show(Child $child) {

		return fractal()
			->item($child)
			->transformWith(new ChildTransformer)
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function getAlert(Child $child) {
		$alert = $child->alert;

		return fractal()
			->item($alert)
			->transformWith(new StepTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(['fields', 'case'])
			->respond();
	}

	public function comments(Child $child) {
		return fractal()
			->collection($child->comments)
			->transformWith(new CommentTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function removeComment(Child $child, Comment $comment){

	    if($child == null OR $comment == null) return $this->api_failure("A anotação não pode ser removida");

	    if($this->currentUser()->id != $comment->author_id ) {
	        return $this->api_failure("Você não tem permissão para remover a anotação selecionada");
	    }else{
	        $comment->delete();
            return $this->api_success();
        }

    }

	public function getComment(Child $child, Comment $comment){
        if($child == null OR $comment == null) return $this->api_failure("A anotação não foi encontrada");

        if($this->currentUser()->id != $comment->author_id ) {
            return $this->api_failure("Você não tem permissão para visualizar a anotação selecionada");
        }else{
            return response()->json($comment);
        }
    }

    public function attachments(Child $child) {
		return fractal()
			->collection($child->attachments)
			->transformWith(new AttachmentTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function activityLog(Child $child) {
		return fractal()
			->collection(ActivityLog::fetchEntries($child, 64, true))
			->transformWith(new LogEntryTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function addComment(Child $child) {
		try {

			$message = request('message', '');
			$comment = Comment::post($child, Auth::user(), $message);

			return response()->json(['status' => 'ok', 'comment_id' => $comment->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function updateComment(){

        try {

            $message = request('message', '');
            $id_message = request('id_message', null);

            if($message == null OR $id_message == null) return $this->api_failure("A anotação não pode ser editada");

            $comment = Comment::updateComment(Auth::user(), $id_message, $message);

            return response()->json(['status' => 'ok', 'comment_id' => $comment->id]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }

    }

	public function removeAttachment(Child $child, Attachment $attachment) {
		try {

			if($attachment->content_id !== $child->id) {
				return $this->api_failure('not_allowed');
			}

			$attachment->delete();

			return $this->api_success();
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function addAttachment(Child $child) {
		try {

			$file = request()->file('file');

			if(!$file || !$file->isValid()) {
				return $this->api_failure('file_not_uploaded', ['file' => $file]);
			}

			$description = request('description', '');
			$attachment = Attachment::createFromUpload($file, $child, Auth::user(), $description);

			return response()->json(['status' => 'ok', 'attachment_id' => $attachment->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function store() {

		try {
			$user = Auth::user();
			$tenant = $user->isRestrictedToTenant() ? $user->tenant : Tenant::findOrFail(request('tenant_id'));

			$data = request()->toArray();
			$validation = (new Alerta())->validate($data);

			if($validation->fails()) return $this->api_validation_failed('validation_failed', $validation);

			$child = Child::spawnFromAlertData($tenant, $user->id, $data);

			return response()->json([
				'status' => 'ok',
				'tenant_id' => $tenant->id,
				'child_id' => $child->id,
			]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

	}

	public function getMap() {

        $city_id = request('city_id');

		$mapCenter = ['lat' => '-13.5013846', 'lng' => '-51.901559', 'zoom' => 4];

		if($this->currentUser()->isRestrictedToTenant() && !$this->currentUser()->isRestrictedToUF()) {
			$mapCenter =  $this->currentUser()->tenant->getMapCoordinates();
		}

		if($this->currentUser()->isRestrictedToUF()) {
			$mapCenter = UF::getByCode($this->currentUser()->uf)->getCoordinates();
			$mapCenter['zoom'] = 6;
		}

		// TODO: cache this (w/ tenant ID)

		if ($city_id == null){
            $coordinates = Child::query()
                ->whereIn('child_status', ['out_of_school', 'in_observation'])
                ->whereNotNull('lat')
                ->whereNotNull('lng')
                ->get(['id', 'lat', 'lng'])
                ->map(function ($child) {
                    return ['id' => $child->id, 'latitude' => $child->lat, 'longitude' => $child->lng];
                });
        }else{
            $city_ibge = City::where('ibge_city_id', '=', intval($city_id))->first();
            $coordinates = Child::query()
                ->where('city_id', '=', $city_ibge->id)
                ->whereIn('child_status', ['out_of_school', 'in_observation'])
                ->whereNotNull('lat')
                ->whereNotNull('lng')
                ->get(['id', 'lat', 'lng'])
                ->map(function ($child) {
                    return ['id' => $child->id, 'latitude' => $child->lat, 'longitude' => $child->lng];
                });
        }

		return response()->json([
			'center' => [
				'latitude' => $mapCenter['lat'],
				'longitude' => $mapCenter['lng'],
				'zoom' => $mapCenter['zoom'],
			],
			'coordinates' => $coordinates
		]);

	}

    public function list_files_exported () {
        $reports = \Storage::allFiles('attachments/children_reports/'.Auth::user()->id."/");
        $finalReports = array_map( function ($file){
            return [
                'file' => str_replace('attachments/children_reports/'.Auth::user()->id, "", $file),
                'size' => \Storage::size($file),
                'last_modification' => \Storage::lastModified($file)
            ];
        }, $reports);
        return response()->json(['status' => 'ok', 'data' => $finalReports]);
    }

    public function get_file_exported(){
        $nameFile = request('file');
        if ( !isset($nameFile) ) {
            return response()->json(['error' => 'Not authorized.'],403);
        }
        $exists = \Storage::exists("attachments/children_reports/".Auth::user()->id."/".$nameFile);
        if ( $exists ){
            return response()->download(storage_path("app/attachments/children_reports/".Auth::user()->id."/".$nameFile));
        }else{
            return response()->json(['error' => 'Arquivo inexistente.'],403);
        }
    }

    public function create_report_child(){

        $paramsQuery = $this->filterAsciiFields(request()->all(), ['name', 'cause_name', 'assigned_user_name', 'location_full', 'step_name']);

        dispatch((new ProcessExportChildrenJob(Auth::user(), $paramsQuery))->onQueue('export_children'));

        return response()->json(
            [
                'msg' => 'Arquivo criado',
                'date' => Carbon::now()->timestamp
            ],
            200
        );

    }

}