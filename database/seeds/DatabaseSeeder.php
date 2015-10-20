<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
        $this->call('integrantesSeeder');
        $this->call('realizadoresSeeder');
        $this->call('sedesSeeder');
         $this->call('festivalesSeeder');
        $this->call('PatrocinadoresSeeder');
        $this->call('programasSeeder');


        $this->call('PeliculasSeeder');
        $this->call('traficoSeeder');
        $this->call('FuncionesSeeder');


         $this->call('funcion_peliculaSeeder');
         $this->call('Pelicula_TraficoSeeder');
         $this->call('Funcion_Patrocinador');


       $this->call(CaracteristicasSeeder::class);

        $this->call('PaquetesSeeder');
        $this->call('Caracteristicas_PaquetesSeeder');









        Model::reguard();
    }
}
