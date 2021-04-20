<?php

namespace BuscaAtivaEscolar\Http\Controllers\LP;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class ReportsPnadController extends BaseController
{
    public function pnad_capital()
    {
        $capital = request('capital');

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
}
