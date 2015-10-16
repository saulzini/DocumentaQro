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
        factory(App\Funcion_Pelicula::class,10)->create();
    }
}
