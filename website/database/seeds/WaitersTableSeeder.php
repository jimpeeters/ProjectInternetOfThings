<?php

use Illuminate\Database\Seeder;

class WaitersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waiters')->delete();

		$waiters = array(

		array(
				'name' => 'Jeroen',
				'email' => 'jeroen_vdb1@hotmail.com',
			),

		array(
				'name' => 'Jim',
				'email' => 'jempipeeters@hotmail.com',
			),

		);

		DB::table('waiters')->insert($waiters);
    }
}
