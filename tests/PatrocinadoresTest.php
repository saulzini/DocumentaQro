<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PatrocinadoresTest extends TestCase
{
    /**
     * @group patrocinadores
     */
    //para llamar a solo un grupo phpunit --group patrocinadores
    public function testsNombre()
    {
        $this->visit('patrocinadores/agregar')
            ->type("Patrocinador1","Nombre")
            ->type("Puesto1","Puesto")
            ->type("email@gmail.com","Email")
            ->type("4772000726","Telefono")
            ->type("sudfksdhfkusdhfkjsdhkfjhsdkfhsdkjfhskdjfhkdsjhfkjdshfkshhfvkrewbfuberkjh","Notas")
            ->press('Agregar')
            ->see("Patrocinador1 ha sido agregado");
    }
    /**
     * @group patrocinadores
     */
    public function testSinNombre()
    {


        $this->visit('patrocinadores/agregar')
            ->type("","Nombre")
            ->press('Agregar')
            ->see("El campo nombre es obligatorio.");
    }
    /**
     * @group patrocinadores
     */
    public function testModificarNombre()
    {
        $this->visit('patrocinadores/modificar/item/11')
            ->type("Patrocinadores1","Nombre")
            ->press("Modificar")
            ->see("Patrocinadores1 ha sido modificado");
    }

    /**
     * @group patrocinadores
     */
    public function testModificarPuestoEmail()
    {
        $this->visit('patrocinadores/modificar/item/11')
            ->type("puesto2","Puesto")
            ->type("sas@gmail.com","Email")
            ->press("Modificar")
            ->see("Patrocinadores1 ha sido modificado");

    }


}
