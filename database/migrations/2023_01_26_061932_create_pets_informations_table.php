<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pet_owner');
            $table->string('pet_image')->nullable();
            $table->string('pet_name');
            $table->string('breed')->default("askal");
            $table->unsignedInteger('colors')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('species')->default("pet");
            $table->string('gender')->default("trans");
            $table->string('types')->default("tamed");
            $table->string('traits')->nullable();
            $table->string('pet_status')->default("alive");
            $table->string('lifespan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pet_owner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('colors')->references('id')->on('color_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets_informations');
    }
}
