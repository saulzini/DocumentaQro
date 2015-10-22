<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaquetesUnitTest extends TestCase
{
    /**
     * @group paquetesUnit
     */

    public function testDatabase()
    {
        $user = factory(App\Paquete::class)->create([
            'descripcion' => 'PaqueteDorado',
        ]);
        $this->seeInDatabase('paquetes', ['descripcion' => 'PaqueteDorado']);
        // Use model in tests...
    }

    /**
     * @group paquetesUnit
     */

    public function testDatabaseCorrect()
    {
        $user = factory(App\Paquete::class)->create([
            'descripcion' => 'PaquetePlateado',
            'costo' => '2040'
        ]);

        $this->seeInDatabase('paquetes', ['descripcion' => 'PaquetePlateado','costo' => '2040']);

        // Use model in tests...
    }
}
