<?php
/**
 * busca-ativa-escolar-api
 * StepsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/01/2017, 01:29
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\CaseSteps\Observacao;
use BuscaAtivaEscolar\CaseSteps\Rematricula;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Scopes\TenantScope;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\StepTransformer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use BuscaAtivaEscolar\User;
use Carbon\Carbon;
use DB;


class MaintenanceController extends BaseController
{

    public function assignForAdminUser($userId)
    {
            $currentUser = $this->currentUser();
            $listCases = $this->getCasebyPhases($userId);

            var_dump($listCases);


//        $query = Child::whereHas('child', function ($query) {
//            $query->where('child_status', '<>', 'cancelled');
//        })->where('assigned_user_id', '=', $userId)
//            ->where('is_completed', '=', 0)
//            ->get();

//        try {
////            $user = User::withoutGlobalScope(TenantScope::class)->findOrFail(request('user_id'));
////            $step = CaseStep::fetch($step_type, $step_id);
////
////            $step->assignToUser($user);
////
////            // TODO: fix assignment not reindexing
////
////            return response()->json(['status' => 'ok', 'user' => fractal()->item($user, new UserTransformer())]);
//
//        } catch (\Exception $ex) {
//            return $this->api_exception($ex);
//        }
    }

    private function getCasebyPhases($userId)
    {
        $result = DB::table('children AS c')
            ->join('case_steps_pesquisa AS pesquisa', 'c.id', '=', 'pesquisa.child_id')
            ->join('case_steps_analise_tecnica AS analise', 'c.id', '=', 'analise.child_id')
            ->join('case_steps_gestao_do_caso AS gestao', 'c.id', '=', 'gestao.child_id')
            ->join('case_steps_observacao AS observacao', 'c.id', '=', 'observacao.child_id')
            ->where('pesquisa.assigned_user_id', '=', $userId)
//            ->where('c.child_status', '<>', 'cancelled')
            ->get();
        return $result;
    }

}