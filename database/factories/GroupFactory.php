<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'decription' => $faker->text(20),
        'amount' => $faker->numberBetween(2000, 10000),
    ];
});
