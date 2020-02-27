<?php

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\ReopeningRequests;
use BuscaAtivaEscolar\Tenant;

class RequestsController extends BaseController
{

    public function all()
    {

        /* @var $tenant Tenant */
        $tenant = \Auth::user()->tenant;

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

        return $requests;

    }

}