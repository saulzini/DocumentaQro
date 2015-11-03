<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportesSedesRutasTest extends TestCase
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
    public function testReporteSedes_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteSedes_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteSedes_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReporteSedes_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/sedes')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasReportes
     */
    public function testReporteSedes_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/sedes')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasReportes
     */
    public function testReporteSedes_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/sedes')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteSedes_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/sedes')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasReportes
     */
    public function testReporteSedes_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/sedes')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
