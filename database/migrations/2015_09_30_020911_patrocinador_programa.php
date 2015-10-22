<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatrocinadorPrograma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrocinador_programa', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_patrocinador')->unsigned()->index();
            $table->foreign('id_patrocinador')->references('id')->on('patrocinadores');

            $table->integer('id_programa')->unsigned()->index();
            $table->foreign('id_programa')->references('id')->on('programas');


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
        Schema::drop('patrocinador_programa');
    }
}
