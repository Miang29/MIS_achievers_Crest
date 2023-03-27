<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('last_name');
			$table->string('suffix')->nullable();
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('address')->nullable();
			$table->string('gender');
			$table->string('password');
			$table->integer('user_type_id')->unsigned();
			$table->tinyInteger('login_attempts')->default(0);
			$table->tinyInteger('locked')->default(0);
			$table->ipAddress('locked_by')->nullable();
			$table->rememberToken();
			$table->timestamps();

			$table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
