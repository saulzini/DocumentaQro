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

$factory->define(App\Caracteristica_Paquete::class, function (Faker\Generator $faker) {

    $caracteristica= DB::table('caracteristicas')->lists('id');
    $paquete= DB::table('paquetes')->lists('id');


    return [
        'id_caracteristica' => $faker->randomElement($caracteristica),
        'id_paquete' => $faker->randomElement($paquete)
    ];
});
