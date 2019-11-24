<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Associate;
use Faker\Generator as Faker;

$factory->define(Associate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone_number' => $faker->phoneNumber,
        'birth_date' => $faker->dateTimeBetween(),
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->countryCode,
        'country' => $faker->country,
        'drivers_license' => $faker->unique()->numerify('#########'),
        'social_security_number' => $faker->unique()->numerify('###.###.###-##'),
        'is_holder' => $faker->boolean(),
        'is_active' => $faker->boolean()
    ];
});
