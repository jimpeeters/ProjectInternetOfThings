<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablesTable extends Migration {

	public function up()
	{
		Schema::create('tables', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('number');
			$table->integer('FK_area_id')->unsigned();
			$table->integer('FK_location_id')->unsigned();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tables');
	}
}