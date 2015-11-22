<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FestivalPrograma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_programa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_festival')->unsigned()->index();
            $table->foreign('id_festival')->references('id')->on('festivales')->onDelete('cascade');;

            $table->integer('id_programa')->unsigned()->index();
            $table->foreign('id_programa')->references('id')->on('programas')->onDelete('cascade');;

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
        Schema::drop('festival_programa');
    }
}
