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


use Illuminate\Support\Facades\DB;

$factory->define(App\Patrocinador_Programa::class, function (Faker\Generator $faker) {



    $patrocinador = DB::table('patrocinadores')->lists('id');
    $programa = DB::table('programas')->lists('id');


    return [
        'id_patrocinador' => $faker->randomElement($patrocinador),
        'id_programa' => $faker->randomElement($programa)
    ];

});
