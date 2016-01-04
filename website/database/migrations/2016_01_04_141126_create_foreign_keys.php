<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tables', function(Blueprint $table) {
			$table->foreign('FK_area_id')->references('id')->on('areas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('FK_client_status_id')->references('id')->on('client_statuses')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('FK_table_id')->references('id')->on('tables')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('FK_client_id')->references('id')->on('tables')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('waiter_area', function(Blueprint $table) {
			$table->foreign('FK_waiter_id')->references('id')->on('waiters')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('waiter_area', function(Blueprint $table) {
			$table->foreign('FK_area_id')->references('id')->on('areas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('tables', function(Blueprint $table) {
			$table->dropForeign('tables_FK_area_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_FK_client_status_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_FK_table_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_FK_client_id_foreign');
		});
		Schema::table('waiter_area', function(Blueprint $table) {
			$table->dropForeign('waiter_area_FK_waiter_id_foreign');
		});
		Schema::table('waiter_area', function(Blueprint $table) {
			$table->dropForeign('waiter_area_FK_area_id_foreign');
		});
	}
}