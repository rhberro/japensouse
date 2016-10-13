<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'administrator' => $faker->boolean(5),
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear,
    ];
});

$factory->define(App\Idea::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'title' => $faker->words(5, true),
        'description' => $faker->realText(),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear,
    ];
});
