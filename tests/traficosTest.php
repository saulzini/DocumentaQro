<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class traficosTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAgregarTraficoSatisfactorio()
    {
    $this->visit('traficos/agregar')
        ->select('1', 'Pelicula')
        ->type('Queretaro', 'Ubicacion')
        ->select('Buscando contacto', 'Status')
        ->type('CD', 'Formato')
        ->type('500', 'Costo')
        ->select('Entrante', 'Tipo')
        ->select('1', 'Integrante')
        ->select('1', 'Realizador')
        ->press('Agregar')
        ->see('Paolo Schmidt PhD ha sido agregado');
    }

    public function testAgregarTraficoSinPeli()
    {
        $this->visit('traficos/agregar')

            ->type('Queretaro', 'Ubicacion')
            ->select('Buscando contacto', 'Status')
            ->type('CD', 'Formato')
            ->type('500', 'Costo')
            ->select('Entrante', 'Tipo')
            ->select('1', 'Integrante')
            ->select('1', 'Realizador')
            ->press('Agregar')
            ->see('El campo Pelicula es obligatorio.');
    }


}
