<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escorts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('rut',25);
            $table->string('nombres',25)->nullable();
            $table->string('apellidos',25)->nullable();
            $table->string('email')->unique();
            $table->string('sexo',2)->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('nacionalidad',20)->nullable();
            $table->integer('id_estado')->unsigned();
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
        Schema::dropIfExists('escorts');
    }
}
