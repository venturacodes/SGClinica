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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Dentist\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Dentist\Collaborator::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'user_id' => random_int(1,10),
        'job' => random_int(1,3),
        'clinic_id'=> 1,
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Dentist\Jobs::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'user_id' => random_int(1,10),
        'job' => random_int(1,3),
        'clinic_id'=> 1,
    ];
});
