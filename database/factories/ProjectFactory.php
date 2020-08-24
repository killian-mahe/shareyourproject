<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text($maxNbChars = 150)
    ];
});

$factory->state(Project::class, 'private', [
    'is_public' => false
]);

$factory->state(Project::class, 'withAuthor', [
    'author' => factory(App\User::class),
]);