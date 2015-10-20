<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class integrantesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAgregarUsuarioSatisfactorio()
    {
        $this->visit('integrantes/agregar')
             ->type('Carlos', 'Nombre')
            ->type('6621121317', 'Telefono')
            ->type('Director', 'Puesto')
            ->type('car65@gomez.com', 'Email')
             ->press('Agregar')
             ->see('Carlos ha sido agregado');
    }

    public function testAgregarUsuarioFallido()
    {
        $this->visit('integrantes/agregar')
            ->type('6621121317', 'Telefono')
            ->type('Director', 'Puesto')
            ->type('carl32@gomez.com', 'Email')
            ->press('Agregar')
            ->see('El campo Nombre es obligatorio.');
    }
}
