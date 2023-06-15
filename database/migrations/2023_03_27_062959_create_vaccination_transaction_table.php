<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinationTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_transaction', function(Blueprint $table){
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('pet_name')->unsigned();
            $table->integer('variation_id')->unsigned();
            $table->date('expired_at');
            $table->integer('price');
            $table->integer('additional_cost')->unsigned();
            $table->integer('total');

            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('services_order_transactions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('vaccination_transaction');
    }
}
