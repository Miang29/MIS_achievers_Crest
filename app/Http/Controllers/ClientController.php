<?php

namespace App\Http\Controllers;

use App\PetsInformation;
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

	// CLIENT REGISTRATION SAVE
	protected function save(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'first_name' => 'required|min:2|max:255|string',
			'middle_name' => 'nullable|min:2|max:255|string',
			'last_name' => 'required|min:2|max:255|stSring',
			'suffix' => 'nullable|min:2|max:255|string',
			'email' => 'required|unique:users,email|min:2|max:255|email',
			'username' => 'required|unique:users,username|min:2|max:255|string',
			'password' => array('required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]*$/'),
			'checkbox' => 'required'
		], [
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
			->with('flash_success', "Successfully created {$user->getName()}");
	}

	//PET INFORMATION SUBMIT
	protected function submitPet(Request $req)
	{	
		$validator = Validator::make($req->all(), [
			"pet_owner" => 'required|numeric|exists:users,id',
			"pet_name" => 'required|array',
			"pet_name.*" => 'required|string|max:255',
			"breed" => 'required|array',
			"breed.*" => 'required|string|max:255',
			"colors" => 'required|array',
			"colors.*" => 'required|array|max:3',
			"colors.*.*" => 'required|string|max:255',
			"birthdate" => 'required|array',
			"birthdate.*" => 'required|date',
			"species" => 'required|array',
			"species.*" => 'required|string|max:255',
			"gender" => 'required|array',
			"gender.*" => 'required|string|max:255',
			"types" => 'required|array',
			"types.*" => 'required|string|max:255',
			"pet_image.*" => 'max:5120|mimes:jpeg,jpg,png,webp|nullable',
		]);

		// dd($validator->messages());

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		try {
			DB::beginTransaction();

			$colorKeys = array_keys($req->colors);
			for ($i = 0; $i < count($req->pet_name); $i++) {

				$imagename = "";
				if ($req->hasFile("pet_image.$i")) {
					
					$destination = "uploads/clients/$req->pet_owner/pets";
					$fileType = $req->file("pet_image.$i")->getClientOriginalExtension();
					$imagename = strtolower(preg_replace("/s+/", "_", $req->pet_name[$i])) . ".$fileType";
					$req->file("pet_image.$i")->move($destination, $imagename);
				}

				$pi = PetsInformation::create([
					'pet_owner' => $req->pet_owner,
					'pet_name' => $req->pet_name[$i],
					'breed' => $req->breed[$i],
					'colors' => implode	(", ", $req->colors[$i]),
					'birthdate' => $req->birthdate[$i],
					'species' => $req->species[$i],
					'gender' => $req->gender[$i],
					'types' => $req->types[$i],
					'pet_image' => $imagename,

				]);
			}

			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);


			return redirect()
				->route('pet-information.create')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('pet-information')
			->with('flash_success', "Successfully registered!");
			dd();
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
	protected function index()
	{
		$clients = User::select(DB::raw('id, CONCAT(first_name, " ", last_name) as name, email'))
			->where('user_type_id', '=', '4')->get();

		return view('admin.pet-information.index', [
			'clients' => $clients
		]);
	}

	protected function create()
	{
		$user =  User::select(DB::raw('CONCAT(first_name, " ", last_name) as name,id'))->where("user_type_id", "=", 4)->get();
		$pi = PetsInformation::get();

		return view('admin.pet-information.create', [
			'petsinformation' => $pi,
			'users' => $user,
		]);
	}

	protected function add()
	{
		return view('admin.pet-information.pet.add');
	}
	protected function showPets($id)
	{
		$pi = PetsInformation::where('pet_owner', '=', $id)->get();
		return view('admin.pet-information.pet.index', [
			'pets' => $pi,
			'id' => $id
		]);
	}

	protected function editPet($id)
	{
		return view('admin.pet-information.pet.edit');
	}

	protected function notifyClient(Request $req)
	{
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
