<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FestivalTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function testTitulosinImg()
    {
        $this->visit('festivales/agregar')
        ->type("Alex 1000","Titulo")
         
            ->press('Agregar')
        ->see("Alex 1000 ha sido agregado");
    }

    public function testSinTitulo()
    {
        $this->visit('festivales/agregar')

            ->press('Agregar')
            ->see("El campo titulo es obligatorio.");
    }
    public function testTituloImgMala()
    {
        $this->visit('festivales/agregar')
            ->type("Alex imgIncorrect","Titulo")
            ->attach('C:\Users\Alexis\Pictures\unnamed.zip', 'image')
            ->press('Agregar')
            ->see("image debe ser un archivo con formato");
    }

    public function testModificarTitulo()
    {
        $this->visit('festivales/modificar/item/5')
            ->type("10","Titulo")
            ->press("Modificar")
            ->see("10 ha sido modificado");

    }

    public function testModificarTituloImg()
    {
        $this->visit('festivales/modificar/item/5')
            ->type("10","Titulo")
            ->attach('C:\Users\Alexis\Pictures\22f6c44.jpg', 'image')
            ->press("Modificar")
            ->see("10 ha sido modificado");

    }

    public function testAgregarMediantePost()
    {
        $this->withoutMiddleware();
        $response = $this->call('POST', 'festivales/agregar/crear', ['Titulo' => 'SaulP','Patrocinadores'=>['1','2']]);
        $this->seeInDatabase('festivales', ['titulo' => 'Saul']);


    }




 //Revisar manualmente agregar patrocinadores, modificar patrocinadores, consultar, eliminar y exportar


}
