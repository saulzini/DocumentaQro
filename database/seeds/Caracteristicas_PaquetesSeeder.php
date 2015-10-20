<?php

use Illuminate\Database\Seeder;

class Caracteristicas_PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Caracteristica_Paquete::class,20)->create();
    }
}
