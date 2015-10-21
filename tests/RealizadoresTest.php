<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RealizadoresTest extends TestCase
{

    /**
     * @group realizadores
     */
    //para llamar a solo un grupo phpunit --group realizadores
    public function testsNombre()
    {
        $this->visit('realizadores/agregar')
            ->type("Realzidor1","Nombre")
            ->type("Vinculo1","Vinculo")
            ->type("email@gmail.com","Email")
            ->type("4882009429","Telefono")
            ->press('Agregar')
            ->see("Realzidor1 ha sido agregado");
    }

    public function testSinNombre()
    {
        $this->visit('realizadores/agregar')
            ->press('Agregar')
            ->see("El campo nombre es obligatorio.");
    }

    public function testModificarNombre()
    {
        $this->visit('realizadores/modificar/item/11')
            ->type("Realizador11","Nombre")
            ->press("Modificar")
            ->see("Realizador11 ha sido modificado");
    }

    public function testModificarVinculoTelefono()
    {
        $this->visit('realizadores/modificar/item/11')
            ->type("vinculo2","Vinculo")
            ->type("4552000243","Telefono")

            ->press("Modificar")
            ->see("Realizador11 ha sido modificado");

    }

}
