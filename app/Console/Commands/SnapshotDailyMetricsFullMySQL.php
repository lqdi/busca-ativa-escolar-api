<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;

class SnapshotDailyMetricsFullMySQL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snapshot:daily_metrics_full_mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um snapshot de todas as crianças da plataforma diariamente (MySQL)';

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
