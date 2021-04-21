<?php

namespace BuscaAtivaEscolar\Http\Controllers\LP;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class ReportsPnadController extends BaseController
{
    public function pnad_capital()
    {
        $capital = request('capital');
        $capitais = [
            2800308, 1501402, 3106200, 1400100, 5300108,
            5002704, 5103403, 4106902, 4205407, 2304400,
            5208707, 2507507, 1600303, 2704302, 1302603,
            2408102, 1721000, 4314902, 1100205, 2611606,
            1200401, 3304557, 2927408, 2111300, 3550308,
            2211001, 3205309
        ];
        if (in_array($capital, $capitais) == false) {
            return response()->json(['status' => 'ok', '_data' => null]);
        }
        try {

            $data = DB::connection('trajetorias')->table('pnad')->where('id_municipio', $capital)->get();
            $resultado = json_decode($data, true);
            $dados = [
                "_urban" => [],
                "_rural" => [],
            ];
            $index = 0;
            $rindex = 1;
            $ages = ["", "_0_to_3", "_4_to_5", "_6_to_10", "_11_to_14", "_15_to_17"];
            for ($i = 1; $i < 6; $i++) {
                $urban = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 1 and $var["id_faixa_etaria"] == $i);
                });
                $rural = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 2 and $var["id_faixa_etaria"] == $i);
                });

                $dados["_urban"][$ages[$i]] = $urban[$index];
                $dados["_rural"][$ages[$i]] = $rural[$rindex];
                $index += 2;
                $rindex += 2;
            }

            return response()->json(['status' => 'ok', '_data' => $dados]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function pnad_regiao()
    {
        $reg = request('reg');

        try {

            $data = DB::connection('trajetorias')->table('pnad')->select(
                'id_localizacao',
                'id_faixa_etaria',
                DB::raw('SUM(value_masc) as total_masc'),
                DB::raw('SUM(value_femn) as total_femn'),
                DB::raw('SUM(value_ba) as total_ba'),
                DB::raw('SUM(value_pni) as total_pni'),
                DB::raw('SUM(value_sim) as total_sim'),
                DB::raw('SUM(value_nao) as total_nao'),
                DB::raw('SUM(value_pb) as total_pb'),
                DB::raw('SUM(value_int) as total_int'),
                DB::raw('SUM(value_rc) as total_rc'),
                DB::raw('SUM(total) as total'),
            )->where('id_regiao', $reg)->where('id_municipio', '9999')->groupBy('id_faixa_etaria', 'id_localizacao')->get();
            $resultado = json_decode($data, true);
            $dados = [
                "_urban" => [],
                "_rural" => [],
            ];
            $index = 0;
            $rindex = 1;
            $ages = ["", "_0_to_3", "_4_to_5", "_6_to_10", "_11_to_14", "_15_to_17"];
            for ($i = 1; $i < 6; $i++) {
                $urban = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 1 and $var["id_faixa_etaria"] == $i);
                });
                $rural = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 2 and $var["id_faixa_etaria"] == $i);
                });

                $dados["_urban"][$ages[$i]] = $urban[$index];
                $dados["_rural"][$ages[$i]] = $rural[$rindex];
                $index += 2;
                $rindex += 2;
            }
            return response()->json(['status' => 'ok', '_data' => $dados]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    public function pnad_uf()
    {
        $uf = request('uf');

        try {

            $data = DB::connection('trajetorias')->table('pnad')->where('id_uf', $uf)->where('id_municipio', '9999')->get();
            $resultado = json_decode($data, true);
            $dados = [
                "_urban" => [],
                "_rural" => [],
            ];
            $index = 0;
            $rindex = 1;
            $ages = ["", "_0_to_3", "_4_to_5", "_6_to_10", "_11_to_14", "_15_to_17"];
            for ($i = 1; $i < 6; $i++) {
                $urban = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 1 and $var["id_faixa_etaria"] == $i);
                });
                $rural = array_filter($resultado, function ($var) use ($i) {
                    return ($var['id_localizacao'] == 2 and $var["id_faixa_etaria"] == $i);
                });

                $dados["_urban"][$ages[$i]] = $urban[$index];
                $dados["_rural"][$ages[$i]] = $rural[$rindex];
                $index += 2;
                $rindex += 2;
            }

            return response()->json(['status' => 'ok', '_data' => $dados]);
        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }
}
