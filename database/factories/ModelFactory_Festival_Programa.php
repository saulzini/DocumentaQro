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

$factory->define(App\Festival_Programa::class, function (Faker\Generator $faker) {

    $festival= DB::table('festivales')->lists('id');
    $programa= DB::table('programas')->lists('id');


    return [
        'id_festival' => $faker->randomElement($festival),
        'id_programa' => $faker->randomElement($programa)

    ];
});
