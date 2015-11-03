<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportesProgramasRutasTest extends TestCase
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
    public function testReporteProgramas_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/programas')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/programas')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/programas')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/programas')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteProgramas_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/programas')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
