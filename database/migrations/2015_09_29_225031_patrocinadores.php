<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patrocinadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrocinadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

            //
          //  $table->enum('StatusApoyo',['FALTA']);


            $table->string('puesto');
            $table->string('email');
            $table->string('telefono');
            $table->text('notas');
            $table->enum('tipo',['Apoyo','Paquete']);

            $table->integer('id_paquete');






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
        Schema::drop('patrocinadores');
    }
}
