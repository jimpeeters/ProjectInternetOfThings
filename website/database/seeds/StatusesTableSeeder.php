<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_statuses')->delete();

		$statuses = array(

		array(
				'name' => 'Afwachtend',
			),
		array(
				'name' => 'Bediend',
			)

		);

		DB::table('client_statuses')->insert($statuses);
    }
}
