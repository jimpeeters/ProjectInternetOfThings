<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientStatusesTable extends Migration {

	public function up()
	{
		Schema::create('client_statuses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('naam', 255);
		});
	}

	public function down()
	{
		Schema::drop('client_statuses');
	}
}