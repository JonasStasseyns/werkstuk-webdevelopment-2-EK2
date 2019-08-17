<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Donation::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0, 100),
        'project_id' => $faker->numberBetween(0, 100),
        'credits' => $faker->numberBetween(20, 100),
    ];
});
