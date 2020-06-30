<?php

namespace BuscaAtivaEscolar\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessExportChildrenJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $tenant;

    /**
     * ProcessExportChildrenJob constructor.
     * @param $tenant     */
    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    public function handle()
    {

        Log::info("Iniciando processo de exportacao das criancass do municipio");
        set_time_limit(0);



        Log::info("Finalizando processo de exportacao das criancass do municipio");

    }


}