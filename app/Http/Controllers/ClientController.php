<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserType;

use Auth;
use DB;
use Exception;
use Hash;
use Log;
use Mail;
use Validator;

class ClientController extends Controller
{
	
	protected function SignUp()
	{

		return view('sign-up');
	}

	protected function save(Request $req)
	{
	$validator = Validator::make($req->all(), [
			'first_name' => 'required|min:2|max:255|string',
			'middle_name' => 'nullable|min:2|max:255|string',
			'last_name' => 'required|min:2|max:255|string',
			'suffix' => 'nullable|min:2|max:255|string',
			'email' => 'required|unique:users,email|min:2|max:255|email',
			'username' => 'required|unique:users,username|min:2|max:255|string',
			'password' => array('required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]*$/'),
			'checkbox' => 'required'
		],[
			'checkbox.required' => 'You need to agree and accept the terms of service and read Privacy policy.',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {
			
			DB::beginTransaction();

			$type = UserType::where('name', '=', 'Client')->first();
			
			$user = User::create([
					'first_name' => $req->first_name,
					'middle_name' => $req->middle_name,
					'last_name' => $req->last_name,
					'suffix' => $req->suffix,
					'email' => $req->email,
					'username' => $req->username,
					'user_type_id' => $type->id,
					'password' => Hash::make($req->password),
					
				],);

			//MAILER SHIT
			Mail::send(
				'layouts.emails.creation',
				[
					'req' => $req,
				],
				function ($mail) use ($user) {
					$mail->to($user->email)
						->from("nano.mis@technical.com") // MIS Nano Vet Clinic
						->subject("Account Created");
				}
			);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('sign-up')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('login')
			->with('flash_success', "Successfully created {$user->getName()} as {$user->userType->name}");
	}

	// TEMP VAR
	private $clients = [
		[
			"id" => 1,
			"name" => "Joseph Polio",
			"email" => "joseph.polio@gmail.com",
			"telephone" => "678-4421",
			"mobile" => "09267789945",
			"address" => "11 Maharlika St. San Francisco Village Muzon Taytay Rizal",
			"type" => "New"
		]
	];

	private $pets = [
		"1" =>	[
			[
				"id" => 1,
				"img" => "aspin_brown.jpg",
				"name" => "Brownie",
				"breed" => "Aspin",
				"species" => "Dog",
				"colors" => ["goldenrod"],
				"birthday" => "2022/05/06",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 2,
				"img" => "aspin_mocha.webp",
				"name" => "Siomai",
				"breed" => "Aspin",
				"species" => "Dog",
				"colors" => ["white", "chocolate"],
				"birthday" => "2021/09/25",
				"gender" => "Female",
				"type" => "tamed"
			],
			[
				"id" => 3,
				"img" => "labrador.jpg",
				"name" => "Siopao",
				"breed" => "Labrador",
				"species" => "Dog",
				"colors" => ["moccasin"],
				"birthday" => "2022/06/17",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 4,
				"img" => "golden_retriever.jpg",
				"name" => "Voodoo",
				"breed" => "Golden Retriever",
				"species" => "Dog",
				"colors" => ["gold"],
				"birthday" => "2020/03/11",
				"gender" => "Female",
				"type" => "tamed"
			],
			[
				"id" => 5,
				"img" => "tabby.jpg",
				"name" => "Oreo",
				"breed" => "Tabby",
				"species" => "Cat",
				"colors" => ["gray", "dimgray", "white"],
				"birthday" => "2021/11/15",
				"gender" => "Male",
				"type" => "tamed"
			],
			[
				"id" => 6,
				"img" => "bombay.jpg",
				"name" => "Kisses",
				"breed" => "Bombay",
				"species" => "Cat",
				"colors" => ["black"],
				"birthday" => "2021/12/15",
				"gender" => "Female",
				"type" => "tamed"

			]
		]
	];

	// CLIENT-PROFILE
	protected function index() {
		return view('admin.clientprofile.index', [
			'clients' => $this->clients,
			'pets' => $this->pets
		]);
	}

	protected function create() {
		return view('admin.clientprofile.create');
	}

	protected function edit() {
		return view('admin.clientprofile.client.edit', [
			'client' => collect([
				"name" => "Joseph Polio",
				"email" => "joseph.polio@gmail.com",
				"telephone" => "678-4421",
				"mobile" => "09267789945",
				"address" => "11 Maharlika St. San Francisco Village Muzon Taytay Rizal",
				"type" => "New"
			])
		]);
	}


	protected function viewClientProfile($id) {
		$client = $this->clients[$id-1];
		
		return view('admin.clientprofile.client.view', [
			'id' => $id,
			'client' => $client
		]);	
	}

	protected function showPets($id) {
		return view('admin.clientprofile.pet.index', [
			'id' => $id,
			'pets' => $this->pets["{$id}"]
		]);
	}

	protected function editPet($id) {
		return view('admin.clientprofile.pet.edit');
		
	}

	protected function notifyClient(Request $req) {
		try {
			DB::beginTransaction();

			// MAILING STUFFS
			if (random_int(0, 100) <= 50)
				throw new Exception();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return response()
				->json([
					'success' => false,
					'title' => 'Something went wrong',
					'message' => '<p class="m-0 text-center">Something went wrong, please try again later</p>'
				]);
		}

		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => '<p class="m-0 text-center">Successfully notified all subscribed clients</p>'
			]);
	}
}
