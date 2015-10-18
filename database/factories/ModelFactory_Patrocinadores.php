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

$factory->define(App\Patrocinador::class, function (Faker\Generator $faker) {



    return [
        'nombre' => $faker->name,
        'puesto' => $faker->name,
        'email' => $faker->email,
        'telefono' => $faker->phoneNumber,
        'notas' => $faker->text,

        'tipo' => $faker->randomElement(['Apoyo','Paquete']),
        'id_paquete' => 1,




    ];
});
