<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ReservationGuest;
use Faker\Generator as Faker;

$factory->define(ReservationGuest::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name(),
        'document' => $faker->numerify('##########'),
        'reservation_id' => $faker->randomElement(App\Reservation::all()->pluck('id')->toArray())
    ];
});
