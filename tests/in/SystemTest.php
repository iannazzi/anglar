<?php

use App\Classes\TenantSystem\TenantSystemBuilder;
use App\Models\Craiglorious\System;
use IannazziTestLibrary\Tests\ApiTester;

class SystemTest extends ApiTester
{


    /** @test */
    function a_system_can_be_set_up()
    {
        $this->systemReset();
    }
    /** @test */
    function a_system_has_a_name()
    {
        $embrasse = factory(System::class,'embrasse-moi')->create();

        factory(System::class, 3)->create();

        $this->assertEquals('Embrasse-Moi', $embrasse->company);

    }
    /** @test */
    function a_system_can_be_migrated()
    {
        $systems = System::all();
        foreach ($systems as $system)
        {
            echo 'Create Database called ' .$system->dbc() . ' using connection ' . $system->dbc() . PHP_EOL;
            echo $system->company .PHP_EOL;
            $tenantSystemBuilder = new TenantSystemBuilder($system);
            echo 'Deleting System in case it is there....' .PHP_EOL;
            $tenantSystemBuilder->deleteSystem();
            $tenantSystemBuilder->setupTenantSystem();
        }
    }
}