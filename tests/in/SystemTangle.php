<?php

use App\Classes\TenantSystem\TenantSystemBuilder;
use App\Models\Main\System;
use App\Models\Tenant\Product;
use App\Models\Tenant\ProductAttribute;
use App\Models\Tenant\ProductOption;
use App\Models\Tenant\ProductSku;
use IannazziTestLibrary\Tests\ApiTester;

class ProductTest extends ApiTester
{
    /** @test */
    function a_product_can_be_made_on_more_than_one_system()
    {
        $this->systemReset();
        $system1 = factory(System::class)->create();
        $tenantSystemBuilder = new TenantSystemBuilder($system1);
        $tenantSystemBuilder->deleteSystem();
        $tenantSystemBuilder->setupTenantSystem();
        $system1->createTenantConnection();
        factory(Product::class, 3)->create();

        $system2 = factory(System::class)->create();
        $tenantSystemBuilder = new TenantSystemBuilder($system2);
        $tenantSystemBuilder->deleteSystem();
        $tenantSystemBuilder->setupTenantSystem();
        $system2->createTenantConnection();
        factory(Product::class, 3)->create();


        $system1->setDBC();
        factory(Product::class, 6)->create();

        $this->assertEquals(Product::count(), '9');

        $system2->setDBC();
        $this->assertEquals(Product::count(), '3');


    }
}