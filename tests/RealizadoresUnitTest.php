<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RealizadoresUnitTest extends TestCase
{

    /**
     * @group realizadorUnit
     */

    public function testDatabase()
    {
        $user = factory(App\Realizador::class)->create([
            'nombre' => 'Saul'
        ]);
        $this->seeInDatabase('realizadores', ['nombre' => 'Saul']);
        // Use model in tests...
    }

    /**
     * @group realizadorUnit
     */
    public function testDatabaseCorrect()
    {
        $user = factory(App\Realizador::class)->create([
            'nombre' => 'Nancy',
            'vinculo' => 'vinculo1',
            'email' => 'sadasda@gmail.com',
            'telefono' => '4772000726',
        ]);

        $this->seeInDatabase('realizadores', ['nombre' => 'Nancy','vinculo' => 'vinculo1',
            'email'=>'sadasda@gmail.com',  'telefono' => '4772000726']);

        // Use model in tests...
    }




}
