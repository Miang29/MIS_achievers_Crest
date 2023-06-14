<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PetsInformation;
use App\User;
use App\UserType;
use App\ColorSetting;

use DB;
use Exception;
use File;
use Hash;
use Log;
use PDF;
use Validator;


class ClientController extends Controller 
{ 

	// -------------------- PET INFORMATION INDEX -----------------=----- //
	protected function index(Request $req)
	{

		$clients = User::select(DB::raw('id, CONCAT(first_name, " ", last_name) as name, email'));
		$search = "%{$req->search}%";

		if ($req->search) {
			$clients = $clients->where('first_name', 'LIKE', $search)
				->orWhere('last_name','LIKE', $search);
		}

		$clients = $clients->has('petsInformations', '>', 0)
			->where('user_type_id', '=', '4')
			->get();

		return view('admin.pet-information.index', [
			'clients' => $clients
		]);
	}
	// -------------- HISTORY INDEX ------------------ //
	protected function petHistory($id)
	{
		$pi = PetsInformation::find($id);
		
		return view('admin.pet-information.pet.history', [
			'pet' => $pi,
			'id' => $id,
		]);
	}

	protected function printHistory(Request $req, $id) {
		$petInfo = PetsInformation::find($id);
		$output = $req->output;

		return view('admin.pet-information.pet.print_history', [
			'output' => $output,
			'pet' => $petInfo
		]);
	}

	// -------------- SIGN UP INDEX ------------------ //
	protected function SignUp()
	{
		return view('sign-up');
	}
	// ------------------ CREATE PET INFORMATION -------------------------- //
	protected function create()
	{
		$color= ColorSetting::get();
		$user =  User::select(DB::raw('CONCAT(first_name, " ", last_name) as name,id'))->where("user_type_id", "=", 4)->get();
		$pi = PetsInformation::get();

		return view('admin.pet-information.create', [
			'PetsInformation' => $pi,
			'users' => $user,
			'color' => $color
		]);
	}
    // -------------------- ADD NEW PET ----------------------- //
	protected function add($id)
	{
		$color= ColorSetting::get();
		$pi = PetsInformation::get();
		return view(
			'admin.pet-information.pet.add',
			[
				'PetsInformation' => $pi,
				'id' => $id,
				'color' => $color
			]
		);
	}
	// ------------------ SHOW PET INFORMATION ----------------- //
	protected function showPets(Request $req, $id)
	{

		$pets = PetsInformation::where('pet_owner', '=', $id);
		$search = "%{$req->search}%";

		if ($req->search) {
			$pets = $pets->where('pet_name', 'LIKE', $search)
				->orWhere('breed','LIKE', $search);
		}

		return view('admin.pet-information.pet.index', [
			'pets' => $pets->get(),
			'id' => $id
		]);
	}
 // ------------------ EDIT PET INFORMATION --------------------- //
	protected function editPet($clientId, $id)
	{
		$color= ColorSetting::get();
		$pet = PetsInformation::find($id);
		return view(
			'admin.pet-information.pet.edit', [
				'clientId' => $clientId,
				'pet' => $pet,
				'color' => $color
			]
		);
	}

