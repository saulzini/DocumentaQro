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

$factory->define(App\Integrante::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'puesto' => $faker->firstName,
        'email' => $faker->email,
        'telefono'=> $faker->phoneNumber,

    ];
});
