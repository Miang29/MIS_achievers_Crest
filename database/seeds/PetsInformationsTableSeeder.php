<?php

use Illuminate\Database\Seeder;

use App\PetsInformation;

class PetsInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PetsInformation::create([
        	'pet_owner' => 4,
        	'pet_name' => 'Miang',
        	'breed' => 'Shitzu',
        	'species' => 'Dog'
        ]);
    }
}