<?php

use Illuminate\Database\Seeder;

class festivalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Festival::class,5)->create();
    }
}
