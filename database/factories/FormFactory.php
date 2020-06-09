<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'latitude' => $faker->randomFloat(2, 0, 90),
        'longitude' => $faker->randomFloat(2, 0, 90),
        'population' => $faker->randomNumber(7),
    ];
});
