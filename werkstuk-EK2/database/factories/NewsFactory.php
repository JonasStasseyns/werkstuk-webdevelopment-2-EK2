<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\News;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'text' => $faker->paragraphs(rand(10, 20)),
        'image' => $faker->imageUrl($width = 1200, $height = 480),
    ];
});
