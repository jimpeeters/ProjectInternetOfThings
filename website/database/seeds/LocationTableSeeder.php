<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();

		$locations = array(

				
			array('number' => '1'),
			array('number' => '2'),
			array('number' => '3'),
			array('number' => '4'),
			array('number' => '5'),
			array('number' => '6'),
			array('number' => '7'),
			array('number' => '8'),
			array('number' => '9'),
			array('number' => '10'),
			array('number' => '11'),
			array('number' => '12'),
			array('number' => '13'),
			array('number' => '14'),
			array('number' => '15'),
			array('number' => '16'),
			array('number' => '17'),
			array('number' => '18'),
			array('number' => '19'),
			array('number' => '20'),
			array('number' => '21'),
			array('number' => '22'),
			array('number' => '23'),
			array('number' => '24'),
			array('number' => '25'),
			array('number' => '26'),
			array('number' => '27'),
			array('number' => '28'),
			array('number' => '29'),
			array('number' => '30'),
			array('number' => '31'),
			array('number' => '32'),
			array('number' => '33'),
			array('number' => '34'),
			array('number' => '35'),
			array('number' => '36'),
			array('number' => '37'),
			array('number' => '38'),
			array('number' => '39'),
			array('number' => '40'),
			array('number' => '41'),
			array('number' => '42'),
			array('number' => '43'),
			array('number' => '44'),
			array('number' => '45'),
			array('number' => '46'),
			array('number' => '47'),
			array('number' => '48'),
			array('number' => '49'),
			array('number' => '50'),
			array('number' => '51'),
			array('number' => '52'),
			array('number' => '53'),
			array('number' => '54'),
			array('number' => '55'),
			array('number' => '56'),
			array('number' => '57'),
			array('number' => '58'),
			array('number' => '59'),
			array('number' => '60'),
			array('number' => '61'),
			array('number' => '62'),
			array('number' => '63'),
			array('number' => '64'),
			array('number' => '65'),
			array('number' => '66'),
			array('number' => '67'),
			array('number' => '68'),
			array('number' => '69'),
			array('number' => '70'),
			array('number' => '71'),
			array('number' => '72'),
			array('number' => '73'),
			array('number' => '74'),
			array('number' => '75'),
			array('number' => '76'),
			array('number' => '77'),
			array('number' => '78'),
			array('number' => '79'),
			array('number' => '80'),
			array('number' => '81'),
			array('number' => '82'),
			array('number' => '83'),
			array('number' => '84'),
		);

		DB::table('locations')->insert($locations);
    }
}
