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
            ->get();

        /* */
        $user->type = User::TYPE_GESTOR_OPERACIONAL;

        return $requests;

    }

}