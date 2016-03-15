
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//factories dont seem to make sense for tables that have
//foreign keys

$factory->define(App\Models\Craiglorious\Todo::class, function (Faker\Generator $faker) {
    return [
        'task' => $faker->company,
        'completed' => $faker->boolean(),
    ];
});




