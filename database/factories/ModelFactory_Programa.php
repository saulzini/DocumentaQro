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

use App\Integrante;
use App\Realizador;

$factory->define(App\Programa::class, function (Faker\Generator $faker) {


    return [
        'titulo' => $faker->name,
        'poster' => $faker->url,



    ];
});
