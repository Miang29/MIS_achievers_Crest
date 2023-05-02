<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesOrderTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        Schema::create('services_order_transactions', function(Blueprint $table){
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
        Schema::dropIfExists('services_order_transactions');
    }
}
