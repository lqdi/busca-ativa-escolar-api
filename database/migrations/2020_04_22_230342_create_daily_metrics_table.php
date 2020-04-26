<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_metrics', function (Blueprint $table) {
            $table->char('tenant_id', 36);
            $table->date('date');
            $table->char('region', 15);
            $table->char('state', 2);
            $table->string('city');
            $table->integer('count');
            $table->json('data')->nullable();
        });

//        Schema::create('daily_metrics', function (Blueprint $table) {
//            $table->char('tenant_id', 36);
//            $table->json('data');
//        });

//        Schema::create('daily_metrics', function (Blueprint $table) {
//            $table->date('date');
//            $table->json('data');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('daily_metrics');
    }
}
