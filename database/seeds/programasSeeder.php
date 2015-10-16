<?php

use Illuminate\Database\Seeder;

class programasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Programa::class,10)->create();
    }
}
