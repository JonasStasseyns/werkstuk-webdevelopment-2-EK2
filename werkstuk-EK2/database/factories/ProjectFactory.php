<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(rand(2, 5)),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user' => $faker->numberBetween(0, 1000),
    ];
});