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
			'category_name' => 'Pet Food',
			'is_perishable' => 1
		]);

        ProductCategory::create([
			'id' => 2,
			'category_name' => 'Accessories',
			'is_perishable' => 0
		]);

        ProductCategory::create([
			'id' => 3,
			'category_name' => 'Medicine',
			'is_perishable' => 0
		]);
		
    }
}
