<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaracteristicaPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_paquete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_caracteristica')->unsigned()->index();
            $table->foreign('id_caracteristica')->references('id')->on('caracteristicas')->onDelete('cascade');

            $table->integer('id_paquete')->unsigned()->index();
            $table->foreign('id_paquete')->references('id')->on('paquetes')->onDelete('cascade');


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
        Schema::drop('caracteristica_paquete');
    }
}
