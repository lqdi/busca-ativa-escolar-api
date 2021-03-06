<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTseRenda extends Migration
{
    protected $connection = 'trajetorias';

    public function up()
    {
        Schema::connection('trajetorias')->create('tse_renda', function (Blueprint $table) {

            $table->integer('id',11);
            $table->string('name',100);

        });
    }

    public function down()
    {
        Schema::dropIfExists('tse_renda');
    }
}