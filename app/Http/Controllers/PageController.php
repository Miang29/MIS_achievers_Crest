<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;
use App\BoardingTransaction;
use App\ConsultationTransaction;
use App\ContactInformation;
use App\GroomingTransaction;
use App\OtherTransation;
use App\PetsInformation;
use App\Products;
use App\ProductsOrderTransaction;
use App\ProductsOrderTransactionItem;
use App\User;
use App\VaccinationTransaction;
use App\ColorSetting;

use Carbon\Carbon;

use Auth;
use DB;
use Exception;
use Hash;
use Log;
use Mail;
use Validator;

class PageController extends Controller
{

	// DASH BOARD
	protected function redirectDashboard()
	{
       if (Auth::user()->user_type_id == 4)
	    return redirect()->back();
		
		return redirect()->route('dashboard');
	}

	protected function dashboard()
	{
		if (Auth::user()->user_type_id == 4)
	    return redirect()->back();
		
		$months = array();
		$monthly_earnings = array();

		for ($i = 1; $i <= Carbon::now()->format('m'); $i++) {
			array_push($months, Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-' . Carbon::now()->format('d'))->format('M'));

			$consultationA = ConsultationTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('total');

			$vaccinationA = VaccinationTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('price');


			$groomingA = GroomingTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('price');


			$boardingA = BoardingTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('price');


			$otherTransactionA = OtherTransation::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('price');

			$productsOrder = ProductsOrderTransactionItem::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				->get()
				->sum('total');


			array_push($monthly_earnings, ($consultationA + $vaccinationA + $groomingA + $boardingA + $otherTransactionA + $productsOrder));
		}

		$consultation = ConsultationTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('total');
		$vaccination = VaccinationTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('price');
		$grooming = GroomingTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('price');
		$boarding = BoardingTransaction::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('price');
		$otherTransaction = OtherTransation::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('price');
		$productsOrder = ProductsOrderTransactionItem::whereDate('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-01-01'))
				->whereDate('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-12-31'))
				->get()
				->sum('total');

		$sales = ($consultation + $vaccination + $grooming + $boarding + $otherTransaction + $productsOrder);
		$products = Products::sum('stocks');
		$patient = PetsInformation::get();
		$clients = User::where('user_type_id','=', 4)->count();
		
		$inventory = Products::where('stocks', '<=', 10)->get();
		$appointments = Appointments::where('status', '=', 0)->get();
		$unreadMessages = ContactInformation::where('status', '=', 0)->get();

		$quickActions = array(
			array(
				'text' => 'Notify Client',
				'href' => route('notify-client')
			),
			array(
				'text' => 'Register a Pet',
				'href' => route('pet-information.create')
			),
			array(
				'text' => 'Book an Appointment',
				'href' => route('appointments.create')
			),
			array(
				'text' => 'Sign Out',
				'href' => route('logout')
			),
		);

		return view('admin.dashboard', [
			'months' => $months,
			'monthly_earnings' => $monthly_earnings,
			'patients' => $patient,
			'client' => $clients,
			'products' => $products,
			'sales' => $sales,
			'inventory' => $inventory,
			'appointments' => $appointments,
			'unreadMessages' => $unreadMessages,
			'quickActions' => $quickActions
		]);
	}


	// CLIENT PANEL

	protected function registerPets($id) {

		$color= ColorSetting::get();
		$user = User::find($id);
		return view('pet_registration.register_pet',[
			'user' => $user,
			'color' => $color
		]);
	}

	protected function submitPetInfo(Request $req, $id)
	{
		$user = User::find($id);
		// dd($user);

		if ($user == null){
			return redirect()
			->route('pets.registration')
			->with('flash_error', 'User either does not exists or is already deleted.');
		}

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
				->route('pets.registration',[$user->id])
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('home')
			->with('flash_success', "Successfully registered!");
	}

	protected function petsProfile($id) {

		$pets = PetsInformation::where('pet_owner', '=', $id)->get();
		return view('pet_registration.pet_information',[
			'pets' => $pets,
			'id' => $id

		]);
	}

	protected function user() {
		return view('home');
	}

	protected function aboutUs() {
		return view('about-us');
	}

	protected function privacyPolicy() {
		return view('privacy-policy');
	}

	protected function termsOfService() {
		return view('terms-of-service');
	}

	protected function ServicesOffer()
	{
		return view('services');
	}

	protected function contactUs() {
		$user = Auth::user();
		return view('contact-information.contact-us',[
			'user' => $user,
		]);
	}


	protected function submit(Request $req) {
		
		$validator = Validator::make($req->all(), [
			'name' => 'required|min:2|max:255|string',
			'email' => 'required|min:2|max:255|email',
			'mobile' => 'required|min:10|max:255|string',
			'message' => 'required|min:2|max:255|string',
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		try {
			DB::beginTransaction();

			$contact = ContactInformation::create([
				'client_name' => $req->name,
				'email' => $req->email,
				'mobile_no' => $req->mobile,
				'message' => $req->message,
			]);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('contact-us')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('home')
			->with('flash_success', "Message successfully sent");
	}
};
