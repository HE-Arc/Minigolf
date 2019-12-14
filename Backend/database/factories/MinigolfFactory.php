<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Minigolf;
use Faker\Generator as Faker;

$factory->define(Minigolf::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'description' => $faker->text,
        'city' => $faker->city,
        'address' => preg_split('#\s+#', $faker->streetAddress, 2)[1],
        'zipcode' => $faker->numberBetween(1500,3000),
        'phone' => $faker->numerify(str_repeat('#',10)),
        'email' => $faker->email,
    ];
});
