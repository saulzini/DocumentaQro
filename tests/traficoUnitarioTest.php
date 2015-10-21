<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class traficoUnitarioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRutaAgregar()
    {
        $response = $this->call('GET', 'traficos/agregar');

        $this->assertEquals(200, $response->status());
    }

    public function testRutaModificar()
    {
            $response = $this->call('GET', 'traficos/modificar/item/19');

            $this->assertEquals(200, $response->status());
        }

    public function testRutaConsultar()
    {
            $response = $this->call('GET', 'traficosLista/item/19');

            $this->assertEquals(200, $response->status());
        }
}
