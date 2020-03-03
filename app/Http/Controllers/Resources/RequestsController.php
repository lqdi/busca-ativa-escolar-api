<?php

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Mail\ReopenCaseNotification;
use BuscaAtivaEscolar\ReopeningRequests;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Illuminate\Support\Facades\Mail;

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

        if( $request->requester != null) {

            $msg = new ReopenCaseNotification(
                $request->child->id,
                $request->child->name,
                $request->child->current_case_id,
                null,
                $request->requester->name,
                \Auth::user()->name,
                $request->id,
                null,
                null,
                ReopenCaseNotification::TYPE_REJECT_REOPEN
            );

            Mail::to( $request->requester->email )->send($msg);
        }

        /* */
        $user->type = User::TYPE_GESTOR_OPERACIONAL;

        return response()->json(['status' => 'success', 'result' => 'Solicitação rejeitada com sucesso']);

    }

}