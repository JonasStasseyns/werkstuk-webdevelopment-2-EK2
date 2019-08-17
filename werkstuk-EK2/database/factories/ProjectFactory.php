<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $categories = ['arts', 'tech', 'film', 'crafts', 'games', 'music', 'publishing'];
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(5, true),
        'content' => nl2br($faker->paragraphs(rand(5, 10), true)),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user' => $faker->numberBetween(0, 1000),
        'current' => $faker->numberBetween(0, 1000),
        'target' => $faker->numberBetween(0, 1000),
        'category' => $categories[rand(0, count($categories)-1)],
    ];
});