<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attraction;
use Faker\Generator as Faker;

$factory->define(Attraction::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'description' => $faker->text(),
        'attraction_type_id' => $faker->randomElement(App\AttractionType::all()->pluck('id')->toArray()),
    ];
});
