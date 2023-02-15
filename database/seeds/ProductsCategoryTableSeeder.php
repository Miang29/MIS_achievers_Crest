<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create([
			'id' => 1,
			'category_name' => 'Pet Food'
		]);

        ProductCategory::create([
			'id' => 2,
			'category_name' => 'Accessories'
		]);

        ProductCategory::create([
			'id' => 3,
			'category_name' => 'Medicine'
		]);

        ProductCategory::create([
			'id' => 4,
			'category_name' => 'Vaccine'
		]);
    }
}
