<?php

use Illuminate\Database\Seeder;

class traficoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Trafico::class,10)->create();
    }
}
