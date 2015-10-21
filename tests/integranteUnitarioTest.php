<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class integranteUnitarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRutaAgregar()
    {
        $response = $this->call('GET', 'integrantes/agregar');

        $this->assertEquals(200, $response->status());
    }

    public function testRutaModificar()
    {
                $response = $this->call('GET', 'integrantes/modificar/item/18');

                $this->assertEquals(200, $response->status());
            }

    public function testRutaConsultar()
    {
                $response = $this->call('GET', 'integrantesLista/item/18');

                $this->assertEquals(200, $response->status());
            }
}
