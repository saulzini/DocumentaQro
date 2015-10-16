<?php

use Illuminate\Database\Seeder;

class PatrocinadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Patrocinador::class,10)->create();
    }
}
