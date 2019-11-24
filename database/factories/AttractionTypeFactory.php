<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttractionType;
use Faker\Generator as Faker;

$factory->define(AttractionType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'description' => $faker->text()
    ];
});
