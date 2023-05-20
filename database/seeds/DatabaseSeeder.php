<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(SettingsTableSeeder::class);
		$this->call(UserTypesTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(PetsInformationsTableSeeder::class);
		$this->call(ServicesCategoryTableSeeder::class);
		$this->call(ServicesTableSeeder::class);
		$this->call(ServicesVariationTableSeeder::class);
		$this->call(AppointmentsTableSeeder::class);
		$this->call(ProductsCategoryTableSeeder::class);
		$this->call(ProductsTableSeeder::class);
		
	}
}