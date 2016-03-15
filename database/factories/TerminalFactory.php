<?php

$factory->define(App\Models\Tenant\Terminal::class, function (Faker\Generator $faker) {
    return [
        'store_id' => $faker->name,
		'status' => $faker->name,
		'mac_address' => $faker->name,
		'ip_address' => $faker->name,
		'cash_drawer' => $faker->name,
		'printer_id' => $faker->name,
		'default_cash_account_id' => $faker->name,
		'default_check_account_id' => $faker->name,
		'default_gift_card_account_id' => $faker->name,
		'default_store_credit_account_id' => $faker->name,
		'default_prepay_account_id' => $faker->name,
		'default_non_payment_account_id' => $faker->name,
		'payment_gateway_id' => $faker->name,
		'refund_checking_account_id' => $faker->name,
		'max_cash_refund' => $faker->name,
		'location' => $faker->name,
		'comments' => $faker->name,
		'terminal_name' => $faker->name,
		'terminal_description' => $faker->name,
		'cookie_name' => $faker->name,
		'active' => $faker->name
    ];
});