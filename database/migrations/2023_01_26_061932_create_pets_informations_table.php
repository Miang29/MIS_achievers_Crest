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
            $table->string('pet_owner');
            $table->string('pet_image')->nullable();
            $table->string('pet_name');
            $table->string('breed');  
            $table->string('colors');
            $table->string('birthdate');
            $table->string('species');
            $table->string('gender');
            $table->string('types');
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
        Schema::dropIfExists('pets_informations');
    }
}
