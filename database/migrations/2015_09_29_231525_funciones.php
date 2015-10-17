<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');

            $table->integer('id_sede')->unsigned();
              $table->foreign('id_sede')->references('id')->on('sedes');

            $table->integer('asistencia');
            $table->string('poster');

            //Preguntar
            $table->enum('status',['Programada','Confirmada','Cancelada','Realizada']);

            $table->string('programadopor');


            //
            $table->dateTime('fecha');

            $table->integer('id_programa')->unsigned();
            //$table->foreign('id_programa')->references('id')->on('programas');

            $table->integer('id_festival')->unsigned();
            $table->foreign('id_festival')->references('id')->on('festivales');



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
        Schema::drop('funciones');
    }
}
