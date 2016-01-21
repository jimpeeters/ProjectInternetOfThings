<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->delete();

		$clients = array(

		array(
				'FK_client_status_id' => '1',
				'FK_table_id' => '1',
				'entertime' => Carbon::now(),
				'leavetime' => null,
			),

		);

		DB::table('clients')->insert($clients);
    }
}
