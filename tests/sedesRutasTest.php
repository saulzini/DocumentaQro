<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class sedesRutasTest extends TestCase
{
    //Sólo se puede checar lo de reportes sede manual
    //Falta poner teste para configuracion
    /**
     * A basic test example.
     *
     * @return void
     */
    ///////////////////////////////sedes//////////////////////////////////
    /**
     * @group rutasSedes
     */
    public function testSedes_sedesPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasSedes
     */
    public function testSedes_sedesRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasSedes
     */
    public function testSedes_sedesTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasSedes
     */
    public function testSedes_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasSedes
     */
    public function testSedes_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasSedes
     */
    public function testSedes_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasSedes
     */
    public function testSedes_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasSedes
     */
    public function testSedes_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasSedes
     */
    public function testSedes_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasSedes
     */
    public function testSedes_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasSedes
     */
    public function testSedes_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('sedes')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasSedes
     */
    public function testSedes_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('sedes')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasSedes
     */
    public function testSedes_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('sedes')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasSedes
     */
    public function testSedes_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('sedes')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasSedes
     */
    public function testSedes_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('sedes')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
