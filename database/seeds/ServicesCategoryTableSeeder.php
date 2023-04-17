<?php

use App\ServicesCategory;
use Illuminate\Database\Seeder;

class ServicesCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicesCategory::create([
			'id' => 1,
			'service_category_name' => 'Professional Services'
		]);

        ServicesCategory::create([
			'id' => 2,
			'service_category_name' => 'Breeding and Delivery'
		]);

        ServicesCategory::create([
			'id' => 3,
			'service_category_name' => 'Routine Procedure'
		]);

        ServicesCategory::create([
			'id' => 4,
			'service_category_name' => 'Ethunasia'
		]);

       
        ServicesCategory::create([
			'id' => 5,
			'service_category_name' => 'Laboratory Examination'
		]);

        ServicesCategory::create([
			'id' => 6,
			'service_category_name' => 'Surgery'
		]);

		ServicesCategory::create([
			'id' => 7,
			'service_category_name' => 'Boarding'
		]);
    }
}
