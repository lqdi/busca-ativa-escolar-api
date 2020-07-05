<?php

namespace BuscaAtivaEscolar\Jobs;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Group;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use Rap2hpoutre\FastExcel\FastExcel;

class ProcessExportChildrenJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $paramsQuery;

    public function __construct($user, $paramsQuery)
    {
        $this->user = $user;
        $this->paramsQuery = $paramsQuery;
    }

    public function handle()
    {

        set_time_limit(0);
        Log::info("Iniciando processo de exportacao das criancas do municipio");

        File::makeDirectory(storage_path("app/attachments/children_reports/".$this->user->id), $mode = 0777, true, true);
        (new FastExcel($this->childrenGenerator()))->export(storage_path("app/attachments/children_reports/".$this->user->id."/".$this->user->id.".xlsx"));

        Log::info("Finalizando processo de exportacao das criancas do municipio");

    }

    function childrenGenerator() {

        $children = Child::where('tenant_id', '=', $this->user->tenant_id);
        $children->where("current_step_type", "<>", "BuscaAtivaEscolar\CaseSteps\Alerta");

        $children->where("name", "like", "%".$this->paramsQuery['name']."%");
        $children->where("current_step_type", "like", "%".$this->paramsQuery['step_name']."%");

        //somente os casos do tecnico verificador
        if( $this->user->type === User::TYPE_TECNICO_VERIFICADOR ){
            $children->whereHas('cases', function ($query){
                $query->where(['assigned_user_id' => $this->user->id]);
            });
        }
        //somente os casos do grupo do supervisor se grupo for diferente do primario
        if ( $this->user->type === User::TYPE_SUPERVISOR_INSTITUCIONAL ){
            $group = $this->user->group; /* @var $group Group */
            $group_primary = $this->user->tenant->primaryGroup; /* @var $group Group */

            if( $group->id != $group_primary->id){
                $children->whereHas('cases', function ($query) use ($group){
                    $query->where(['assigned_group_id' => $group->id]);
                });
            }

        }

        foreach ($children->cursor() as $child) {
            yield $this->transformChildToArrayExport($child);
        }

    }

    function transformChildToArrayExport($child){
        return [
            'Nome' => $child->name ?? '',
            'Nome da mãe' => $child->mother_name ?? null,
            'Nome do pai' => $child->father_name ?? null,
            'Risco' => isset($child->risk_level) ? trans('risk_level.' . $child->risk_level) : null,
            'Sexo' => isset($child->gender) ? trans('child.gender.' . $child->gender) : null,
            'Idade' => $child->age,
            'Usuário responsável' => $child->assigned_user_name ?? null,
            'Etapa' => $child->step_name ?? null,
            'Está Atrasado?' => (($child->deadline_status ?? 'normal') === Child::DEADLINE_STATUS_LATE) ? 'Sim' : 'Não',
            'Status da Criança' => trans('child.status.' . $child->child_status ?? null),
            'Status do Caso' => trans('child.status.' . $child->child_status ?? null),
            'Status do Prazo' => trans('child.deadline_status.' . $child->deadline_status ?? null),
            'Status do Alerta' => trans('child.alert_status.' . $child->alert_status ?? null),
            'Data Criado' => isset($child->created_at) ? Carbon::createFromTimestamp(strtotime($child->created_at))->toIso8601String() : null,
            'Data Atualizado' => isset($child->updated_at) ? Carbon::createFromTimestamp(strtotime($child->updated_at))->toIso8601String() : null,
            'Endereco' => $child->place_address ?? '',
            'Bairro' => $child->place_neighborhood ?? '',
            'Referencia' => $child->place_reference ?? '',
            'CEP' => $child->place_cep ?? '',
        ];
    }

}