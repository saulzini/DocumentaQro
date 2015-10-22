<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramasTest extends TestCase
{

    /**
     * @group programas
     */
    //para llamar a solo un grupo phpunit --group programas
    public function testsTitulo()
    {
        $this->visit('programas/agregar')
            ->type("Programa1","Titulo")
            ->press('Agregar')
            ->see("Programa1 ha sido agregado");
    }


    /**
     * @group programas
     */
    public function testSinTitulo()
    {
        $this->visit('programas/agregar')
            ->press('Agregar')
            ->see("El campo Titulo es obligatorio.");
    }

    /**
     * @group programas
     */
    public function testModificarTitulo()
    {
        $this->visit('programas/modificar/item/13')
            ->type("Programa3","Titulo")
            ->press("Modificar")
            ->see("Programa3 ha sido modificado");
    }


}
