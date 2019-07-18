<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitedProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visited_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable(); // on user table
            $table->integer('escort_id')->nullable();
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
        Schema::dropIfExists('visited_profiles');
    }
}
