<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create ([
			'first_name' => 'Ma.Leonora',
			'middle_name' => 'Gonzales',
			'last_name' => 'Mendenilla',
			'username'=> 'admin',
			'email' =>'maleonora.mendenilla@gmail.com',
			'password' => Hash::make('admin123'),
			'user_type_id' => 1
		]);

		User::create ([
			'first_name' => 'Rizza',
			'middle_name' => 'Reyes',
			'last_name' => 'Dizon',
			'username'=> 'client',
			'email' =>'ryza.dizon@gmail.com',
			'password' => Hash::make('client123'),
			'user_type_id' => 4
		]);
	}
}