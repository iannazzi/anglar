<?php

use App\Models\Tenant\Address;
use App\Models\Tenant\Contact;

$factory->defineAs(App\Models\Tenant\Vendor::class, 'expense', function (Faker\Generator $faker) {
	return [
		'store_id' => 1,
		'contact_id' => factory(Contact::class)->create()->id,
		'billing_address_id' => factory(Address::class)->create()->id,
		'shipping_address_id' => factory(Address::class)->create()->id,
		'type' => 'Expense',
		'name' => $faker->company,
		'account_number' => $faker->creditCardNumber(),
		'active' => 1
    ];
});
$factory->defineAs(App\Models\Tenant\Vendor::class, 'inventory', function (Faker\Generator $faker) {
	return [
		'store_id' => 0,
		'contact_id' => factory(Contact::class)->create()->id,
		'billing_address_id' => factory(Address::class)->create()->id,
		'shipping_address_id' => factory(Address::class)->create()->id,
		'type' => 'Inventory',
		'name' => $faker->company,
		'account_number' => $faker->creditCardNumber(),
		'active' => 1
	];
});

