<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlaceType;
use Faker\Generator as Faker;

$factory->define(PlaceType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'description' => $faker->text()
    ];
});
