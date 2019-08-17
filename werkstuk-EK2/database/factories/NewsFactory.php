<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\News;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'text' => nl2br($faker->paragraphs(rand(5, 10), true)),
        'image' => $faker->imageUrl($width = 1200, $height = 480),
    ];
});
