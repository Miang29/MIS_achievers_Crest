<?php

use App\Products;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'category_id'=> '1',
            'product_name' => 'Oreo',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Plain Yogurt',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Adult Grilled Liver Loaf Flavour with Vegetables',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Milk',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '2',
            'product_name' => 'Lace',
            'stocks' => '100',
            'price' => '150',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '2',
            'product_name' => 'Pendant',
            'stocks' => '100',
            'price' => '180',
            'status' => 'active',
            'expired_at' => '2024-12-12',
            'description' => '',
        ]);

    }
}
