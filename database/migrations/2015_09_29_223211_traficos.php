<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Traficos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traficos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ubicacion');

            $table->enum('status',['Buscando contacto','Por enviar correo','Mail enviado','Mail respondido',
            'Ya con permiso','Ya con material','Por pagar','Pagado','En revision','Revisado']);

            $table->string('formato_material');
            $table->double('costo');
            $table->enum('tipo',['Entrante','Saliente']);

            $table->integer('id_integrante')->unsigned();
           //$table->foreign('id_integrante')->references('id')->on('integrantes');

            $table->integer('id_realizador')->unsigned();
            $table->foreign('id_realizador')->references('id')->on('realizadores');
            $table->string('titulo');

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
        Schema::drop('traficos');
    }
}
