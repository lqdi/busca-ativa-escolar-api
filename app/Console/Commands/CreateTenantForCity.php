<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;

class CreateTenantForCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:create_tenant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a tenant and assigns to a city';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
