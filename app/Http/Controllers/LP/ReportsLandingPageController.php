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
use BuscaAtivaEscolar\Tenant;
use Carbon\Carbon;

class ReportsLandingPageController extends BaseController
{
    public function report_country()
    {

        try {

            $causes = [];

            $statesInTenants = ['AC', 'AL', 'AM', 'AP', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MG', 'MS', 'MT', 'PA', 'PB', 'PE', 'PI', 'PR', 'RJ', 'RN', 'RO', 'RR', 'RS', 'SC', 'SE', 'SP', 'TO'];

            $data = [

                'states_in_tenants' => $statesInTenants,

                'alerts' => [],

                'cases' => [],

                'causes' => $causes

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

            $causes = [];

            foreach (AlertCause::getAll() as $cause) {

                //alerta pemanece com status de aceito se caso for cancelado!
                $qtd =
                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.place_uf', $uf],
                                ['case_steps_alerta.alert_cause_id', $cause->id],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', '<>', 'cancelled']
                            ]
                        )
                        ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $cause->id, 'cause' => $cause->label, 'qtd' => $qtd]);
                }
            }

            $data = [

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
                    '_in_progress' =>

                        \DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where(
                                [
                                    ['case_steps_alerta.place_uf', $uf],
                                    ['case_steps_alerta.alert_status', 'accepted'],
                                    ['children.child_status', 'in_progress'],
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

                'causes' => $causes

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
        $tenant = Tenant::where([['name', '=', $uf . ' / ' . $city], ['is_active', '=', 1]])->first();
        $tenantId = $tenant ? $tenant->id : 0;
        if ($tenant != null) {
            $created = $tenant->created_at->format('d/m/Y');
            $now = Carbon::now();
            $last_active_at = $tenant->last_active_at;

            if ($now->diffInDays($last_active_at) >= 30) {
                $status = "Inativo";
            } else {
                $status = "Ativo";
            }

            $data_city = $data_city = ['created' => $created, 'status' => $status];

        } else {
            $data_city = null;
        }

        try {

            $causes = [];

            foreach (AlertCause::getAll() as $cause) {

                $qtd =
                    \DB::table('children')
                        ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                        ->where(
                            [
                                ['case_steps_alerta.tenant_id', $tenantId],
                                ['case_steps_alerta.alert_cause_id', $cause->id],
                                ['children.alert_status', 'accepted'],
                                ['children.child_status', '<>', 'cancelled']
                            ]
                        )
                        ->count();

                if ($qtd > 0) {
                    array_push($causes, ['id' => $cause->id, 'cause' => $cause->label, 'qtd' => $qtd]);
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

//                    '_enrollment' =>
//
//                        \DB::table('case_steps_alerta')
//                            ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
//                            ->join('children_cases', 'children_cases.child_id', '=', 'case_steps_alerta.child_id')
//                            ->where(
//                                [
//                                    ['case_steps_alerta.tenant_id', $tenantId],
//                                    ['case_steps_alerta.alert_status', 'accepted'],
//                                    ['children.alert_status', 'accepted'],
//                                    ['children.child_status', 'in_school'],
//                                    ['children.child_status', '<>', 'cancelled'],
//                                    ['children.child_status', '<>', 'interrupted']
//                                ]
//                            )->orWhere(
//                                [
//                                    ['case_steps_alerta.tenant_id', $tenantId],
//                                    ['case_steps_alerta.alert_status', 'accepted'],
//                                    ['children.alert_status', 'accepted'],
//                                    ['children.child_status', 'in_observation'],
//                                    ['children.child_status', '<>', 'cancelled'],
//                                    ['children.child_status', '<>', 'interrupted']
//                                ]
//                            )->count(),

//                    '_in_progress' =>
//
//                        \DB::table('case_steps_alerta')
//                            ->join('children', 'children.id', '=', 'case_steps_alerta.child_id')
//                            ->join('children_cases', 'children_cases.child_id', '=', 'children.id')
//                            ->where(
//                                [
//                                    ['case_steps_alerta.tenant_id', $tenantId],
//                                    ['case_steps_alerta.alert_status', 'accepted'],
//                                    ['children.alert_status', 'accepted'],
//                                    ['children_cases.case_status', 'in_progress'],
//                                    ['children.child_status', '<>', 'in_school'],
//                                    ['children.child_status', '<>', 'cancelled'],
//                                    ['children.child_status', '<>', 'interrupted']
//                                ]
//                            )->count(),

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

                ],

                'causes' => $causes,

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

}