<?php
/**
 * busca-ativa-escolar-api
 * Reports.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 01/02/2017, 17:25
 */

namespace BuscaAtivaEscolar\Reports;


use BuscaAtivaEscolar\Reports\Interfaces\CanBeAggregated;
use BuscaAtivaEscolar\Reports\Interfaces\CollectsDailyMetrics;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use Elasticsearch\Client;

class Reports {

	protected $client;

	public function __construct(Client $client) {
		$this->client = $client;
	}

	public function query(string $index, string $type, string $dimension, ElasticSearchQuery $query = null) {

		$request = [
			'size' => 0,
			'aggs' => [
				'num_entities' => [
					'terms' => [
						'size' => 0,
						'field' => $dimension
					]
				]
			]
		];

		if($query !== null) {
			$request['query'] = $query->getQuery();
		}

		$response = $this->rawSearch([
			'index' => $index,
			'type' => $type,
			'body' => $request
		]);

		return [
			'records_total' => $response['hits']['total'] ?? 0,
			'report' => array_pluck($response['aggregations']['num_entities']['buckets'] ?? [], 'doc_count', 'key')
		];

	}

	public function buildSnapshot(CollectsDailyMetrics $entity, string $date) {
		$metrics['date'] = $date;

		$this->rawIndex([
			'index' => $entity->getTimeSeriesIndex(),
			'type' => $entity->getTimeSeriesType(),
			'body' => $metrics
		]);
	}

	public function rawSearch(array $parameters) {
		return $this->client->search($parameters);
	}

	public function rawIndex(array $parameters) {
		return $this->client->index($parameters);
	}

	public function rawDelete(array $parameters) {
		return $this->client->delete($parameters);
	}

}