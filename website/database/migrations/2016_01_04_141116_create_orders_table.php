<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('FK_client_id')->unsigned();
			$table->datetime('starttime');
			$table->datetime('endtime');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}