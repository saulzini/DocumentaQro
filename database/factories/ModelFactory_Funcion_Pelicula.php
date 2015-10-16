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

use App\Funcion;
use App\Pelicula;

$factory->define(App\Funcion_Pelicula::class, function (Faker\Generator $faker) {

    $funcion= DB::table('funciones')->lists('id');
    $pelicula= DB::table('peliculas')->lists('id');


    return [
        'id_funcion' => $faker->randomElement($funcion),
        'id_pelicula' => $faker->randomElement($pelicula)

    ];
});
