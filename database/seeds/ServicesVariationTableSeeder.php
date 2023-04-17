<?php

use App\ServicesVariation;
use Illuminate\Database\Seeder;

class ServicesVariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicesVariation::create([
            'service_id' => 1,
            'variation_name' => 'Taytay',
            'price' => '100',
            'remarks' => 'around taytay rizal'
		]);

        ServicesVariation::create([
            'service_id' => 1,
            'variation_name' => 'Cainta',
            'price' => '100',
            'remarks' => ''
		]);

        ServicesVariation::create([
            'service_id' => 1,
            'variation_name' => 'Antipolo',
            'price' => '100',
            'remarks' => ''
        ]);

        ServicesVariation::create([
            'service_id' => 2,
            'variation_name' => 'default',
            'price' => '400',
            'remarks' => ''
		]);

        ServicesVariation::create([
            'service_id' => 3,
            'variation_name' => 'Anti-Rabies',
            'price' => '200',
            'remarks' => ''
        ]);

        ServicesVariation::create([
            'service_id' => 3,
            'variation_name' => 'Kennal cough',
            'price' => '500',
            'remarks' => '(Bordetella)'
        ]);

          ServicesVariation::create([
            'service_id' => 3,
            'variation_name' => 'DHPPi + Rabies(7:1)',
            'price' => '750',
            'remarks' => ''
        ]);

          ServicesVariation::create([
            'service_id' => 4,
            'variation_name' => 'Small Breed',
            'price' => '350',
            'remarks' => ''
        ]);
          ServicesVariation::create([
            'service_id' => 4,
            'variation_name' => 'Medium Breed',
            'price' => '450',
            'remarks' => ''
        ]);

        ServicesVariation::create([
            'service_id' => 4,
            'variation_name' => 'Large Breed',
            'price' => '500',
            'remarks' => ''
        ]);

         ServicesVariation::create([
            'service_id' => 15,
            'variation_name' => 'Small Breed',
            'price' => '250',
            'remarks' => ''
        ]);

         ServicesVariation::create([
            'service_id' => 15,
            'variation_name' => 'Medium Breed',
            'price' => '300',
            'remarks' => ''
        ]);

         ServicesVariation::create([
            'service_id' => 16,
            'variation_name' => 'Small Breed',
            'price' => '300',
            'remarks' => ''
        ]);

         ServicesVariation::create([
            'service_id' => 16,
            'variation_name' => 'Medium Breed',
            'price' => '450',
            'remarks' => ''
        ]);
    }
}
