<?php

namespace BuscaAtivaEscolar\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    protected $listen = [

    ];

    protected $subscribe = [
    	\BuscaAtivaEscolar\Listeners\ChildActivityLogger::class
    ];

    public function boot() {
        parent::boot();
    }
}
