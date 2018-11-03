<?php

use Faker\Generator as Faker;
use App\Travel;

$factory->define(Travel::class, function (Faker $faker) {
    return [
        'activity' => $faker->text(100),
        'venue' => $faker->city(),
        'startdate' => $faker->dateTime(),
        'enddate' => $faker->dateTime()
    ];
});
