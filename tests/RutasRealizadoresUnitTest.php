<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RutasRealizadoresUnitTest extends TestCase
{
    /**
     * @group realizadoresUnitRutas
     */

    public function testRutaBase()
    {
        $response = $this->call('GET', 'realizadores');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @group realizadoresUnitRutas
     */
    public function testRutaAgregar()
    {
        $response = $this->call('GET', 'realizadores/agregar');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @group realizadoresUnitRutas
     */
    public function testRutaModificar()
    {
        $response = $this->call('GET', 'realizadores/modificar/item/1');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @group realizadoresUnitRutas
     */
    public function testRutaConsultar()
    {
        $response = $this->call('GET', 'realizadoresLista/item/1');
        $this->assertEquals(200, $response->status());
    }

}
