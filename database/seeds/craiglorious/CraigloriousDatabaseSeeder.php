<?php

use Illuminate\Database\Seeder;


class CraigloriousDatabaseSeeder extends Seeder {
 	public function run()
    {
		$this->call('SystemsTableSeeder');
		

	}
}