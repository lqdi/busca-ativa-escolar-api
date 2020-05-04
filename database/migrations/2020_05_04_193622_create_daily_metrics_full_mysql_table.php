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
            $table->bigInteger('id');
            $table->char('tenant_id', 36);
            $table->char('child_id', 36);
            $table->string('child_status', 100);
            $table->date('date');
            $table->string('case_status', 100);
            $table->string('step_slug', 100);
            $table->char('city_id', 36);
            $table->char('uf', 2);
            $table->string('cancel_reason', 100);
            $table->string('reinsertion_grade', 100);
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
