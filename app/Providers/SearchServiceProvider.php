<?php
/**
 * busca-ativa-escolar-api
 * SearchServiceProvider.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 */

namespace BuscaAtivaEscolar\Providers;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Observers\SearchableModelObserver;
use BuscaAtivaEscolar\Search\Search;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider {

    public function boot() {

    	$observer = $this->app->make(SearchableModelObserver::class);

	    Child::observe($observer);
	    City::observe($observer);

    }

    public function register() {
	    $this->app->singleton(Search::class, function ($app) {
		    return new Search(
			    ClientBuilder::create()
				    ->setLogger(ClientBuilder::defaultLogger(storage_path('logs/elastic.log')))
				    ->build()
		    );
	    });

	    $this->app->singleton(SearchableModelObserver::class, function($app) {
		    return new SearchableModelObserver($app->make(Search::class));
	    });
    }
}
