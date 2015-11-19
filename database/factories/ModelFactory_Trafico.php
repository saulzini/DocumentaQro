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

$factory->define(App\Trafico::class, function (Faker\Generator $faker) {

  //  $integrantes = Integrante::lists('id');
    $integrantes = DB::table('integrantes')->lists('id');
    $realizador= DB::table('realizadores')->lists('id');
    $traficos= DB::table('peliculas')->lists('titulo');


  //  // $aux=[1,2,3,4,5];

    //dd($integrantes);
    //$realizador = ::select();

    return [
        'ubicacion' => $faker->name,
        'formato_material' => $faker->firstName,
        'status' => $faker->randomElement(['Buscando contacto','Por enviar correo','Mail enviado','Mail respondido',
            'Ya con permiso','Ya con material','Por pagar','Pagado','En revision','Revisado',
            'Devuelto','Perdido','Almacenado']),
        'costo'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'tipo'=> $faker->randomElement(['Entrante','Saliente']),
        'id_integrante' => $faker->randomElement($integrantes),
        'id_realizador' => $faker->randomElement($realizador),
        'titulo' => $faker->randomElement($traficos),



    ];
});
