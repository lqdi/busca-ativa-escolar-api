<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;

class AddPriorityTenantNewMotive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:set_priority_tenant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Put value hight for tenants config';

    /**
     * @var array
     */
    private $alerts;
    /**
     * @var int
     */
    private $count = 0;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->alerts = [
            10 => true, // Adolescente em conflito com a lei
            20 => true, // Criança ou adolescente com deficiência(s)
            30 => true, // Criança ou adolescente com doença(s) que impeça(m) ou dificulte(m) a frequência à escola
            40 => true, // Criança ou adolescente em abrigo
            50 => true, // Criança ou adolescente em situação de rua
            60 => true, // Criança ou adolescente vítima de abuso / violência sexual
            70 => true, // Evasão porque sente a escola desinteressante
            80 => true, // Falta de documentação da criança ou adolescente
            90 => true, // Falta de infraestrutura escolar
            100 => true, // Falta de transporte escolar
            110 => true, // Gravidez na adolescência
            120 => true, // Preconceito ou discriminação racial
            130 => true, // Trabalho infantil
            140 => true, // Uso, abuso ou dependência de substâncias psicoativas
            150 => true, // Violência familiar
            160 => true, // Violência na escola
            500 => false, // Importados do Educacenso
            61 => true, // Crianças ou adolescentes migrantes estrangeiros
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment("Processo de atualização dos tenants iniciada.");
        $results = \DB::select('SELECT * FROM tenants');
        foreach ($results as $key => $values) {
            $unserialize = unserialize($values->settings);
            if (!empty($unserialize->alertPriorities)) {
                $keyReturn = $this->checkMotiveExist($unserialize->alertPriorities);
                if (!empty($keyReturn)) {
                    $unserialize->alertPriorities[$keyReturn] = 'high';
                    $this->updateSetting($values->id, $unserialize);
                }
            }
        }
        $this->comment($this->count, ' linhas atualizadas');
    }

    private function checkMotiveExist($alertsBase)
    {
        foreach ($this->alerts as $key => $value) {
            if (!array_key_exists($key, $alertsBase) && $value == true) {
                return $key;
            }
        }
    }

    private function updateSetting($id, $values)
    {
        $serializeValues = addslashes(serialize($values));
        $sql = "UPDATE tenants SET settings = '$serializeValues' WHERE id = '$id'";
        $update = \DB::update($sql);
        if ($update) {
            $this->comment($id .' atualizado');
            $this->count++;
        }
    }
}
