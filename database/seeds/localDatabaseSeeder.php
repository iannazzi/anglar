<?php

use App\Classes\TenantSystem\TenantSystemBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Main\System;

class localDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //issue this commnad:
    // php artisan db:seed --class=localDatabaseSeeder
    public function run()
    {
		Model::unguard();

    	$this->call('MainDatabaseSeeder');

        $systems = System::all();
        foreach ($systems as $system)
        {

            echo 'LocalDatabase Seeder: Create Database called ' .$system->dbc() . ' using connection default' . PHP_EOL;
            echo $system->company .PHP_EOL;

            $tenantSystemBuilder = new TenantSystemBuilder($system);
            $tenantSystemBuilder->deleteSystem();
            $tenantSystemBuilder->setupTenantSystem();
            $system->createTenantConnection();

        }
        $this->call('TenantDatabaseSeeder');

        Model::reguard();



    }
}
