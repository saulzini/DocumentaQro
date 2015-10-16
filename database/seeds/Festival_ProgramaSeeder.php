<?php

use Illuminate\Database\Seeder;

class Festival_ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Festival_Programa::class,10)->create();
    }
}
