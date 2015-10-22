<?php

use Illuminate\Database\Seeder;

class funcion_peliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $funciones= DB::table('funciones')->lists('id');
        $peliculas= DB::table('peliculas')->lists('id');

        $i=0;
        foreach ($funciones as $funcion)
        {
            $pelicula=$peliculas[$i];
            $i++;
            $funcioPeli=new \App\Funcion_Pelicula();
            $funcioPeli->id_funcion=$funcion;
            $funcioPeli->id_pelicula=$pelicula;
            $funcioPeli->save();
        }
       // factory(App\Funcion_Pelicula::class,20)->create();
    }
}
