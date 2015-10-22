<?php

use Illuminate\Database\Seeder;

class Festival_Programa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Festival_Programa::class,20)->create();
    }
}
