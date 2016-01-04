<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreasTable extends Migration {

	public function up()
	{
		Schema::create('areas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('naam', 255);
		});
	}

	public function down()
	{
		Schema::drop('areas');
	}
}