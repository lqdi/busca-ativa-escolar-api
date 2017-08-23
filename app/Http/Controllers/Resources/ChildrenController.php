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
use BuscaAtivaEscolar\ActivityLog;
use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Group;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\IBGE\UF;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\AttachmentTransformer;
use BuscaAtivaEscolar\Transformers\ChildSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\ChildTransformer;
use BuscaAtivaEscolar\Transformers\CommentTransformer;
use BuscaAtivaEscolar\Transformers\LogEntryTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\StepTransformer;
use BuscaAtivaEscolar\User;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ChildrenController extends BaseController  {

	public function search(Search $search) {

		$params = $this->filterAsciiFields(request()->all(), ['name', 'cause_name', 'assigned_user_name', 'location_full', 'step_name']);

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) {
			$params['tenant_id'] = Auth::user()->tenant_id;
		}

		// Scope the query to state agents
		if(Auth::user()->isRestrictedToUF()) {
			$params['assigned_uf'] = Auth::user()->uf;
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

			$filters = [
				'assigned_user_id' => ['type' => 'term', 'search' => Auth::user()->id],
				'case_cause_ids' => ['type' => 'terms', 'search' => $group->getSettings()->getHandledCaseCauses()],
				//'alert_cause_id' => ['type' => 'terms', 'search' => $group->getSettings()->getHandledAlertCauses()],
			];


			if($group->id === $tenant->primaryGroup->id) {
				$filters['current_step_type'] = ['type' => 'term', 'search' => 'BuscaAtivaEscolar\\CaseSteps\\Rematricula'];
			}

			$query->filterByOneOf($filters);

		}

		$attempted = $query->getAttemptedQuery();
		$query = $query->getQuery();

		$results = $search->search(new Child(), $query, 128);

		return fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(new ChildSearchResultsTransformer(), $query, $attempted))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

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

		$mapCenter = ['lat' => '-13.5013846', 'lng' => '-51.901559', 'zoom' => 4];

		if($this->currentUser()->isRestrictedToTenant() && !$this->currentUser()->isRestrictedToUF()) {
			$mapCenter =  $this->currentUser()->tenant->getMapCoordinates();
		}

		if($this->currentUser()->isRestrictedToUF()) {
			$mapCenter = UF::getByCode($this->currentUser()->uf)->getCoordinates();
			$mapCenter['zoom'] = 6;
		}

		// TODO: cache this (w/ tenant ID)

		$coordinates = Child::query()
			->whereIn('child_status', ['out_of_school', 'in_observation'])
			->whereNotNull('lat')
			->whereNotNull('lng')
			->get(['id', 'lat', 'lng'])
			->map(function ($child) {
				return ['id' => $child->id, 'latitude' => $child->lat, 'longitude' => $child->lng];
			});

		return response()->json([
			'center' => [
				'latitude' => $mapCenter['lat'],
				'longitude' => $mapCenter['lng'],
				'zoom' => $mapCenter['zoom'],
			],
			'coordinates' => $coordinates
		]);

	}

}