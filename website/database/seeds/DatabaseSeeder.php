<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('AreasTableSeeder');
		$this->call('TablesTableSeeder');
		$this->call('StatusesTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('WaitersTableSeeder');

        Model::reguard();
	}
}