<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\User;
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

    public static $number_of_cases = 0;

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
     * Esse comando solicita o ID do tenant do município onde o usuário deseja buscar perfis que estejam desativados e seus respectivos
     * casos. Após solicitar o ID o sistema exibirá um array de crianças com casos bloqueados e a aurizaçao para edicao dos responsáveis.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->comment('Localizando casos bloqueados devido a exclusão de usuário...');
        $this->comment('------------------------------------------------');$this->comment('');

        $tenantId = $this->ask("Informe o ID do tenant: ");

        $disabledUsersWithTenantsArray = User::onlyTrashed()->has('tenant')->select('id', 'tenant_id')->where('tenant_id', '=', $tenantId)->get()->toArray();

        $disabledTenantsInUsers = array_map(function ($d){
            return $d["tenant_id"];
        }, $disabledUsersWithTenantsArray);

        $disabledUsers = array_map(function ($d){
            return $d["id"];
        }, $disabledUsersWithTenantsArray);

        $children = Child::has('cases')
            ->whereIn('tenant_id', $disabledTenantsInUsers)
            ->where('current_step_type', '<>', 'BuscaAtivaEscolar\CaseSteps\Alerta')
            ->where('child_status', '<>', 'in_school')
            ->where('child_status', '<>', 'cancelled')
            ->get();

        $this->comment('Casos bloqueados no município:');

        foreach ($children as $child) {

            if( in_array($child->currentStep->assigned_user_id, $disabledUsers) ){

                $assigned = $this->returnUser($child->currentStep->assigned_user_id);

                $childFinal = [
                    'UF' => $child->tenant->uf,
                    'MUNICIPIO' => $child->tenant->city->name,
                    'CRIANCA/ ADOLESCENTE' => $child->name,
                    'MAE' => $child->mother_name,
                    'ETAPA' => $child->currentStep->step_type,
                    'ID RESPONSAVEL' => $child->currentStep->assigned_user_id,
                    'NOME RESPONSAVEL' => $assigned->name,
                    'DATA DE DESATIVACAO' => $assigned->deleted_at
                ];

                var_dump($childFinal);

                self::$number_of_cases++;
            }
        }


        $this->comment('Foram encontrados '.self::$number_of_cases.' bloqueados devido a exclusao de usuários. Estes são os coordenadores ativos no município:');
        $this->comment('------------------------------------------------'); $this->comment("");

        var_dump($this->returnActualCoordintors($tenantId));

        $this->comment('');
        $this->comment('------------------------------------------------');

        $whantChangeResponsable = $this->ask("Deseja fazer a substituição dos responsáveis por um dos nomes informados acima? 0 -> Não | 1 -> Sim");


        if ( $whantChangeResponsable == 1) {

            foreach ($children as $child) {

                if( in_array($child->currentStep->assigned_user_id, $disabledUsers) ){

                    $this->comment("Caso encontrado: ");

                    $childFinal = [
                        'UF' => $child->tenant->uf,
                        'MUNICIPIO' => $child->tenant->city->name,
                        'CRIANCA/ ADOLESCENTE' => $child->name,
                        'MAE' => $child->mother_name,
                    ];

                    var_dump($childFinal['UF']." - ".$childFinal["MUNICIPIO"]." - ".$childFinal["CRIANCA/ ADOLESCENTE"]." - MAE: ".$childFinal["MAE"]);

                    $idArrayUser = $this->ask("Informe o ID do array do novo responsável: ");

                    $newUser = User::where('id', $this->returnActualCoordintors($tenantId)[$idArrayUser]['id'])->first();

                    $child->currentStep->assignToUser($newUser);

                    $this->comment("Coordenador ".$newUser->name." atribuído ao caso da crianca/ adolescente ".$childFinal['CRIANCA/ ADOLESCENTE']);

                }
            }

        }


        $this->comment('Finalizado');
        $this->comment('------------------------------------------------');
        $this->comment('');

    }

    public function returnUser($id){
        return User::where('id', '=', $id)->withTrashed()->first();
    }

    public function returnActualCoordintors($tenantId){
        $coordinators = User::where('tenant_id', $tenantId)->where('type', 'coordenador_operacional')->select('id', 'uf', 'work_city_name', 'name', 'email')->get()->toArray();
        $coordinatorsArray = array_map(function ($c){
            return [
                'id' => $c['id'],
                'uf' => $c['uf'],
                'city' => $c['work_city_name'],
                'name' => $c['name'],
                'email' => $c['email']
            ];
        }, $coordinators);
        return $coordinatorsArray;
    }
}
