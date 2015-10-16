<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('director');
            $table->string('pais');
            $table->integer('anio');
            $table->integer('duracion');
            $table->enum('subtitulos',['Si','No','En proceso']);
            $table->string('trailer');
            $table->string('material');
            $table->text('sinopsis');
            $table->text('notas');
            $table->string('poster');
            $table->enum('tipo',['Cortometraje','Largometraje']);
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
        Schema::drop('peliculas');
    }
}
