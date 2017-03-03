<?php
/**
 * busca-ativa-escolar-api
 * AppServiceProvider.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 */

namespace BuscaAtivaEscolar\Providers;

use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Observers\AttachmentActivityLogObserver;
use BuscaAtivaEscolar\Observers\ChildActivityLogObserver;
use BuscaAtivaEscolar\Observers\CommentActivityLogObserver;
use BuscaAtivaEscolar\SMS\Handlers\Zenvia;
use BuscaAtivaEscolar\SMS\SmsProvider;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider {

    public function boot() {

    	Child::observe(new ChildActivityLogObserver());
    	Comment::observe(new CommentActivityLogObserver());
    	Attachment::observe(new AttachmentActivityLogObserver());

	    Validator::extend('required_for_completion', function ($attribute, $value, $parameters, $validator) {
	    	if(!isset($this->data['is_completing_step'])) return true;
	    	if(!boolval($this->data['is_completing_step'])) return true;
	    	return !empty($value);
	    });
    }

    public function register() {
	    $this->app->bind(SmsProvider::class, Zenvia::class);
    }
}
