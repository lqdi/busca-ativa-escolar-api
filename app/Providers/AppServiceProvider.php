<?php

namespace BuscaAtivaEscolar\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    Validator::extend('required_for_completion', function ($attribute, $value, $parameters, $validator) {
	    	if(!isset($this->data['is_completing_step'])) return true;
	    	if(!boolval($this->data['is_completing_step'])) return true;
	    	return !empty($value);
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
