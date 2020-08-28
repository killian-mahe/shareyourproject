<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text($maxNbChars = 150)
    ];
});

$factory->state(Project::class, 'private', function ($faker) {
    return [
        'is_public' => false,
    ];
});

$factory->state(Project::class, 'withAuthor', function ($faker) {
    return [
        'author' => factory(App\User::class),
    ];
});
