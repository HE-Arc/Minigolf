<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Minigolf;
use Faker\Generator as Faker;

$factory->define(Minigolf::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'description' => $faker->text,
        'city' => $faker->city,
        'address' => $faker->address,
        'zipcode' => $faker->numberBetween(1500,3000),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
