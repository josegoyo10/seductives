<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id_perfil')->unsigned();
            $table->unsignedInteger('id_escort');
            $table->unsignedInteger('id_categoria');
            $table->string('seo_slug')->nullable();
            $table->string('foto_principal')->nullable();
            $table->string('foto_secundaria_1')->nullable();
            $table->string('foto_secundaria_2')->nullable();
            $table->string('region')->nullable();
            $table->string('comuna')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('comentario_escort')->nullable();
            $table->integer('edad')->nullable();
            $table->string('altura')->nullable();
            $table->string('medidas')->nullable();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_fin')->nullable();
            $table->string('atencion')->nullable();
            $table->string('dias_disponibles')->nullable();
            $table->string('telefono')->nullable();
            $table->decimal('precio',7,2)->nullable();
            $table->timestamp('fecha_registro')->nullable();
            $table->integer('id_estado')->nullable();
            $table->timestamps();

          $table->foreign('id_categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('perfiles');
    }
}
