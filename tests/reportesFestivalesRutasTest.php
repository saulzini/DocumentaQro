<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportesFestivalesRutasTest extends TestCase
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
     * @group rutasReportes
     */
    public function testReporteFestivales_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/festivales')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/festivales')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/festivales')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/festivales')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteFestivales_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/festivales')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
