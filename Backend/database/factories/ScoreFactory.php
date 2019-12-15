<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) {
    return [
        'player_id' => 1,
        'hole_id' => 1,
        'score' => $faker->numberBetween(1, 10),
        'date' => now()
    ];
});
