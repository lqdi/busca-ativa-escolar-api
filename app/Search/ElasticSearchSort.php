<?php
/**
 * busca-ativa-escolar-api
 * SearchQuery.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 23/01/2017, 14:19
 */

namespace BuscaAtivaEscolar\Search;


class ElasticSearchSort {

	/**
	 * @var array The given search parameters.
	 */
//	protected $params;

	/**
	 * @var array The ElasticSearch query being built.
	 */
	public $sort = [
		'sort' => []
	];

    /**
	 * SearchQuery constructor.
	 * Creates a search query and gives it a specified set of search parameters.
	 * You might want to use the static method SearchQuery::withParameters() instead, for fluid composition.
	 *
	 * @param array $params The search parameters (associative array of fields to search and expected values).
	 */

	/**
	 * Adds a single text field to the list of fields to be searched on.
	 * Will search for the $params[$name] value in the $name field in the documents.
	 * Adds a 'term' search.
	 *
	 * @param string $name The name of the field in both search parameters and document.
	 * @param string $mode The search mode ('term' for full term, or 'match' for loose query)
	 * @param string $priority The 'priority' to use (must/should/filter). See ElasticSearch docs for more info.
	 * @return self Same query instance, for fluid composition.
	 */
	public function addSort($param) {

		$this->sort = $param;

		return $this;
	}
    public static function withParameters(array $params = null) : self {
        return new self($params);
    }
}
