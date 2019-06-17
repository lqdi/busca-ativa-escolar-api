<?php

namespace BuscaAtivaEscolar\Importers;

use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Comment;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use Config;
use Excel;
use Log;
use Exception;

class XLSFileChildrenImporter implements Importer
{
    const TYPE = "xls_file_children";

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
     * @var int The total records imported from xls file
     */
    private $total_records;

    /**
     * @var string observations about import job
     */
    private $observations;

    public function handle(ImportJob $job)
    {

        $this->job = $job;
        $this->total_records = 0;
        $this->observations .= "";
        $this->tenant = $job->tenant;
        $this->file = $job->getAbsolutePath();

        $this->agent = User::find(User::ID_IMPORT_XLS_BOT);

        if(!$this->agent) {
            throw new Exception("Failed to find Educacenso bot user!");
        }

        Log::info("[xls_import] Tenant {$this->tenant->name}, file {$this->file}");
        Log::info("[xls_import] Loading spreadsheet data into memory ...");

        //percorre para validar os campos
        Config::set('excel.import.startRow', 1);
        Excel::selectSheetsByIndex(0)->filter('chunk')->load($this->file)->chunk(
            250,
            function ($results) {
                foreach ($results->toArray() as $rowNumber => $row) {
                    $this->validateRow($row);
                }
            },
            false
        );

        //percorre para fazer o cadastro
        Config::set('excel.import.startRow', 1);
        Excel::selectSheetsByIndex(0)->filter('chunk')->load($this->file)->chunk(
            250,
            function ($results) {
                foreach ($results->toArray() as $rowNumber => $row) {

                    if(!$this->isThereChild($row)){
                        $this->parseChild($row);
                    }

                }
            },
            false
        );

        $job->setTotalRecords($this->total_records);
        $job->addObservations($this->observations);

        Log::info("[educacenso_import] Completed parsing all records");
        Log::info("[educacenso_import] Job completed!");

    }

