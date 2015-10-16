<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FestivalPatrocinador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_patrocinador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_festival')->unsigned()->index();
            $table->foreign('id_festival')->references('id')->on('festivales')->onDelete('cascade');

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
        Schema::drop('festival_patrocinador');
    }
}
