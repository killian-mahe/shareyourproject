<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Technology;
use Faker\Generator as Faker;

$factory->define(Technology::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'label' => $faker->word
    ];
});
