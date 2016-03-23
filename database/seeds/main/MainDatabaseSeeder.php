<?php

use Illuminate\Database\Seeder;


class MainDatabaseSeeder extends Seeder {
 	public function run()
    {
		$this->call('SystemsTableSeeder');
		

	}
}