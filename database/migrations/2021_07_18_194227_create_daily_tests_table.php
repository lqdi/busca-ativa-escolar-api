<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_tests', function (Blueprint $table) {
            $table->id();
            $table->string("aprovacao_adesao");
            $table->date("data_relatorio");
            $table->string("uf", 2);
            $table->string("municipio");

            $table->integer("alertas_pendentes");
            $table->integer("alertas_aceitos");
            $table->integer("alertas_rejeitados");
            $table->integer("casos_andamento_fora_da_escola");
            $table->integer("casos_andamentto_dentro_da_escola");
            $table->integer("casos_concluidos");
            $table->integer("casos_cancelados");
            $table->integer("casos_interrompidos");
            $table->integer("casos_transferidos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_tests');
    }
}
