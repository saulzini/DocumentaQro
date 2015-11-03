<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class peliculaRutasTest extends TestCase
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
     * @group rutasPelicula
     */
    public function testPelicula_PeliculasPelicula()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Película')
            ->seePageIs('peliculas');
    }

    /**
     * @group rutasPelicula
     */
    public function testPelicula_PeliculasRealizadores()
    {
      $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Realizadores')
            ->seePageIs('realizadores');
    }

    /**
     * @group rutasPelicula
     */
    public function testPelicula_PeliculasTrafico()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Tráfico')
            ->seePageIs('traficos');
    }


    ////////////////////////////////////Funcion////////////////////////////////////
    /**
     * @group rutasPelicula
     */
    public function testPelicula_Funcion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Función')
            ->seePageIs('funciones');
    }
////////////////////////////////////Programa/////////////////////////////
    /**
     * @group rutasPelicula
     */
    public function testPelicula_Programa()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Programa')
            ->seePageIs('programas');
    }
    ////////////////////////////////Festival////////////////////////////////////
    /**
     * @group rutasPelicula
     */
    public function testPelicula_Festival()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Festival')
            ->seePageIs('festivales');
    }
    ///////////////////////////////SEDES///////////////////////////////////

    /**
     * @group rutasPelicula
     */
    public function testPelicula_ReporteSedes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Sedes')
            ->seePageIs('sedes');
    }
    ///////////////////////////////INTEGRANTES///////////////////////////////////

    /**
     * @group rutasPelicula
     */
    public function testPelicula_integrantes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Integrantes')
            ->seePageIs('integrantes');
    }
    ///////////////////////////////PATROCINIOS///////////////////////////////////

    /**
     * @group rutasPelicula
     */
    public function testPelicula_PatrociniosCaracteristicas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Características')
            ->seePageIs('caracteristicas');
    }

    /**
     * @group rutasPelicula
     */
    public function testPelicula_PatrociniosPaquetes()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Paquetes')
            ->seePageIs('paquetes');
    }

    /**
     * @group rutasPelicula
     */
    public function testPelicula_PatrociniosPatrocinadores()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('peliculas')
            ->click('Patrocinadores')
            ->seePageIs('patrocinadores');
    }


    /**
     * @group rutasPelicula
     */
    public function testPelicula_ReporteFuncion()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('peliculas')
            ->click('Funciones')
            ->seePageIs('reportes/funciones');
    }

    /**
     * @group rutasPelicula
     */
    public function testPelicula_ReportePaises()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('peliculas')
            ->click('Países')
            ->seePageIs('reportes/paises');
    }
    /**
     * @group rutasPelicula
     */
    public function testPelicula_ReporteProgramas()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('peliculas')
            ->click('Programas')
            ->seePageIs('reportes/programas');
    }
    /**
     * @group rutasPelicula
     */
    public function testPelicula_ReporteFestivales()
    {
        $user=User::find(1);
        $this->actingAs($user)
            ->visit('peliculas')
            ->click('Festivales')
            ->seePageIs('reportes/festivales');
    }


}
