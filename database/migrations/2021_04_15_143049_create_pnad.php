<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnad extends Migration
{
    protected $connection = 'trajetorias';

    public function up()
    {
        Schema::connection('trajetorias')->create('pnad', function (Blueprint $table) {

            $table->bigIncrements('id')->autoIncrement();
            $table->integer('id_regiao');
            $table->bigInteger('id_uf',);
            $table->bigInteger('id_municipio');
            $table->integer('id_localizacao');
            $table->integer('id_faixa_etaria');
            $table->bigInteger('value_masc');
            $table->bigInteger('value_femn');
            $table->bigInteger('value_ba'); //branco e amarelos
            $table->bigInteger('value_pni'); //pardos, negros e indígenas
            $table->bigInteger('value_sim'); //frequência
            $table->bigInteger('value_nao'); //frequência.
            $table->bigInteger('value_pb'); //20% mais pobres
            $table->bigInteger('value_int'); //60% intermediário
            $table->bigInteger('value_rc'); //20% mais tico
            $table->bigInteger('total'); //valor total
            $table->foreign('id_regiao')->references('id')->on('tse_regiao');
            $table->foreign('id_uf')->references('id')->on('te_estados');
            $table->foreign('id_municipio')->references('id')->on('te_municipios');
            $table->foreign('id_localizacao')->references('id')->on('tse_localizacao');
            $table->foreign('id_faixa_etaria')->references('id')->on('tse_faixa_etaria');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pnad');
    }
}
