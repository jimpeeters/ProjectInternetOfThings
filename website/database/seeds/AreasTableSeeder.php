<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();

		$areas = array(

		array(
				'name' => 'Zaal 1'
			),

		array(
				'name' => 'Zaal 2'
			),

		array(
				'name' => 'Zaal 3'
			),


		);

		DB::table('areas')->insert($areas);
    }
}
