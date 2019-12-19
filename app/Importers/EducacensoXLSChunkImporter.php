<?php
/**
 * Created by PhpStorm.
 * User: manoelfilho
 * Date: 08/10/18
 * Time: 09:26
 */

namespace BuscaAtivaEscolar\Importers;

use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use Excel;
use Log;


class EducacensoXLSChunkImporter
{

    const TYPE = "inep_educacenso_xls_chunck";

    /**
     * @var ImportJob The import job submitted
     */
    public $job;

    /**
     * @var Tenant The tenant that is importing the alerts
     */
    public $tenant;

    /**
     * @var string The XLS file absolute path
     */
    public $file;

    /**
     * @var User The agent that is identified as the creator of the alerts
     */
    private $agent;

    /**
     * @var int The year of Educacenso
     */
    public $educacenso_year = 2018;

    /**
     * Handles the importing of Educacenso's XLS
     * @param ImportJob $job
     * @throws \Exception
     */
    public function handle(ImportJob $job) {

        $this->job = $job;
        $this->tenant = $job->tenant;
        $this->file = $job->getAbsolutePath();

        $this->agent = User::find(User::ID_EDUCACENSO_BOT);

        if(!$this->agent) {
            throw new \Exception("Failed to find Educacenso bot user!");
        }

        Log::info("[educacenso_import] Tenant {$this->tenant->name}, file {$this->file}");
        Log::info("[educacenso_import] Loading spreadsheet data into memory ...");

        Excel::selectSheetsByIndex(0)->filter('chunk')->load($this->file)->chunk(
            1000,
            function ($results) {
                foreach ($results->toArray() as $rowNumber => $row) {
                    if(!array_key_exists('uf', $row)){
                        Log::info("[educacenso_import] \t no 'UF' keyword found");
                        throw new \Exception("Arquivo diferente do padrão fornecido pelo Educacenso");
                    }
                    Log::info("[educacenso_import] \t Found UF keyword!");
                    if($row['uf'] == null){
                        Log::info("[educacenso_import] Found empty line in data block, block has closed!");
                        break;
                    }
                    if(!$this->isThereChild($row)){
                        $this->parseChildRow($row);
                    }
                }
            },
            false
        );

        Log::info("[educacenso_import] Completed parsing all records");

        $this->tenant->educacenso_import_details = [
            'has_imported' => true,
            'imported_at' => date('Y-m-d H:i:s'),
            'last_job_id' => $this->job->id,
            'file' => $this->file
        ];

        $this->tenant->save();

        Log::info("[educacenso_import] Job completed!");

    }

    public function parseChildRow($row) {

        Log::info("[educacenso_import] Bot Agent User: {$this->agent->id}, {$this->agent->name}");

        $placeKindMap = [
            'URBANA' => 'urban',
            'RURAL' => 'rural',
        ];

        $fieldMap = [
            'identificacao_unica' => 'educacenso_id',
            'nome_do_aluno' => 'name',
            'data_de_nascimento' => 'dob',
            'filiacao_1' => 'mother_name',
            'localizacao' => 'place_kind',
            'codigo_da_escola' => 'school_last_id',
            'nome_da_escola' => 'school_last_name',
        ];

        $data = [];

        foreach($fieldMap as $xlsField => $systemField) {
            if(!isset($row[$xlsField])) continue;
            $data[$systemField] = $row[$xlsField];
        }

        $data['observation'] = "Escola: ".$row['nome_da_escola']." | Modalidade de ensino: ".$row['modalidade_de_ensino']." | Etapa: ".$row['etapa_de_ensino'];

        $data['alert_cause_id'] = AlertCause::getBySlug('educacenso_inep')->id;

        $data['educacenso_id'] = strval($data['educacenso_id'] ?? "unkn_" . uniqid());
        $data['name'] = $data['name'] ?? "-- informação não disponível --";
        $data['dob'] = isset($data['dob']) ? Carbon::createFromFormat('d/m/Y', $data['dob'])->format('Y-m-d') : null;
        $data['place_uf'] = $this->tenant->city->uf;
        $data['place_city_id'] = strval($this->tenant->city->id);
        $data['place_city_name'] = $this->tenant->city->name;
        $data['place_kind'] = isset($data['place_kind']) ? ($placeKindMap[$data['place_kind']] ?? null) : null;
        $data['has_been_in_school'] = true;
        $data['educacenso_year'] = $this->educacenso_year;

        Log::info("[educacenso_import] \t Parsed data: " . print_r($data, true));

        $child = Child::spawnFromAlertData($this->tenant, $this->agent->id, $data);

        Log::info("[educacenso_import] \t Spawned child with ID: {$child->id}");

        $pesquisa = Pesquisa::fetchWithinCase($child->current_case_id, Pesquisa::class, 20);

        Log::info("[educacenso_import] \t Found pesquisa: {$pesquisa->id}");

        $pesquisa->setFields($data);

        Log::info("[educacenso_import] \t Posting comments...");

        Comment::post($child, $this->agent, "Caso importado na planilha do Educacenso");

        if(isset($row['Etapa de ensino'])) {
            Comment::post($child, $this->agent, "Última etapa de ensino: "  . $row['Etapa de ensino']);
        }

        Log::info("[educacenso_import] \t Child spawn complete!");

    }

    public function isThereChild($row){
        $identificacao_unica = strval($row['identificacao_unica']);
        $child = Child::where(
            [
                ['educacenso_year', '=', $this->educacenso_year],
                ['educacenso_id', '=', $identificacao_unica],
                ['city_id', '=', $this->tenant->city_id]
            ]
        )->first();

        if($child == null){
            return false;
        }else{
            Log::info("Child already exists ".$child->name." | ID: ".$child->id." | ID Educacenso: ".$child->educacenso_id." | Ano: ".$child->educacenso_year);
            return true;
        }
    }

}