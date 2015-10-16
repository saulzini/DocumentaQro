<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeliculaTrafico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula_trafico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelicula')->unsigned()->index();
            $table->foreign('id_pelicula')->references('id')->on('peliculas')->onDelete('cascade');

            $table->integer('id_trafico')->unsigned()->index();
            $table->foreign('id_trafico')->references('id')->on('traficos')->onDelete('cascade');

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
        Schema::drop('pelicula_trafico');
    }
}
