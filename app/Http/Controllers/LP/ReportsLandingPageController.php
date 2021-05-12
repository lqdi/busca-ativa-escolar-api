<?php

/**
 * Created by PhpStorm.
 * User: manoelfilho
 * Date: 15/11/18
 * Time: 13:43
 */

namespace BuscaAtivaEscolar\Http\Controllers\LP;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\StateSignup;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\TenantSignup;
use Carbon\Carbon;

class ReportsLandingPageController extends BaseController
{
    public function report_country()
    {

        try {

            $alerts = [];
            $causes = [];
            foreach (AlertCause::getAll() as $alert) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                    ->where(
                        [
                            ['case_steps_alerta.alert_cause_id', $alert->id],
                            ['children.alert_status', 'accepted'],
                            ['children.child_status', '<>', 'cancelled']
                        ]
                    )
                    ->count();

                if ($qtd > 0) {
                    array_push($alerts, ['id' => $alert->id, 'cause' => $alert->label, 'qtd' => $qtd]);
                }
            }
            foreach (CaseCause::getAll() as $case) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_pesquisa', 'children.id', '=', 'case_steps_pesquisa.child_id')
                    ->where(
                        [
                            ['case_steps_pesquisa.case_cause_ids', 'like', "%{$case->id}%"],
                            ['children.alert_status', 'accepted'],
                            ['children.child_status', '<>', 'cancelled']
                        ]
                    ) //->whereIn('case_steps_pesquisa.case_cause_ids', $case->id)
                    ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $case->id, 'cause' => $case->label, 'qtd' => $qtd]);
                }
            }
            //-1 * DATEDIFF('last_active_at', now()) < 30   diffInDays(Carbon::now()) >= 30
            //$active = Tenant::query()->where("DATEDIFF('last_active_at', '" . Carbon::now() . "')", '>', '-30')->count();
            //print_r($active);
            //$inactive = Tenant::query()->where("DATEDIFF('last_active_at', '" . Carbon::now() . "')", '<=', '-30')->count();
            $expDate = Carbon::now()->subDays(30);
            $active = Tenant::query()->whereDate('last_active_at', '>', $expDate)->count();
            $inactive = Tenant::query()->whereDate('last_active_at', '<=', $expDate)->count();
            $data = [
                'tenants' => [
                    'num_tenants' => Tenant::query()
                        ->count(),
                    'active' => $active,
                    'inactive' => $inactive,
                    'num_pending_setup' => TenantSignup::query()
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),
                    //'num_ufs' => StateSignup::query()->count(),

                    /*'num_signups' => TenantSignup::query()
                        ->count(),*/

                    /*'num_pending_setup' => TenantSignup::query()
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),*/
                ],
                'alerts' => [

                    '_approved' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                //['children.child_status', '<>', 'cancelled']
                            ]
                        )
                        ->count(),

                    '_pending' => Child::whereHas('alert', function ($query) {
                        $query->where('alert_status', '=', 'pending');
                    })->pending()->count(),

                    '_rejected' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['children.alert_status', 'rejected']
                            ]
                        )
                        ->count(),
                ],

                'cases' => [

                    '_enrollment' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['children.child_status', 'in_observation']
                            ]
                        )
                        ->orWhere(
                            [
                                ['children.child_status', 'in_school']
                            ]
                        )
                        ->count(),

                    '_in_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_transferred' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'transferred'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_in_observation' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_observation'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_out_of_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                //['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'out_of_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_cancelled' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'cancelled'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_interrupted' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'interrupted'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                ],

                'causes_alerts' => $alerts,
                'causes_cases' => $causes

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function report_reg()
    {

        $reg = request('reg');
        $states = [
            "N" => ["AM", "RR", "AP", "PA", "TO", "RO", "AC"],
            "NE" => ["MA", "PI", "CE", "RN", "PE", "PB", "SE", "AL", "BA"],
            "CO" => ["MT", "MS", "GO", "DF"],
            "SE" => ["SP", "RJ", "ES", "MG"],
            "S" => ["RS", "SC", "PR"]
        ];

        try {

            $alerts = [];
            $causes = [];
            foreach (AlertCause::getAll() as $alert) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                    ->where(
                        [
                            ['case_steps_alerta.alert_cause_id', $alert->id],
                            ['children.alert_status', 'accepted'],
                            //['children.child_status', '<>', 'cancelled']
                        ]
                    )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                    ->count();

                if ($qtd > 0) {
                    array_push($alerts, ['id' => $alert->id, 'cause' => $alert->label, 'qtd' => $qtd]);
                }
            }
            foreach (CaseCause::getAll() as $case) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_pesquisa', 'children.id', '=', 'case_steps_pesquisa.child_id')
                    ->where(
                        [
                            ['case_steps_pesquisa.case_cause_ids', 'like', "%{$case->id}%"],
                            ['children.alert_status', 'accepted'],
                            ['children.child_status', '<>', 'cancelled']
                        ]
                    )->whereIn('case_steps_pesquisa.place_uf', $states[$reg])
                    ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $case->id, 'cause' => $case->label, 'qtd' => $qtd]);
                }
            }


            $expDate = Carbon::now()->subDays(30);
            $active = Tenant::query()->whereDate('last_active_at', '>', $expDate)->whereIn('tenants.uf', $states[$reg])->count();
            $inactive = Tenant::query()->whereDate('last_active_at', '<=', $expDate)->whereIn('tenants.uf', $states[$reg])->count();
            $data = [
                'tenants' => [
                    'num_tenants' => Tenant::query()->whereIn('tenants.uf', $states[$reg])
                        ->count(),
                    'active' => $active,
                    'inactive' => $inactive,
                    'num_pending_setup' => TenantSignup::query()
                        ->join('tenants', 'tenants.id', '=', 'tenant_signups.tenant_id')
                        ->whereIn('tenants.uf', $states[$reg])
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),

                    /*'num_signups' => Tenant::query()->whereIn('tenants.uf', $states[$reg])
                        ->count(),

                    'num_pending_setup' => Tenant::query()->whereIn('tenants.uf', $states[$reg])
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),*/
                ],
                'alerts' => [

                    '_approved' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                //['children.child_status', '<>', 'cancelled']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                        ->count(),

                    '_pending' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'pending'],
                                //['children.child_status', '<>', 'cancelled']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                        ->count(),

                    '_rejected' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['children.alert_status', 'rejected']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                        ->count(),
                ],

                'cases' => [

                    '_enrollment' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['children.child_status', 'in_observation']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                        ->orWhere(
                            [
                                ['children.child_status', 'in_school']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])
                        ->count(),

                    '_in_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                    '_transferred' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'transferred'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                    '_in_observation' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_observation'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                    '_out_of_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                //['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'out_of_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                    '_cancelled' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'cancelled'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                    '_interrupted' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'interrupted'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->whereIn('case_steps_alerta.place_uf', $states[$reg])->count(),
                ],

                'causes_alerts' => $alerts,
                'causes_cases' => $causes

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function report_uf()
    {

        $uf = request('uf');

        try {

            $alerts = [];
            $causes = [];

            foreach (AlertCause::getAll() as $alert) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                    ->where(
                        [
                            ['case_steps_alerta.place_uf', $uf],
                            ['case_steps_alerta.alert_cause_id', $alert->id],
                            ['children.alert_status', 'accepted'],
                            ['children.child_status', '<>', 'cancelled']
                        ]
                    )
                    ->count();

                if ($qtd > 0) {
                    array_push($alerts, ['id' => $alert->id, 'cause' => $alert->label, 'qtd' => $qtd]);
                }
            }
            foreach (CaseCause::getAll() as $case) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_pesquisa', 'children.id', '=', 'case_steps_pesquisa.child_id')
                    ->where(
                        [
                            ['case_steps_pesquisa.place_uf', $uf],
                            ['case_steps_pesquisa.case_cause_ids', 'like', "%{$case->id}%"],
                            ['children.alert_status', 'accepted'],
                            ['children.child_status', '<>', 'cancelled']
                        ]
                    )
                    ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $case->id, 'cause' => $case->label, 'qtd' => $qtd]);
                }
            }


            $expDate = Carbon::now()->subDays(30);
            $active = Tenant::query()->whereDate('last_active_at', '>', $expDate)->where('tenants.uf', $uf)->count();
            $inactive = Tenant::query()->whereDate('last_active_at', '<=', $expDate)->where('tenants.uf', $uf)->count();
            $data = [
                'tenants' => [
                    'num_tenants' => Tenant::query()->where('tenants.uf', $uf)
                        ->count(),
                    'active' => $active,
                    'inactive' => $inactive,
                    'num_pending_setup' => Tenant::query()
                        ->join('tenants', 'tenants.id', '=', 'tenant_signups.tenant_id')
                        ->where('tenants.uf', $uf)
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),
                    /*'num_signups' => Tenant::query()->where('tenants.uf', $uf)
                        ->count(),

                    'num_pending_setup' => Tenant::query()->where('tenants.uf', $uf)
                        ->where('is_approved', '=', 1)
                        ->where('is_provisioned', '=', 0)
                        ->count(),*/
                ],
                'alerts' => [

                    '_approved' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', '<>', 'cancelled']
                            ]
                        )
                        ->count(),

                    '_pending' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'pending'],
                                ['children.child_status', '<>', 'cancelled']
                            ]
                        )
                        ->count(),

                    '_rejected' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['children.alert_status', 'rejected']
                            ]
                        )
                        ->count(),
                ],

                'cases' => [

                    '_enrollment' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['children.child_status', 'in_observation']
                            ]
                        )
                        ->orWhere(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['children.child_status', 'in_school']
                            ]
                        )
                        ->count(),

                    '_in_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_transferred' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'transferred'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_in_observation' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'in_observation'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_out_of_school' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                //['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'out_of_school'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_cancelled' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'cancelled'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                    '_interrupted' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.child_status', 'interrupted'],
                                ['children.alert_status', 'accepted']
                            ]
                        )->count(),
                ],

                'causes_alerts' => $alerts,
                'causes_cases' => $causes

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function report_city()
    {
        $city = request('city');
        $uf = request('uf');
        $ibge_id = request('ibge_id');

        if ($city != null) {
            $tenant = Tenant::where([['name', '=', $uf . ' / ' . $city], ['is_active', '=', 1]])->withTrashed()->first();
        }

        if ($ibge_id != null) {
            $city_ibge = City::where('ibge_city_id', '=', intval($ibge_id))->first();
            $tenant = Tenant::where([['city_id', '=', $city_ibge->id], ['is_active', '=', 1]])->withTrashed()->first();
        }

        $tenantId = $tenant ? $tenant->id : 0;

        if ($tenant != null) {

            $created = $tenant->created_at->format('d/m/Y');
            $now = Carbon::now();
            $last_active_at = $tenant->last_active_at;
            $lastTenantSignup = TenantSignup::where('tenant_id', $tenantId)->latest()->first();

            if ($now->diffInDays($last_active_at) >= 30) {
                $status = "Inativo";
            } else {
                $status = "Ativo";
            }

            $data_city = $data_city = ['created' => $created, 'status' => $status, 'last_tenant_signup' => $lastTenantSignup ? $lastTenantSignup->created_at->format('d/m/Y') : null];
        } else {
            $data_city = null;
            $data = [
                'alerts' => [],
                'cases' => [],
                'causes' => [],
                'data_city' => $data_city
            ];
            return response()->json(['status' => 'ok', '_data' => $data]);
        }

        try {

            $alerts = [];
            $causes = [];
            foreach (AlertCause::getAll() as $alert) {

                $qtd =
                    \DB::table('children')
                    ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                    ->where(
                        [
                            ['case_steps_alerta.tenant_id', $tenantId],
                            ['case_steps_alerta.alert_cause_id', $alert->id],
                            ['children.alert_status', 'accepted']

                        ]
                    )
                    ->count();

                if ($qtd > 0) {
                    array_push($alerts, ['id' => $alert->id, 'cause' => $alert->label, 'qtd' => $qtd]);
                }
            }

            foreach (CaseCause::getAll() as $case) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                    ->join('case_steps_pesquisa', 'children.id', '=', 'case_steps_pesquisa.child_id')
                    ->where(
                        [
                            ['case_steps_pesquisa.tenant_id', $tenantId],
                            ['case_steps_pesquisa.alert_cause_id', $alert->id],
                            ['children.alert_status', 'accepted']
                        ]
                    )
                    ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $case->id, 'cause' => $case->label, 'qtd' => $qtd]);
                }
            }

            $data = [

                'alerts' => [
                    '_approved' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                            ]
                        )
                        ->count(),

                    '_pending' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'pending'],
                            ]
                        )
                        ->count(),

                    '_rejected' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['children.alert_status', 'rejected']
                            ]
                        )
                        ->count(),
                ],

                'cases' => [

                    '_out_of_school' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'children.id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children_cases.case_status', 'in_progress'],
                                ['children.child_status', '=', 'out_of_school']
                            ]
                        )->count(),

                    '_cancelled' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'children.id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'cancelled'],
                                ['children_cases.case_status', 'cancelled']
                            ]
                        )->count(),

                    '_in_school' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'in_school'],
                                ['children_cases.case_status', 'completed']
                            ]
                        )->count(),
                    '_transferred' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'transferred'],
                                ['children_cases.case_status', 'completed']
                            ]
                        )->count(),

                    '_interrupted' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'interrupted'],
                                ['children_cases.case_status', 'interrupted']
                            ]
                        )->count(),

                    '_transferred' =>

                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'transferred'],
                                ['children_cases.case_status', 'transferred']
                            ]
                        )->count(),

                    '_in_observation' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'in_observation'],
                                ['children_cases.case_status', 'in_progress']
                            ]
                        )->count(),
                    '_out_of_school' =>

                    \DB::table('case_steps_alerta')
                        ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                // ['case_steps_alerta.alert_status', 'accepted'],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', 'out_of_school'],
                                ['children_cases.case_status', 'in_progress']
                            ]
                        )->count(),

                ],

                'causes_alerts' => $alerts,

                'causes_cases' => $causes,

                'data_city' => $data_city

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function list_cities()
    {
        try {
            $uf = request('uf');
            //$collection_cities = Tenant::query()->where('uf', '=', $uf)->orderBy('name')->get(['name']);
            $collection_cities = City::query()->where('uf', '=', $uf)->orderBy('name')->get(['name']);
            $cities = [];
            foreach ($collection_cities as $city) {
                array_push($cities, $city->name);
            }
            $data = [
                'cities_in_tenants' => $cities,
            ];

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function reach()
    {
        try {
            $data = new \stdClass();

            $data->municipios = TenantSignup::query()->count();

            $data->estados = StateSignup::query()->count();

            return response()->json(['status' => 'ok', '_data' => $data]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }
}
