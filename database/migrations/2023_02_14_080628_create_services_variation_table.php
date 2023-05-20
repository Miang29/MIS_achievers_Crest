<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_variations', function(Blueprint $table){
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->string('variation_name')->default('Default');
            $table->integer('price');
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::dropIfExists('services_variations');
    }
}
