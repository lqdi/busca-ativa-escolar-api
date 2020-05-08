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
        Schema::create('daily_metrics_consolidated', function (Blueprint $table) {
            $table->char('tenant_id', 36);
            $table->date('date');
            $table->char('region', 15);
            $table->char('state', 2);
            $table->string('city');

            $table->integer('in_observation');
            $table->integer('out_of_school');
            $table->integer('cancelled');
            $table->integer('in_school');
            $table->integer('interrupted');
            $table->integer('transferred');

            $table->integer('justified_cancelled');
            $table->boolean('selo')->default(false);
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
        Schema::drop('daily_metrics_consolidated');
    }
}
