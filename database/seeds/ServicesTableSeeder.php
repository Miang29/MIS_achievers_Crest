<?php

use App\Services;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
			'service_category_id' => 1,
            'service_name' => 'Home Service'
		]);

        Services::create([
			'service_category_id' => 1,
            'service_name' => 'Consultation'
		]);

           Services::create([
            'service_category_id' => 1,
            'service_name' => 'Vaccination'
        ]);

              Services::create([
            'service_category_id' => 1,
            'service_name' => 'Grooming'
        ]);

        Services::create([
			'service_category_id' => 1,
            'service_name' => 'boarding'
		]);

        Services::create([
			'service_category_id' => 2,
            'service_name' => 'Breeding Assistance (w/o sperm check)'
		]);

        Services::create([
			'service_category_id' => 2,
            'service_name' => 'Normal Delivery'
		]);

        Services::create([
			'service_category_id' => 2,
            'service_name' => 'Extraction of dead fetus'
		]);

        Services::create([
			'service_category_id' => 2,
            'service_name' => 'PF per puppy'
		]);

        Services::create([
			'service_category_id' => 3,
            'service_name' => 'Anal Sac Draining'
		]);

        Services::create([
			'service_category_id' => 3,
            'service_name' => 'Deworming'
		]);

        Services::create([
			'service_category_id' => 3,
            'service_name' => 'Heartworm Prevention (IVC)'
		]);

        
        Services::create([
			'service_category_id' => 4,
            'service_name' => 'Euthanasia for Cat'
		]);

        Services::create([
			'service_category_id' => 4,
            'service_name' => 'Euthanasia for Dog'
		]);

         Services::create([
            'service_category_id' => 7,
            'service_name' => 'Boarding with food'
        ]);

          Services::create([
            'service_category_id' => 7,
            'service_name' => 'Boarding without food'
        ]);
    }
}
