<?php

$factory->define(App\Models\Main\System::class, function (Faker\Generator $faker) {
    return  [
        'company' => $faker->company,
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => $faker->email,
        'password' => bcrypt('password'),
    ];
});
$factory->defineAs(App\Models\Main\System::class, 'embrasse-moi', function ($faker) {
    return [
        'name' => 'Craig Iannazzi',
        'company' => 'Embrasse-Moi',
        'email' => 'ci@embrasse-moi.com',
        'password' => bcrypt('iluv2tow'),
        'phone' => '585-383-1170',
        'address' => '1 N Main Street, Pittsford NY, 14534',
    ];
});