<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class reportesPaisesRutasTest extends TestCase
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
    public function testReportePaises_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasReportes
     */
    public function testReportePaises_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasReportes
     */
    public function testReportePaises_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReportePaises_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReportePaises_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasReportes
     */
    public function testReportePaises_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReportePaises_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReportePaises_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasReportes
     */
    public function testReportePaises_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasReportes
     */
    public function testReportePaises_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasReportes
     */
    public function testReportePaises_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('reportes/paises')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasReportes
     */
    public function testReportePaises_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/paises')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasReportes
     */
    public function testReportePaises_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/paises')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasReportes
     */
    public function testReportePaises_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/paises')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasReportes
     */
    public function testReportePaises_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('reportes/paises')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
