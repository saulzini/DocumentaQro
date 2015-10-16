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

$factory->define(App\Pelicula::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->name,
        'director' => $faker->name,
        'pais' => $faker->country,
        'anio' => $faker->year,
        'duracion' => $faker->numberBetween( 0, 120),

        'subtitulos' => $faker->randomElement(['Si','No','En proceso']),
        'trailer' => $faker->url,
        'material' => $faker->url,
        'sinopsis' => $faker->text(200),

        'poster' => $faker->url,


    ];
});
