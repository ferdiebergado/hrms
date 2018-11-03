<?php

use Faker\Generator as Faker;
use App\TravelOrder;

$factory->define(TravelOrder::class, function (Faker $faker) {
    return [
        'lastname' => $faker->name(),
        'startdate' => $faker->dateTime(),
        'enddate' => $faker->dateTime()
    ];
});
