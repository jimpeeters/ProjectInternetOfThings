<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Carbon\Carbon;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('amount');
			$table->timestamps();
			$table->integer('FK_client_status_id')->unsigned();
			$table->integer('FK_table_id')->unsigned();
			$table->datetime('entertime')->default(Carbon::now());
			$table->datetime('leavetime')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}