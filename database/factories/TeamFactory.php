<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'team_name' => $faker->unique()->country,
    ];
});