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

$factory->define(App\Funcion_Patrocinador::class, function (Faker\Generator $faker) {

    $funcion= DB::table('funciones')->lists('id');
    $patrocinador= DB::table('patrocinadores')->lists('id');


    return [
        'id_funcion' => $faker->randomElement($funcion),
        'id_patrocinador' => $faker->randomElement($patrocinador)

    ];
});
