<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaquetesTest extends TestCase
{

    /**
     * @group paquetes
     */
    //para llamar a solo un grupo phpunit --group paquetes
    public function testsDescripcionCosto()
    {
        $this->visit('paquetes/agregar')
            ->type("Paquete100","Nombre")
            ->type("1200","Costo")
            ->press('Agregar')
            ->see("Paquete100 ha sido agregado");
    }

    /**
     * @group paquetes
     */
    public function testSinDescripcion()
    {
        $this->visit('paquetes/agregar')
            ->type("1400","Costo")
            ->press('Agregar')
            ->see("El campo Nombre es obligatorio.");
    }

    /**
     * @group paquetes
     */
    public function testModificarDescripcionCosto()
    {
        $this->visit('paquetes/modificar/item/26')
            ->type("Paquete1","Nombre")
            ->type("1400","Costo")
            ->press("Modificar")
            ->see("Paquete1 ha sido modificado");
    }


}
