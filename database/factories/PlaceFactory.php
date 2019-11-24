<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Place;
use Faker\Generator as Faker;

$factory->define(Place::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->streetName,
        'description' => $faker->text(),
        'capacity' => $faker->numberBetween(0, 1000000),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'place_type_id' => $faker->randomElement(App\PlaceType::all()->pluck('id')->toArray())
    ];
});
