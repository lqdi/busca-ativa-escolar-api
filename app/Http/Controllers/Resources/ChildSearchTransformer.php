<?php
/**
 * busca-ativa-escolar-api
 * ChildSearchTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/01/2017, 23:58
 */

namespace BuscaAtivaEscolar\Transformers;


use League\Fractal\TransformerAbstract;

class ChildSearchTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'results',
	];

	protected $defaultIncludes = [
		'results',
	];

	protected $query;

	public function __construct(array $query) {
		$this->query = $query;
	}

	public function transform($result) {

		if(!isset($result['hits'])) {
			return [
				'status' => 'failed',
				'query' => $this->query,
				'response' => $result
			];
		}

		return [
			'status' => 'ok',
			'query' => $this->query,
			'raw' => config('app.debug', false) ? $result : null,
			'stats' => [
				'total_results' => $result['hits']['total'] ?? 0,
				'max_score' => $result['hits']['max_score'] ?? 0,
				'query_time' => $result['took'] ?? 0,
				'shards' => $result['_shards'] ?? [],
			],
		];
	}

	public function includeResults($result) {
		if(!isset($result['hits'])) return null;
		if(!isset($result['hits']['hits'])) return null;
		return $this->collection($result['hits']['hits'], new ChildSearchResultsTransformer(), false);
	}

}