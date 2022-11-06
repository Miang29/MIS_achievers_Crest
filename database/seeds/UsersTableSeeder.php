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
        User::create (
            [
                'first_name' => 'Admin',
                'last_name' => 'Account',
                'username'=> 'admin',
                'email' =>'maleonora.mendenilla@gmail.com',
                'password' => Hash::make('admin'),
                'user_type_id' => 1
            ]); 
    }
}