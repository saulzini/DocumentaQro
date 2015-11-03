<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class festivalRutasTest extends TestCase
{
    //Sólo se puede checar lo de reportes sede manual
    //Falta poner teste para configuracion
    /**
     * A basic test example.
     *
     * @return void
     */
    ///////////////////////////////Peliculas//////////////////////////////////
    /**
     * @group rutasFestival
     */
    public function testFestival_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasFestival
     */
    public function testFestival_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasFestival
     */
    public function testFestival_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasFestival
     */
    public function testFestival_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasFestival
     */
    public function testFestival_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasFestival
     */
    public function testFestival_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasFestival
     */
    public function testFestival_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasFestival
     */
    public function testFestival_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasFestival
     */
    public function testFestival_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasFestival
     */
    public function testFestival_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasFestival
     */
    public function testFestival_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('festivales')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasFestival
     */
    public function testFestival_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('festivales')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasFestival
     */
    public function testFestival_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('festivales')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasFestival
     */
    public function testFestival_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('festivales')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasFestival
     */
    public function testFestival_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('festivales')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
