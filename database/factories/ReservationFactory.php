<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'from' => $faker->dateTime(),
        'to' => $faker->dateTime(),
        'place_id' => $faker->randomElement(App\Place::all()->pluck('id')->toArray()),
        'reserved_to' => $faker->randomElement(App\Associate::where('is_active', true)->pluck('id')->toArray()),
        'reserved_by' => $faker->randomElement(App\User::all()->pluck('id')->toArray())
    ];
});
