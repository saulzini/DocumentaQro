<?php

use Illuminate\Database\Seeder;

class Patrocinador_Programa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Patrocinador_Programa::class,20)->create();
    }
}
