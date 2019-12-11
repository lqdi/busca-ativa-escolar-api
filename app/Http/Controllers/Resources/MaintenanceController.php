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
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Scopes\TenantScope;
use BuscaAtivaEscolar\User;
use DB;


class MaintenanceController extends BaseController
{

    public function assignForAdminUser($userId, UsersController $usersController)
    {
        try {
            $currentUser = $this->currentUser();
            $listCases = $this->getCasebyPhases($userId);

            foreach ($listCases as $child) {
                $step = CaseStep::fetch($child->current_step_type, $child->current_step_id);
                $step->assignToUser($currentUser);
            }

            $user = User::withoutGlobalScope(TenantScope::class)->findOrFail($userId);
            $usersController->destroy($user);

            return response()->json(['status' => 'ok', 'user' => $currentUser]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    private
    function getCasebyPhases($userId)
    {
        $result = DB::table('children AS c')
            ->select('c.*')
            ->join('case_steps_pesquisa AS pesquisa', 'c.id', '=', 'pesquisa.child_id')
            ->join('case_steps_analise_tecnica AS analise', 'c.id', '=', 'analise.child_id')
            ->join('case_steps_gestao_do_caso AS gestao', 'c.id', '=', 'gestao.child_id')
            ->join('case_steps_rematricula AS rematricula', 'c.id', '=', 'rematricula.child_id')
            ->join('case_steps_observacao AS observacao', 'c.id', '=', 'observacao.child_id')
            ->where('c.child_status', '<>', 'cancelled')
            ->where('c.child_status', '<>', 'in_school')
            ->where('observacao.assigned_user_id', '=', $userId)
            ->orWhere('pesquisa.assigned_user_id', '=', $userId)
            ->orWhere('analise.assigned_user_id', '=', $userId)
            ->orWhere('gestao.assigned_user_id', '=', $userId)
            ->orWhere('rematricula.assigned_user_id', '=', $userId)
            ->orWhere('observacao.assigned_user_id', '=', $userId)
            ->groupBy('c.id')
            ->get();
        return $result;
    }

}