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

use App\Trafico;
use App\Pelicula;

$factory->define(App\Pelicula_Trafico::class, function (Faker\Generator $faker) {
    $trafico= DB::table('traficos')->lists('id');
   $pelicula= DB::table('peliculas')->lists('id');


    return [

        'id_pelicula' => $faker->randomElement($pelicula),
        'id_trafico' => $faker->randomElement($trafico),
    ];
});
