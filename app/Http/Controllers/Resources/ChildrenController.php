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
use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Services\Search;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\AttachmentTransformer;
use BuscaAtivaEscolar\Transformers\ChildSearchTransformer;
use BuscaAtivaEscolar\Transformers\ChildTransformer;
use BuscaAtivaEscolar\Transformers\CommentTransformer;
use BuscaAtivaEscolar\Transformers\LogEntryTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ChildrenController extends BaseController  {

	public function search(Search $search) {

		$query = [
			'bool' => [
				'must' => [],
				'should' => [],
				'filter' => []
			]
		];

		// TODO: refactor this, moving all filtering logic to a fluid composer class
		// TODO: build good seeder so we have more data to test this

		if(request()->has('name')) array_push($query['bool']['must'], ['term' => ['name' => request('name')]]);
		if(request()->has('cause_name')) array_push($query['bool']['must'], ['term' => ['cause_name' => request('cause_name')]]);
		if(request()->has('step_name')) array_push($query['bool']['must'], ['term' => ['step_name' => request('step_name')]]);
		if(request()->has('assigned_user_name')) array_push($query['bool']['must'], ['term' => ['assigned_user_name' => request('assigned_user_name')]]);
		if(request()->has('location_full')) {
			array_push($query['bool']['must'], ['multi_match' => [
				'query' => request('location_full'),
				'fields' => ['place_address^3', 'place_cep^2', 'place_city^2', 'place_uf', 'place_neighborhood', 'place_reference']
			]]);
		}

		if(request()->has('risk_level')) array_push($query['bool']['filter'], ['terms' => ['risk_level' => request('risk_level')]]);

		if(request()->has('gender')) {
			$filter = ['bool' => ['should' => [['terms' => ['gender' => request('gender')]]]]];
			if(request('gender_null', false)) array_push($filter['bool']['should'], ['missing' => ['field' => 'gender']]);
			array_push($query['bool']['filter'], $filter);
		}

		if(request()->has('place_kind')) {
			$filter = ['bool' => ['should' => [['terms' => ['place_kind' => request('place_kind')]]]]];
			if(request('place_kind_null', false)) array_push($filter['bool']['should'], ['missing' => ['field' => 'place_kind']]);
			array_push($query['bool']['filter'], $filter);
		}

		if(request()->has('age')) {
			$filter = ['bool' => ['should' => [['range' => ['age' => request('age')]]]]];
			if(request('age_null', false)) array_push($filter['bool']['should'], ['missing' => ['field' => 'age']]);
			array_push($query['bool']['filter'], $filter);
		}

		//return response()->json($query);

		$results = $search->search(new Child(), $query);

		return fractal()
			->item($results)
			->transformWith(new ChildSearchTransformer($query))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	protected function list() {
		$paginator = Child::with('cases')->paginate(64);
		$collection = $paginator->getCollection();

		// TODO: child searching

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

	public function activity_log(Child $child) {
		return fractal()
			->collection($child->activity)
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

			return response()->json(['status' => 'ok', 'comment_id' => $attachment->id]);

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
			return response()->json(['status' => 'error', 'error' => 'child_spawn_failed', 'reason' => $ex->getMessage()], 500);
		}

	}

}