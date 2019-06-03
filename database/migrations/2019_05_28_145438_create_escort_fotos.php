<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escort_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_escort');
            $table->unsignedInteger('id_perfil');
            $table->string('url_fotos')->nullable();
            $table->timestamps();

            $table->foreign('id_perfil')->references('id_perfil')->on('perfiles')->onDelete('cascade');
           $table->foreign('id_escort')->references('id')->on('escorts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escort_fotos');
    }
}