	//---------------- CLIENT REGISTRATION SAVE ------------------- //
	protected function save(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'first_name' => 'required|min:2|max:255|string',
			'middle_name' => 'nullable|min:2|max:255|string',
			'last_name' => 'required|min:2|max:255|string',
			'suffix' => 'nullable|min:2|max:255|string',
			'email' => 'required|unique:users,email|min:2|max:255|email',
			'address' => 'nullable|min:2|max:255',
			'gender' => 'required|min:2|max:255|string',
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
				'address' => $req->address,
				'gender' => $req->gender,
				'username' => $req->username,
				'user_type_id' => $type->id,
				'password' => Hash::make($req->password),
			]);
			
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
			->with('flash_success', "Your account has successfully created");
	}
	// ---------=----------- PET INFORMATION SUBMIT ------------------------- //
	protected function submitPet(Request $req)
	{
		$validator = Validator::make($req->all(), [
			"pet_owner" => 'required|numeric|exists:users,id',
			"pet_name" => 'required|array',
			"pet_name.*" => 'required|max:255|string',
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
			"traits" => 'required|array',
			"traits.*" => 'required|string|max:255',
			"pet_status" => 'required|array',
			"pet_status.*" => 'required|string|max:255',
			"lifespan" => 'required|array',
			"lifespan.*" => 'required|string|max:255',
			"pet_image.*" => 'max:5120|mimes:jpeg,jpg,png,webp|nullable',
		], [
			'pet_owner.required' => 'Please select client name.',
			'pet_name.*.required' => 'Pet name is required.',
			'breed.*.required' => 'Breed is required',
			'colors.*.required' => 'Please select pet color.',
			'birthdate.*.required' => 'Birthdate is required',
			'species.*.required' => 'Please select a species',
			'gender.*.required' => 'Please select a gender ',
			'types.*.required' => 'Please select a type.',

		]);
	
		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$colorKeys = array_keys($req->colors);
			// dd($colorKeys);
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
					'colors' => implode(", ", $req->colors[$i]),
					'birthdate' => $req->birthdate[$i],
					'species' => $req->species[$i],
					'gender' => $req->gender[$i],
					'types' => $req->types[$i],
					'traits' => $req->traits[$i],
					'pet_status' => $req->pet_status[$i],
					'lifespan' => $req->lifespan[$i],
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
	}
	// ----------------- ADD/REGISTER NEW PET ------------------- //
	protected function addPet(Request $req, $id)
	{
		// dd($req);
		$validator = Validator::make($req->all(), [
			"pet_name" => 'required|string|max:255',
			"birthdate" => 'required|string|max:255',
			"breed" => 'required|string|max:255',
			"colors" => 'required|array|max:3',
			"species" => 'required|string|max:255',
			"gender" => 'required|string|max:255',
			"types" => 'required|string|max:255',
			"traits" => 'required|string|max:255',
			"pet_status" => 'required|string|max:255',
			"lifespan" => 'required|string|max:255',
			"pet_image" => 'max:5120|mimes:jpeg,jpg,png,webp|nullable',
		], [

			'pet_name.required' => 'Pet name is required.',
			'breed.required' => 'Breed is required',
			'colors.required' => 'Please select pet color.',
			'birthdate.required' => 'Birthdate is required',
			'species.required' => 'Please select a species',
			'gender.required' => 'Please select a gender ',
			'types.required' => 'Please select a type.',
		]);
		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$colors = implode(', ', $req->colors);
			$imagename = "";
			if ($req->hasFile("pet_image")) {

				$destination = "uploads/clients/$id/pets";
				$fileType = $req->file("pet_image")->getClientOriginalExtension();
				$imagename = strtolower(preg_replace("/s+/", "_", $req->pet_name)) . ".$fileType";
				$req->file("pet_image")->move($destination, $imagename);
			}
			$pi = PetsInformation::create([
				'pet_owner' => $id,
				'pet_name' => $req->pet_name,
				'breed' => $req->breed,
				'colors' => $colors,
				'birthdate' => $req->birthdate,
				'species' => $req->species,
				'gender' => $req->gender,
				'types' => $req->types,
				'traits' => $req->types,
				'pet_status' => $req->types,
				'types' => $req->types,
				'lifespan' => $imagename,
			]);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('pet-information')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('pet-information')
			->with('flash_success', "Added a pet successfully!");
	}
    // ----------------------- UPDATE PET INFORMATION ------------------------- //
	protected function updatePet(Request $req, $clientId, $id)
	{
		// dd($req);
		$pi = PetsInformation::find($id);
		if ($pi == null) {
			return redirect()
				->back()
				->route('pet-information')
				->with('flash_error', "No such pet information exists");
		}
		$validator = Validator::make($req->all(), [
			"pet_name" => 'required|string|max:255',
			"birthdate" => 'required|string|max:255',
			"breed" => 'required|string|max:255',
			"colors" => 'required|array|max:3',
			"species" => 'required|string|max:255',
			"gender" => 'required|string|max:255',
			"types" => 'required|string|max:255',
			"traits" => 'required|string|max:255',
			"pet_status" => 'required|string|max:255',
			"lifespan" => 'required|string|max:255',
			"pet_image" => 'max:5120|mimes:jpeg,jpg,png,webp|nullable',
		]);
		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$colors = implode(', ', $req->colors);
			$imagename = "";
			if ($req->hasFile("pet_image")) {
				if ($pi->pet_image != null)
					File::delete(public_path() . "/uploads/clients/{$clientId}/pets/{$pi->pet_image}");

				$destination = "uploads/clients/$clientId/pets";
				$fileType = $req->file("pet_image")->getClientOriginalExtension();
				$imagename = strtolower(preg_replace("/s+/", "_", $req->pet_name)) . ".$fileType";
				$req->file("pet_image")->move($destination, $imagename);
				
				$pi->pet_image = $imagename;
			}
			$pi->pet_owner = $clientId;
			$pi->pet_name = $req->pet_name;
			$pi->birthdate = $req->birthdate;
			$pi->breed = $req->breed;
			$pi->colors = $colors;
			$pi->species = $req->species;
			$pi->gender = $req->gender;
			$pi->types = $req->types;
			$pi->traits = $req->traits;
			$pi->pet_status = $req->pet_status;
			$pi->lifespan = $req->lifespan;
			$pi->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('pet-information')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('pet-information', [$clientId])
			->with('flash_success', "Pet Information has been updated successfully");
	}

	protected function archiveIndex(){

		$pet = PetsInformation::onlyTrashed()->get();
		return view('admin.pet-information.pet.archive',[
			'pets' => $pet,
		]);
	}

	protected function delete($id) {

		$pets = PetsInformation::find($id);

		if ($pets == null) {
			return redirect()
			->route('pet-information')
			->with('flash_error','Pet does not exists');
			}

			try{
				DB::beginTransaction();
				$pets->delete();
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('pet-information')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('pet-information')
			->with('flash_success', "Successfully archived pet information");
	}


	protected function restore($id){

		$petsInformation = PetsInformation::withTrashed()->find($id);

		if ($petsInformation == null) {
			return redirect()
			->route('pet-information')
			->with('flash_error','Pet does not exists');
			}

			try{
				DB::beginTransaction();
				$petsInformation->restore();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('pet-information')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('pet-information')
			->with('flash_success', "Successfully restored pet information");
	}
	
}
