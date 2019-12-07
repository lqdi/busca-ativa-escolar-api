<?php

namespace BuscaAtivaEscolar\Console\Commands;

use function Aws\map;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\User;
use DB;
use Excel;
use Illuminate\Console\Command;
use function PHPSTORM_META\type;

class FixErrorCasesDisabled extends Command
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
    protected $description = 'Localiza casos bloqueados devido a desativação de usuários que estavam como responsáveis';

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

        $this->comment('Gerando arquivos com todos as criancas/ adolescentes que estao com casos sob a supervisao de usuario desativado');

        $states = [
                'AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES',
                'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE',
                'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC',
                'SE', 'SP', 'TO'
        ];

        foreach ($states as $state){

            $this->comment('------------------------------------------------');
            $this->comment('Buscando usuários desativados do estado de '.$state);

            $disabledUsersWithTenantsArray = User::onlyTrashed()->has('tenant')->select('id', 'tenant_id')->where('work_uf', '=', $state)->get()->toArray();

            $disabledUsers = array_map(function ($d){
                return $d["id"];
            }, $disabledUsersWithTenantsArray);

            $disabledTenantsInUsers = array_map(function ($d){
                return $d["tenant_id"];
            }, $disabledUsersWithTenantsArray);

            $children = Child::has('cases')
                ->whereIn('tenant_id', $disabledTenantsInUsers)
                ->where('current_step_type', '<>', 'BuscaAtivaEscolar\CaseSteps\Alerta')
                ->where('child_status', '<>', 'in_school')
                ->where('child_status', '<>', 'cancelled')
                ->get();

            Excel::create('buscaativaescolar_users_'.strtolower($state), function($excel) use ($children, $disabledUsers) {
                $excel->sheet('users', function($sheet) use ($children, $disabledUsers) {
                    foreach ($children as $child) {
                        if( in_array($child->currentStep->assigned_user_id, $disabledUsers) ){

                            $childFinal = [
                                'UF' => $child->tenant->uf,
                                'Município' => $child->tenant->city->name,
                                'Crianca/ adolescente' => $child->name,
                                'etapa' => $child->currentStep->step_type,
                                'Responsável ID' => $child->currentStep->assigned_user_id,
                                'Responsável Nome' => $this->returnUser($child->currentStep->assigned_user_id)->name
                            ];

                            $sheet->appendRow(
                                $childFinal
                            );
                        }
                    }
                });
            })->store('xls', storage_path('app/attachments/users_disabled'));

            $this->comment('Salvando arquivo do estado de '.$state);

            $this->comment('Finalizando a busca dos usuários do estado de '.$state);
            $this->comment('------------------------------------------------');
            $this->comment('');

        }

        $this->comment('Final do processo');

    }

    public function returnUser($id){
        return User::where('id', '=', $id)->withTrashed()->first();
    }
}
