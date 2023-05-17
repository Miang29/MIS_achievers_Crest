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
			'address' =>'St.Clemence Compound San Francisco Village Muzon Taytay Rizal',
			'gender'=> 'female',
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
			'gender'=> 'female',
			'password' => Hash::make('client123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Alex',
			'middle_name' => 'Dizon',
			'last_name' => 'Gonzaga',
			'username'=> 'alex123',
			'email' =>'alex.gonzaga@gmail.com',
			'address' =>'Dolores Taytay Rizal',
			'gender'=> 'female',
			'password' => Hash::make('alex123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Mia',
			'middle_name' => 'Dizon',
			'last_name' => 'Gonzales',
			'username'=> 'mia123',
			'email' =>'mia.gonzales@gmail.com',
			'address' =>'Dolores Taytay Rizal',
			'gender'=> 'female',
			'password' => Hash::make('mia123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Ryan',
			'middle_name' => 'Reyes',
			'last_name' => 'Caingles',
			'username'=> 'ryan123',
			'email' =>'ryan.caingles@gmail.com',
			'address' =>'Dolores Taytay Rizal',
			'gender'=> 'female',
			'password' => Hash::make('ryan123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Arian',
			'middle_name' => 'Gipit',
			'last_name' => 'Fuller',
			'username'=> 'arian123',
			'email' =>'arian.fuller@gmail.com',
			'address' =>'Dolores Taytay Rizal',
			'gender'=> 'female',
			'password' => Hash::make('arian123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Kathryn',
			'middle_name' => 'Bernardo',
			'last_name' => 'Padilla',
			'username'=> 'kath123',
			'email' =>'kath.padilla@gmail.com',
			'address' =>'Angono Rizal',
			'gender'=> 'female',
			'password' => Hash::make('kath123'),
			'user_type_id' => 4
		]);

		User::create ([
			'first_name' => 'Arianette',
			'middle_name' => 'Bernardo',
			'last_name' => 'Fuller',
			'username'=> 'staff123',
			'email' =>'arianette.fuller@gmail.com',
			'address' =>'Antipolo Rizal',
			'gender'=> 'female',
			'password' => Hash::make('staff123'),
			'user_type_id' => 3
		]);
	}
}