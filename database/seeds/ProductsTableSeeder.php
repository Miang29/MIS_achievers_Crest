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
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Plain Yogurt',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Adult Grilled Liver Loaf Flavour with Vegetables',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '1',
            'product_name' => 'Milk',
            'stocks' => '100',
            'price' => '100',
            'status' => 'active',
            'description' => 'Dog Food',
        ]);

        Products::create([
            'category_id'=> '2',
            'product_name' => 'Lace',
            'stocks' => '100',
            'price' => '150',
            'status' => 'active',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '2',
            'product_name' => 'Pendant',
            'stocks' => '100',
            'price' => '180',
            'status' => 'active',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '3',
            'product_name' => 'Antiparasitics',
            'stocks' => '1000',
            'price' => '1050',
            'status' => 'active',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '3',
            'product_name' => 'Steroids',
            'stocks' => '1000',
            'price' => '170',
            'status' => 'active',
            'description' => '',
        ]);

        Products::create([
            'category_id'=> '3',
            'product_name' => 'Antibiotics',
            'stocks' => '400',
            'price' => '100',
            'status' => 'active',
            'description' => '',
        ]);

    }
}
