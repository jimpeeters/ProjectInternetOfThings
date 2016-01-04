<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaiterAreaTable extends Migration {

	public function up()
	{
		Schema::create('waiter_area', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('FK_waiter_id')->unsigned();
			$table->integer('FK_area_id')->unsigned();
			$table->datetime('start_time');
			$table->datetime('end_time');
		});
	}

	public function down()
	{
		Schema::drop('waiter_area');
	}
}