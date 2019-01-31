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
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Tenant;
use Carbon\Carbon;

class ReportsLandingPageController extends BaseController
{
    public function report_country(){

        try {

            $causes = [];

            $statesInTenants = [];

            foreach ( CaseCause::getAll() as $cause){

                $qtd = ChildCase::where(function ($query) use ($cause){
                    $query->where('alert_cause_id', '=', "{$cause->id}");
                })->whereHas('child', function ($query){
                    $query->where('alert_status', '=', 'accepted');
                })
                    ->where(function ($query){
                        $query->where('case_status', '=', ChildCase::STATUS_IN_PROGRESS)
                            ->orWhere('case_status', '=', ChildCase::STATUS_COMPLETED);
                    })->count();

                if($qtd > 0){
                    array_push($causes, ['id' => $cause->id, 'cause' => $cause->label, 'qtd' => $qtd]);
                }
            }

            //$collection_states =  \DB::table('tenants')->whereNotNull('uf')->distinct('uf')->get(['uf'])->toArray();
            $collection_states =  ['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'];

            foreach ( $collection_states as $state ){
                array_push($statesInTenants, $state);
            }

            $data = [

                'states_in_tenants' => $statesInTenants,

                'alerts' => [
                    '_approved' => Child::query()
                        ->accepted()
                        ->count(),
                    '_pending' => Child::query()
                        ->pending()
                        ->count(),
                    '_rejected' => Child::query()
                        ->rejected()
                        ->count(),
                ],

                'cases' => [
                    '_enrollment' => Child::query()
                        ->whereIn('child_status', [Child::STATUS_IN_SCHOOL, Child::STATUS_OBSERVATION])
                        ->accepted()
                        ->count(),
                    '_in_progress' => ChildCase::whereHas('child', function ($query) {
                        $query->whereIn('child_status', [Child::STATUS_OUT_OF_SCHOOL, Child::STATUS_OBSERVATION])
                            ->where('alert_status', '=', 'accepted');
                    })->where('case_status', '=', 'in_progress')->count()
                ],

                'causes' => $causes

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function report_uf(){

        $uf = request('uf');

        try {

            $causes = [];

            foreach ( CaseCause::getAll() as $cause){

                $qtd = ChildCase::where(function ($query) use ($cause){
                    $query->where('alert_cause_id', '=', "{$cause->id}");
                })
                    ->where(function ($query){
                        $query->where('case_status', '=', ChildCase::STATUS_IN_PROGRESS)
                            ->orWhere('case_status', '=', ChildCase::STATUS_COMPLETED);
                    })->whereHas('child', function ($query){
                        $query->where('alert_status', '=', 'accepted');
                    })->whereHas('tenant', function ($query) use ($uf){
                        $query->where('uf', '=', $uf);
                    })
                    ->count();

                if($qtd > 0){
                    array_push($causes, ['id' => $cause->id, 'cause' => $cause->label, 'qtd' => $qtd]);
                }
            }

            $data = [

                'alerts' => [
                    '_approved' => Child::query()
                        ->accepted()
                        ->whereHas('tenant', function ($query) use ($uf){
                            $query->where('uf', '=', $uf);
                        })
                        ->count(),
                    '_pending' => Child::query()
                        ->pending()
                        ->whereHas('tenant', function ($query) use ($uf){
                            $query->where('uf', '=', $uf);
                        })
                        ->count(),
                    '_rejected' => Child::query()
                        ->rejected()
                        ->whereHas('tenant', function ($query) use ($uf){
                            $query->where('uf', '=', $uf);
                        })
                        ->count(),
                ],

                'cases' => [
                    '_enrollment' => Child::query()
                        ->whereIn('child_status', [Child::STATUS_IN_SCHOOL, Child::STATUS_OBSERVATION])
                        ->accepted()
                        ->whereHas('tenant', function ($query) use ($uf){
                            $query->where('uf', '=', $uf);
                        })
                        ->count(),

                    '_in_progress' => ChildCase::whereHas('child', function ($query) {
                        $query->whereIn('child_status', [Child::STATUS_OUT_OF_SCHOOL, Child::STATUS_OBSERVATION])
                            ->where('alert_status', '=', 'accepted');
                    })->where('case_status', '=', 'in_progress')->whereHas('tenant', function ($query) use ($uf){
                        $query->where('uf', '=', $uf);
                    })->count()
                ],

                'causes' => $causes

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function report_city(){

        $city = request('city');
        $uf = request('uf');

        try {

            $causes = [];

            foreach ( CaseCause::getAll() as $cause){

                $qtd = ChildCase::where(function ($query) use ($cause){
                    $query->where('alert_cause_id', '=', "{$cause->id}");
                })
                    ->where(function ($query){
                        $query->where('case_status', '=', ChildCase::STATUS_IN_PROGRESS)
                            ->orWhere('case_status', '=', ChildCase::STATUS_COMPLETED);
                    })->whereHas('child', function ($query){
                        $query->where('alert_status', '=', 'accepted');
                    })->whereHas('tenant', function ($query) use ($city, $uf){
                        $query->where('name', '=', $uf.' / '.$city);
                    })
                    ->count();

                if($qtd > 0){
                    array_push($causes, ['id' => $cause->id, 'cause' => $cause->label, 'qtd' => $qtd]);
                }
            }

            $tenant = Tenant::where('name', '=',$uf.' / '.$city)->first();

            if($tenant != null){

                $created = $tenant->created_at->format('d/m/Y');
                $now = Carbon::now();
                $last_active_at = $tenant->last_active_at;

                if ( $now->diffInDays($last_active_at) >= 30 ){
                    $status = "Inativo";
                } else {
                    $status = "Ativo";
                }

                $data_city = $data_city =['created' => $created, 'status' => $status];

            }else{
                $data_city = null;
            }

            $data = [

                'alerts' => [
                    '_approved' => Child::query()
                        ->accepted()
                        ->whereHas('tenant', function ($query) use ($city, $uf){
                            $query->where('name', '=', $uf.' / '.$city);
                        })
                        ->count(),
                    '_pending' => Child::query()
                        ->pending()
                        ->whereHas('tenant', function ($query) use ($city, $uf){
                            $query->where('name', '=', $uf.' / '.$city);
                        })
                        ->count(),
                    '_rejected' => Child::query()
                        ->rejected()
                        ->whereHas('tenant', function ($query) use ($city, $uf){
                            $query->where('name', '=', $uf.' / '.$city);
                        })
                        ->count(),
                ],

                'cases' => [
                    '_enrollment' => Child::query()
                        ->whereIn('child_status', [Child::STATUS_IN_SCHOOL, Child::STATUS_OBSERVATION])
                        ->accepted()
                        ->whereHas('tenant', function ($query) use ($city, $uf){
                            $query->where('name', '=', $uf.' / '.$city);
                        })
                        ->count(),

                    '_in_progress' => ChildCase::whereHas('child', function ($query) {
                        $query->whereIn('child_status', [Child::STATUS_OUT_OF_SCHOOL, Child::STATUS_OBSERVATION])
                            ->where('alert_status', '=', 'accepted');
                    })->where('case_status', '=', 'in_progress')->whereHas('tenant', function ($query) use ($city, $uf){
                        $query->where('name', '=', $uf.' / '.$city);
                    })->count()
                ],

                'causes' => $causes,

                'data_city' => $data_city

            ];

            return response()->json(['status' => 'ok', '_data' => $data]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }

    }

    public function list_cities(){
        try {
            $uf = request('uf');
            //$collection_cities = Tenant::query()->where('uf', '=', $uf)->orderBy('name')->get(['name']);
            $collection_cities = City::query()->where('uf', '=', $uf)->orderBy('name')->get(['name']);
            $cities = [];
            foreach ($collection_cities as $city){
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