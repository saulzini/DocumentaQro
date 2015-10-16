<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FuncionPatrocinador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_patrocinador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_funcion')->unsigned()->index();
            $table->foreign('id_funcion')->references('id')->on('funciones')->onDelete('cascade');

            $table->integer('id_patrocinador')->unsigned()->index();
            $table->foreign('id_patrocinador')->references('id')->on('patrocinadores')->onDelete('cascade');
            

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
        Schema::drop('funcion_patrocinador');
    }
}
