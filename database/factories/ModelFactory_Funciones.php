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
use App\Sede;
use App\Programa;
use App\Festival;

$factory->define(App\Funcion::class, function (Faker\Generator $faker) {

    // DB::table('integrantes')->
    $sedes=  DB::table('sedes')->lists('id');
    $programas=  DB::table('programas')->lists('id');
    $festivales=  DB::table('festivales')->lists('id');
    $integrante=  DB::table('integrantes')->lists('id');

    return [
        'titulo' => $faker->name,
        'id_sede' => $faker->randomElement($sedes),
         'fecha'=>$faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
        'programadopor' => $faker->name,


        'asistencia' => $faker->numberBetween(0,100),
        'poster' => $faker->url,
        'status'=> $faker->randomElement(['Programada','Confirmada','Cancelada','Realizada']),
        'id_programa' => $faker->randomElement($programas),
        'id_festival' => $faker->randomElement($festivales),
    ];
});

