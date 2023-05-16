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
                'appointment_no' => 1,
                'service_id' => 4,
                'appointment_time'=> 1,
                'reserved_at' =>'2022-12-21',
                'user_id' => 4,
                'pet_information_id' => '1',
                'breed' => 'Tabby',
                'reason' => ''
            ]); 
    }
}
