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
			'address' =>'',
			'password' => Hash::make('admin123'),
			'user_type_id' => 1
		]);

		User::create ([
			'first_name' => 'Rizza',
			'middle_name' => 'Reyes',
			'last_name' => 'Dizon',
			'username'=> 'client',
			'email' =>'ryza.dizon@gmail.com',
			'address' =>'Muzon Taytay Rizal',
			'password' => Hash::make('client123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Alex',
			'middle_name' => 'Dizon',
			'last_name' => 'Gonzaga',
			'username'=> 'alex123',
			'email' =>'alex.gonzaga@gmail.com',
			'address' =>'',
			'password' => Hash::make('alex123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Kathryn',
			'middle_name' => 'Bernardo',
			'last_name' => 'Padilla',
			'username'=> 'kath123',
			'email' =>'kath.padilla@gmail.com',
			'address' =>'',
			'password' => Hash::make('kath123'),
			'user_type_id' => 2
		]);
	}
}