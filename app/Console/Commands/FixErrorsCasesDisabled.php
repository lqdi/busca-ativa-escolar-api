<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;

class FixErrorsCasesDisabled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:to_fix_errors_from_user_disabled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atribui casos bloqueados devido a exclusao de um usuário a um coordenador peracional ativo';

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
