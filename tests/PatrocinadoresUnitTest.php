<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PatrocinadoresUnitTest extends TestCase
{
    /**
     * @group patrocinadorUnit
     */

    public function testDatabase()
    {
        $user = factory(App\Patrocinador::class)->create([
            'nombre' => 'Saul'
        ]);
        $this->seeInDatabase('patrocinadores', ['nombre' => 'Saul']);
        // Use model in tests...
    }

    /**
     * @group patrocinadorUnit
     */
    public function testDatabaseTipoIncorrecto()
    {
        $user = factory(App\Patrocinador::class)->create([
            'nombre' => 'Nancy',
            'puesto' => 'puesto1',
            'email' => 'sadasda@gmail.com',
            'tipo' => 'cualquierCosa',
        ]);

        $this->seeInDatabase('patrocinadores', ['nombre' => 'Nancy','puesto' => 'puesto1',
            'email'=>'sadasda@gmail.com',  'tipo' => 'cualquierCosa']);

        // Use model in tests...
    }
}
