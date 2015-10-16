<?php

use Illuminate\Database\Seeder;

class Funcion_Patrocinador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Funcion_Patrocinador::class,10)->create();
    }
}
