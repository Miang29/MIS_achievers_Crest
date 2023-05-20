<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;
use App\PetsInformation;
use App\ContactInformation;
use App\User;
use App\Products;
use App\ConsultationTransaction;
use App\VaccinationTransaction;
use App\GroomingTransaction;
use App\BoardingTransaction;
use App\OtherTransation;
use App\ProductsOrderTransactionItem;
use App\ProductsOrderTransaction;
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

		$consultation = ConsultationTransaction::sum('total');
		$vaccination = VaccinationTransaction::sum('price');
		$grooming = GroomingTransaction::sum('price');
		$boarding = BoardingTransaction::sum('price');
		$otherTransaction = OtherTransation::sum('price');
		$productsOrder = ProductsOrderTransactionItem::sum('total');

		$sales = ($consultation + $vaccination + $grooming + $boarding + $otherTransaction + $productsOrder);
		$products = Products::sum('stocks');
		$patient = PetsInformation::get();
		$clients = User::where('user_type_id','=', 4)->count();
		
		$inventory = Products::where('stocks', '<=', 10)->get();
		
		return view('admin.dashboard', [
			'months' => $months,
			'monthly_earnings' => $monthly_earnings,
			'patients' => $patient,
			'client' => $clients,
			'products' => $products,
			'sales' => $sales,
			'inventory' => $inventory
		]);
	}


	// CLIENT PANEL

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
		return view('contact-information.contact-us');
	}


	protected function submit(Request $req) {
		
		$validator = Validator::make($req->all(), [
			'client_name' => 'required|min:2|max:255|string',
			'email' => 'required|min:2|max:255|email',
			'mobile_no' => 'required|min:10|max:255|string',
			'message' => 'nullable|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
			DB::beginTransaction();

			$contact = ContactInformation::create([
				'client_name' => $req->client_name,
				'email' => $req->email,
				'mobile_no' => $req->mobile_no,
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


