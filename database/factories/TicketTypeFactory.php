<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TicketType;
use Faker\Generator as Faker;

$factory->define(TicketType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'description' => $faker->text()
    ];
});
