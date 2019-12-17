<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'course_id' => 1,
        'date' => $faker->dateTimeThisYear(),
    ];
});
