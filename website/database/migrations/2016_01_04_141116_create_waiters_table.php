<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaitersTable extends Migration {

	public function up()
	{
		Schema::create('waiters', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('naam', 255);
			$table->string('email', 255);
		});
	}

	public function down()
	{
		Schema::drop('waiters');
	}
}