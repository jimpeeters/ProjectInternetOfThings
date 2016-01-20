<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningWaiterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning_waiter', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('FK_planning_id')->unsigned();
            $table->foreign('FK_planning_id')->references('id')->on('planning');

            $table->integer('FK_waiter_id')->unsigned();
            $table->foreign('FK_waiter_id')->references('id')->on('waiters');
            
            $table->datetime('day');
            $table->integer('start_hour');
            $table->integer('end_hour');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planning_waiter');
    }
}
