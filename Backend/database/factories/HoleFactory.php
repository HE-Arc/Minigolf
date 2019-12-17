<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hole;
use Faker\Generator as Faker;

$factory->define(Hole::class, function (Faker $faker) {
    return [
        'course_id' => 1,
        'number' => 1,
    ];
});
