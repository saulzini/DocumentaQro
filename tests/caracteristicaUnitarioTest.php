<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class caracteristicaUnitarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRutaAgregar()
    {
        $response = $this->call('GET', 'caracteristicas/agregar');

        $this->assertEquals(200, $response->status());
    }

    public function testRutaModificar()
    {
                $response = $this->call('GET', 'caracteristicas/modificar/item/6');

                $this->assertEquals(200, $response->status());
    }

    public function testRutaConsultar()
    {
                $response = $this->call('GET', 'caracteristicasLista/item/6');

                $this->assertEquals(200, $response->status());
    }
}
