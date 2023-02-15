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
			'service_category_id' => 1,
            'service_id' => 1,
            'variation_name' => 'Taytay',
            'price' => '100',
            'remarks' => 'around taytay rizal'
		]);

        ServicesVariation::create([
			'service_category_id' => 1,
            'service_id' => 1,
            'variation_name' => 'Cainta',
            'price' => '100',
            'remarks' => ''
		]);

        ServicesVariation::create([
			'service_category_id' => 1,
            'service_id' => 1,
            'variation_name' => 'Antipolo',
            'price' => '100',
            'remarks' => ''
		]);
    }
}
