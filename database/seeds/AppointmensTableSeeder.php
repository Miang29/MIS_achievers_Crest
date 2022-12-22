<?php

use App\Appointments;
use Illuminate\Database\Seeder;

class AppointmensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointments::create (
            [
                'pet_owner' => 'Miang Gonzales',
                'pet_name' => 'Goofy',
                'email'=> 'miang.gonzales@gmail.com',
                'date' =>'2022-12-21',
                'time' => '00:54:54',
                'service_type' => 'Consultation'
            ]); 
    }
}
