<?php

use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->delete();

		$tables = array(

		array(
				'number' => '1',
				'FK_area_id' => '1',
				'FK_location_id' => '1',

			),


		);

		DB::table('tables')->insert($tables);
    }
}
