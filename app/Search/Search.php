<?php
/**
 * busca-ativa-escolar-api
 * Search.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/01/2017, 21:55
 */

namespace BuscaAtivaEscolar\Search;

use BuscaAtivaEscolar\Search\Interfaces\Searchable;
use Elasticsearch\Client;

class Search {

	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * @var string
	 */
	protected $prefix;

	public function __construct(Client $client) {
		$this->client = $client;
		$this->prefix = env('ELASTICSEARCH_INDEX_PREFIX', '');
	}

	public function search(Searchable $searchable, array $query, $maxResults = null) {
		return $this->rawSearch([
			'index' => $this->prefix . $searchable->getSearchIndex(),
			'type' => $searchable->getSearchType(),
			'size' => $maxResults,
			'body' => ['query' => $query],
		]);
	}

	public function index(Searchable $searchable) {
		return $this->rawIndex([
			'index' => $this->prefix . $searchable->getSearchIndex(),
			'type' => $searchable->getSearchType(),
			'id' => $searchable->getSearchID(),
			'body' => $searchable->buildSearchDocument(),
		]);
	}

	public function delete(Searchable $searchable) {
		return $this->rawDelete([
			'index' => $this->prefix . $searchable->getSearchIndex(),
			'type' => $searchable->getSearchType(),
			'id' => $searchable->getSearchID(),
		]);
	}

	public function deleteByID(string $index, string $type, $id) {
		return $this->rawDelete([
			'index' => $this->prefix . $index,
			'type' => $type,
			'id' => $id,
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