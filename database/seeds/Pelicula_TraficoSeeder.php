<?php

use Illuminate\Database\Seeder;

class Pelicula_TraficoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Pelicula_Trafico::class,10)->create();
    }
}
