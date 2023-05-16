<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appointment_no');
            $table->string('service_id');
            $table->tinyInteger('appointment_time');
            $table->date('reserved_at');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pet_information_id');
            $table->tinyInteger('status')->default(0);
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
