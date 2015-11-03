<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportesFuncionesRutasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    ///////////////////////////////Peliculas//////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/funciones')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/funciones')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/funciones')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/funciones')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteFuncion_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/funciones')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }

}
