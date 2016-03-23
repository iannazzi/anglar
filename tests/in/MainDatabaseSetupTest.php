<?php


use App\Classes\Database\DatabaseCsvLoader;
use App\Models\Tenant\Address;
use App\Models\Tenant\Company;
use App\Models\Tenant\Store;
use Iannazzi\Generators\DatabaseImporter\DatabaseCSVCreator;
use Iannazzi\Generators\DatabaseImporter\DatabaseDestroyer;
use IannazziTestLibrary\Tests\ApiTester;
use App\Classes\TenantSystem\TenantSystemBuilder;
use App\Models\Main\System;

class MainSetupSetupTest extends ApiTester
{

    /** @test */
    function init_main_database()
    {
       //DatabaseCSVCreator::createStartupSCVFile('POS', 'pos_tax_jurisdictions');
        $this->writeMethod(__METHOD__);
        self::loadMainDatabase();
    }

    /*
     * do not add any more tests here as phpunit calls them randomly...
     * and then you will not have a system....
     */


    public static function loadMainDatabase()
    {
        DatabaseDestroyer::dropAllTables('main');
        echo 'Running Main Migrations On Connection main'  .PHP_EOL;
        Artisan::call('migrate', [
            '--path' => "database/migrations/main",
            '--database' => 'main',
        ]);
        echo 'Migrations Complete' .PHP_EOL;
    }
}