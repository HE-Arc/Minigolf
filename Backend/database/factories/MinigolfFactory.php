<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Minigolf;
use Faker\Generator as Faker;
$list = array('minigolf','golf');
$factory->define(Minigolf::class, function (Faker $faker) use ($list) {
    $prefix = $list[random_int(0,1)];
    $name = preg_split('#\s+#', $faker->text, 2)[0];

    return [
        'name' => random_int(0, 1) ? $prefix.' '.$name : $name.' '.$prefix,
        'description' => $faker->text,
        'city' => $faker->city,
        'address' => preg_split('#\s+#', $faker->streetAddress, 2)[1].' '.$faker->numberBetween(1, 60),
        'zipcode' => $faker->numberBetween(1500,3000),
        'phone' => $faker->numerify(str_repeat('#',10)),
        'email' => $faker->email,
    ];
});
