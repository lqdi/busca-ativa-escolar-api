<?php
/**
 * busca-ativa-escolar-api
 * Region.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/01/2017, 21:52
 */

namespace BuscaAtivaEscolar\Providers;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Observers\SearchableModelObserver;
use BuscaAtivaEscolar\Search\Search;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider {

    public function boot() {
	    Child::observe($this->app->make(SearchableModelObserver::class));
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
