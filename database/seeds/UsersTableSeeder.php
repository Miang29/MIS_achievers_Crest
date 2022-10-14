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
                'username'=> 'miang',
                'email' =>'maleonora.mendenilla@gmail.com',
                'password' => Hash::make('password')
            
            ]);
    }
}