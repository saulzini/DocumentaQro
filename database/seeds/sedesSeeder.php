<?php

use Illuminate\Database\Seeder;

class sedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Sede::class,10)->create();
    }
}
