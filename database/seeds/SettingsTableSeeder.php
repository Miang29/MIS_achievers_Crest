<?php

use Illuminate\Database\Seeder;

use App\Settings;

class SettingsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Settings::create([
			'name' => 'web-logo',
			'value' => 'logo.png',
			'is_file' => 1
		]);

		Settings::create([
			'name' => 'web-name',
			'value' => 'Nano Veterinary Clinic'
		]);

		Settings::create([
			'name' => 'web-desc',
			'value' => 'Management Information System for Nano Veterinary Clinic'
		]);

		Settings::create([
			'name' => 'address',
			'value' => 'Block 3, Lot 3, Unit 5, Glendale Village. Brgy. Dolores, Taytay, Rizal'
		]);

		Settings::create([
			'name' => 'contacts',
			'value' => '8650-1153, +63 948 513 0788'
		]);

		Settings::create([
			'name' => 'email',
			'value' => 'nanovetclinic2015@gmail.com'
		]);

		Settings::create([
			'name' => 'mobile-no',
			'value' => '09267785622'
		]);
	}
}