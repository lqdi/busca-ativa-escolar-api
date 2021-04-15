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
            $table->integer('id_genero');
            $table->integer('id_raca');
            $table->integer('id_renda');
            $table->bigInteger('value');
            $table->foreign('id_regiao')->references('id')->on('tse_regiao');
            $table->foreign('id_uf')->references('id')->on('te_estados');
            $table->foreign('id_municipio')->references('id')->on('te_municipios');
            $table->foreign('id_localizacao')->references('id')->on('tse_localizacao');
            $table->foreign('id_faixa_etaria')->references('id')->on('tse_faixa_etaria');
            $table->foreign('id_genero')->references('id')->on('tse_genero');
            $table->foreign('id_raca')->references('id')->on('tse_cor_raca');
            $table->foreign('id_renda')->references('id')->on('tse_renda');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pnad');
    }
}