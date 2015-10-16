<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FuncionPelicula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_pelicula', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_funcion')->unsigned()->index();
            $table->foreign('id_funcion')->references('id')->on('funciones')->onDelete('cascade');

            $table->integer('id_pelicula')->unsigned()->index();
            $table->foreign('id_pelicula')->references('id')->on('peliculas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funcion_pelicula');
    }
}
