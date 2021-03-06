<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_escort', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->nullable(); // on user table
             $table->integer('escort_id')->nullable();
             $table->string('escort_foto_id')->nullable();
             $table->integer('likes_count')->default(0);
             $table->integer('dislike_count')->default(0);
             $table->integer('seen')->default(0);
             $table->timestamps('fecha');

             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('escort_id')->references('id')->on('escorts');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
