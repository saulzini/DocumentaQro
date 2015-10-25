<?php

use Illuminate\Database\Seeder;

class FuncionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Funcion::class,40)->create();
    }
}
