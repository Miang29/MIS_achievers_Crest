<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsOrderTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_order_transactions', function(Blueprint $table){
            $table->increments('id');
            $table->bigInteger('reference_no')->unsigned();
            $table->string('mode_of_payment');
            $table->dateTime('voided_at')->nullable();
        
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
        Schema::dropIfExists('products_order_transactions');
    }
}
