<?php

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\ReopeningRequests;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;

class RequestsController extends BaseController
{

    public function all()
    {

        /* @var $tenant Tenant */
        $tenant = \Auth::user()->tenant;

        /* @var $user User */
        $user = \Auth::user();

        /* */
        $user->type = User::TYPE_GESTOR_NACIONAL;

        $requests = ReopeningRequests::query()
            ->with(
                [
                    'child' => function ($q){
                        $q->with (
                            ['alert']
                        );
                    },
                    'requester',
                    'recipient'
                ]
            )
            ->where('tenant_recipient_id', $tenant->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['data' => $requests]);
        /* */
        $user->type = User::TYPE_GESTOR_OPERACIONAL;

        return $requests;

    }

    public function reject(ReopeningRequests $request){

        /* @var $user User */
        $user = \Auth::user();

        /* */
        $user->type = User::TYPE_GESTOR_NACIONAL;

        if( $request == null){
            return response()->json(['status' => 'error', 'result' => 'Solicitação não localizada']);
        }

        $request->status = ReopeningRequests::STATUS_CANCELLED;

        $request->save();

        /* */
        $user->type = User::TYPE_GESTOR_OPERACIONAL;

        return response()->json(['status' => 'success', 'result' => 'Solicitação rejeitada com sucesso']);

    }

}