<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyMetricsFullMysqlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_metrics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('tenant_id', 36);
            $table->char('child_id', 36);
            $table->string('child_status', 100);
            $table->date('date');
            $table->string('alert_status', 100);
            $table->string('deadline_status', 100);
            $table->string('case_status', 100)->nullable();
            $table->string('step_slug', 100)->nullable();
            $table->char('city_id', 36);
            $table->char('uf', 2);
            $table->string('cancel_reason', 100)->nullable();
            $table->string('reinsertion_grade', 100)->nullable();
        });
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
