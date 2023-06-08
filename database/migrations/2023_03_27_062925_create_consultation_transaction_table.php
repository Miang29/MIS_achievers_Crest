<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_transaction', function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('client_name')->unsigned();
            $table->integer('pet_name')->unsigned();
            $table->string('breed');
            $table->integer('service_category_id')->unsigned();
            $table->string('weight');
            $table->string('temperature');
            $table->string('findings')->nullable();
            $table->string('treatment')->nullable();
            $table->string('prescription')->nullable();
            $table->integer('price');
            $table->integer('additional_cost')->unsigned();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('services_order_transactions')->onDelete('cascade');
            $table->foreign('service_category_id')->references('id')->on('services_categories')->onDelete('cascade');
            $table->foreign('pet_name')->references('id')->on('pets_informations')->onDelete('cascade');
            $table->foreign('client_name')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('consultation_transaction');
    }
}
