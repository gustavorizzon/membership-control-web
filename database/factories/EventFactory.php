<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'description' => $faker->text(),
        'is_public' => $faker->boolean(),
        'is_cancelled' => $faker->boolean(),
        'attraction_id' => $faker->randomElement(App\Attraction::all()->pluck('id')->toArray()),
        'reservation_id' => $faker->unique()->randomElement(App\Reservation::all()->pluck('id')->toArray())
    ];
});
