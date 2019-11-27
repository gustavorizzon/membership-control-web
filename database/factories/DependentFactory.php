<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dependent;
use Faker\Generator as Faker;

$factory->define(Dependent::class, function (Faker $faker) {
    return [
        'holder_id' => $faker->randomElement(App\Associate::where('is_holder', true)->pluck('id')->toArray()),
        'dependent_id' => $faker->unique()->randomElement(App\Associate::where('is_holder', false)->pluck('id')->toArray())
    ];
});
