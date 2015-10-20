<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class festivalUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabaseCorrect()
    {
        $user = factory(App\Festival::class)->create([
            'titulo' => 'Prueba'
        ]);

        $this->seeInDatabase('festivales', ['titulo' => 'Prueba']);

        // Use model in tests...
    }

    public function testDatabaseIncorrect()
    {
        $user = factory(App\Sede::class)->create([
            'descripcion' => null
        ]);

        $this->seeInDatabase('sedes', ['descripcion' => null]);

        // Use model in tests...
    }


    public function testRutaBase()
    {
        $response = $this->call('GET', 'festivales');

        $this->assertEquals(200, $response->status());
    }
    public function testRutaAgregar()
    {
        $response = $this->call('GET', 'festivales/agregar');

        $this->assertEquals(200, $response->status());
    }

    public function testRutaModificar()
    {
        $response = $this->call('GET', 'festivales/modificar/item/1');

        $this->assertEquals(200, $response->status());
    }

    public function testRutaConsultar()
    {
        $response = $this->call('GET', 'festivalesLista/item/1');

        $this->assertEquals(200, $response->status());
    }


}
