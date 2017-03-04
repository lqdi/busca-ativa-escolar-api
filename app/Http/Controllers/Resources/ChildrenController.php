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
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\AttachmentTransformer;
use BuscaAtivaEscolar\Transformers\ChildSearchResultsTransformer;
use BuscaAtivaEscolar\Transformers\ChildSearchTransformer;
use BuscaAtivaEscolar\Transformers\ChildTransformer;
use BuscaAtivaEscolar\Transformers\CommentTransformer;
use BuscaAtivaEscolar\Transformers\LogEntryTransformer;
use BuscaAtivaEscolar\Transformers\SearchResultsTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ChildrenController extends BaseController  {

	public function search(Search $search) {

		$params = request()->all();

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) $params['tenant_id'] = Auth::user()->tenant_id;

		$query = ElasticSearchQuery::withParameters($params)
			->filterByTerm('tenant_id', false)
			->addTextFields(['name', 'cause_name', 'step_name', 'assigned_user_name'])
			->searchTextInColumns(
				'location_full',
				['place_address^3', 'place_cep^2', 'place_city^2', 'place_uf', 'place_neighborhood', 'place_reference']
			)
			->filterByTerms('alert_status', false)
			->filterByTerms('risk_level', $params['risk_level_null'] ?? false)
			->filterByTerm('assigned_user_id', $params['assigned_user_id_null'] ?? false)
			->filterByTerms('gender',$params['gender_null'] ?? false)
			->filterByTerms('place_kind',$params['place_kind_null'] ?? false)
			->filterByRange('age',$params['age_null'] ?? false);


		$attempted = $query->getAttemptedQuery();
		$query = $query->getQuery();

		$results = $search->search(new Child(), $query);

		return fractal()
			->item($results)
			->transformWith(new SearchResultsTransformer(new ChildSearchResultsTransformer(), $query, $attempted))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

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

			$message = request('message');
			$comment = Comment::post($child, Auth::user(), $message);

			return response()->json(['status' => 'ok', 'comment_id' => $comment->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function addAttachment(Child $child) {
		try {

			$file = request()->file('file');
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

			if($validation->fails()) {
				return response()->json(['status' => 'error', 'reason' => 'validation_failed', 'fields' => $validation->failed()]);
			}

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

		$user = Auth::user();
		$mapCenter = $user->tenant ?
			$user->tenant->getMapCoordinates() : // Tenant coordinates
			['lat' => '-13.5013846', 'lng' => '-69.7433562', 'zoom' => 4]; // Map of Brazil

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