    public function validateRow($row){

        //Validacoes dos cabecalhos
        if(!array_key_exists('nome_do_aluno', $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Nome do aluno");
        }

        if(!array_key_exists('data_de_nascimento_formato_ddmmaaaa', $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Data de nascimento");
        }

        if(!array_key_exists('nome_da_mae_ou_responsavel', $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Nome da mãe ou responsável");
        }

        if(!array_key_exists('nome_do_pai', $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Nome do pai");
        }

        if(!array_key_exists('endereco' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Endereço");
        }

        if(!array_key_exists('bairro' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Bairro");
        }

        if(!array_key_exists('uf_sigla_do_estado' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna UF");
        }

        if(!array_key_exists('cidade' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Cidade");
        }

        if(!array_key_exists('cep_somente_numeros' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna CEP");
        }

        if(!array_key_exists('telefone_apenas_numeros_com_ddd' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Telefone");
        }

        if(!array_key_exists('observacoes' , $row)){
            throw new Exception("Arquivo inválido. Não tem a coluna Observações");
        }

        //Validacoes dos campos obrigatórios
        if($row['nome_do_aluno'] == null){
            Log::info("Nome da criança ou adolescente não informado.");
            throw new Exception("Arquivo inválido. Nome da criança não informado");
        }

        if($row['nome_da_mae_ou_responsavel'] == null){
            Log::info("Nome da mãe ou responsável pela criança ou adolescente não informado.");
            throw new Exception("Arquivo inválido. Nome da mãe ou responsável pela criança não informado");
        }

        if($row['uf_sigla_do_estado'] == null){
            Log::info("Estado não informado.");
            throw new Exception("Arquivo inválido. Estado não informado");
        }

        if($row['cidade'] == null){
            Log::info("Cidade não informada.");
            throw new Exception("Arquivo inválido. Cidade não informada");
        }

        if($row['bairro'] == null){
            Log::info("Bairro não informado.");
            throw new Exception("Arquivo inválido. Bairro não informado");
        }

        if($row['endereco'] == null){
            Log::info("Endereço não informado.");
            throw new Exception("Arquivo inválido. Endereço não informado");
        }

        //Validacoes dos padroes

        //valida data de nascimento
        if ($row['data_de_nascimento_formato_ddmmaaaa'] != null) {

            if( !preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", trim($row['data_de_nascimento_formato_ddmmaaaa'])) ){
                Log::info("A data de nascimento não está no padrão XX/XX/XXXX.");
                throw new Exception("Arquivo inválido. A data de nascimento não está no padrão XX/XX/XXXX - ".$row['nome_do_aluno']);
            }
            list($dd,$mm,$yyyy) = explode('/', trim($row['data_de_nascimento_formato_ddmmaaaa']));
            if(checkdate($mm,$dd,$yyyy) == false){
                Log::info("Data de nascimento inválida.");
                throw new Exception("Arquivo inválido. Data de nascimento inválida - ".$row['nome_do_aluno']);
            }
        }

        //valida telefone
        if ($row['telefone_apenas_numeros_com_ddd'] != null) {
            if( strlen ( (string) $row['telefone_apenas_numeros_com_ddd'] ) < 10 ){
                Log::info("Número de telefone incompleto.");
                throw new Exception("Arquivo inválido. Número de telefone incompleto - ".$row['nome_do_aluno']);
            }

            if( strlen ( (string) $row['telefone_apenas_numeros_com_ddd'] ) > 11 ){
                Log::info("Número de telefone maior que o permitido.");
                throw new Exception("Arquivo inválido. Número de telefone maior que o permitido - ".$row['nome_do_aluno']);
            }

            if( strpos( (string) $row['telefone_apenas_numeros_com_ddd'], "(" ) OR strpos( (string) $row['telefone_apenas_numeros_com_ddd'], ")" ) ){
                Log::info("Número de telefone contém caracteres inválidos.");
                throw new Exception("Arquivo inválido. Número de telefone contém caracteres inválidos - ".$row['nome_do_aluno']);
            }
        }

        //valida cep
        if ($row['cep_somente_numeros'] != null) {
            if( strlen ( (string) $row['cep_somente_numeros'] ) < 8 ){
                Log::info("CEP incompleto.");
                throw new Exception("Arquivo inválido. CEP incompleto - ".$row['nome_do_aluno']);
            }
            if( strlen ( (string) $row['cep_somente_numeros'] ) > 8 ){
                Log::info("CEP maior que o permitido.");
                throw new Exception("Arquivo inválido. CEP maior que o permitido - ".$row['nome_do_aluno']);
            }
        }


    }

    private function parseChild($row){
        Log::info("[xls_import] Bot Agent User: {$this->agent->id}, {$this->agent->name}");

        $fieldMap = [
            'nome_do_aluno' => 'name',
            'data_de_nascimento_formato_ddmmaaaa' => 'dob',
            'nome_da_mae_ou_responsavel' => 'mother_name',
            'nome_do_pai' => 'father_name',
            'endereco' => 'place_address',
            'bairro' => 'place_neighborhood',
            'cep_somente_numeros' => 'place_cep',
            'telefone_apenas_numeros_com_ddd' => 'mother_phone',
            'observacoes' => 'observation'
        ];

        $data = [];

        foreach($fieldMap as $xlsField => $systemField) {
            if(!isset($row[$xlsField])) continue;
            $data[$systemField] = trim((string) $row[$xlsField]);
        }

        $data['alert_cause_id'] = AlertCause::getBySlug('xls_import')->id;
        $data['dob'] = isset($data['dob']) ? Carbon::createFromFormat('d/m/Y', $data['dob'])->format('Y-m-d') : null;
        $data['place_uf'] = $this->tenant->city->uf;
        $data['place_city_id'] = strval($this->tenant->city->id);
        $data['place_city_name'] = $this->tenant->city->name;
        $data['place_kind'] = null;
        $data['has_been_in_school'] = false;

        Log::info("[xls_import] \t Parsed data: " . print_r($data, true));

        $child = Child::spawnFromAlertData($this->tenant, $this->agent->id, $data);

        Log::info("[xls_import] \t Spawned child with ID: {$child->id}");

        $pesquisa = Pesquisa::fetchWithinCase($child->current_case_id, Pesquisa::class, 20);

        Log::info("[xls_import] \t Found pesquisa: {$pesquisa->id}");

        $pesquisa->setFields($data);

        Log::info("[xls_import] \t Posting comments...");

        Comment::post($child, $this->agent, "Caso importado na planilha personalizada do Município");

        Log::info("[xls_import] \t Child spawn complete!");

        $this->total_records++;
    }

    private function isThereChild($row){

        $birthDay = null;

        if($row['data_de_nascimento_formato_ddmmaaaa'] != null){
            $birthDay = Carbon::createFromFormat('d/m/Y', $row['data_de_nascimento_formato_ddmmaaaa'])->format('Y-m-d');
        }

        $age = Child::calculateAgeThroughBirthday($birthDay);

        Log::info($age);

        $child = Child::where(
            [
                ['name', '=', $row['nome_do_aluno']],
                ['mother_name', '=', $row['nome_da_mae_ou_responsavel']],
                ['age', '=', $age],
                ['city_id', '=', $this->tenant->city_id],
                ['alert_status', '=', Child::ALERT_STATUS_ACCEPTED],
                ['child_status', '=', Child::STATUS_OUT_OF_SCHOOL]
            ]
        )->orWhere(
            [
                ['name', '=', $row['nome_do_aluno']],
                ['mother_name', '=', $row['nome_da_mae_ou_responsavel']],
                ['age', '=', $age],
                ['city_id', '=', $this->tenant->city_id],
                ['alert_status', '=', Child::ALERT_STATUS_ACCEPTED],
                ['child_status', '=', Child::STATUS_OBSERVATION]
            ]
        )->orWhere(
            [
                ['name', '=', $row['nome_do_aluno']],
                ['mother_name', '=', $row['nome_da_mae_ou_responsavel']],
                ['age', '=', $age],
                ['city_id', '=', $this->tenant->city_id],
                ['alert_status', '=', Child::ALERT_STATUS_PENDING]
            ]
        )->first();

        if($child == null){
            return false;
        }else{
            Log::info("Child already exists ".$child->name." | ID: ".$child->id);
            $this->observations .= "| ".$child->name. " [duplicado] - ";
            return true;
        }

    }

}