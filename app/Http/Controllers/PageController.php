<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;
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

			array_push(
				$monthly_earnings,
				// SalesOrder::where('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				// 	->where('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				// 	->where('status', '>=', '3')
				// 	->get()
				// 	->sum('price')
				random_int(0, 10000)
			);
		}

		return view('admin.dashboard', [
			'months' => $months,
			'monthly_earnings' => $monthly_earnings
		]);
	}


	// CLIENT PANEL

	protected function user() {
		return view('home');
	}

	protected function aboutUs() {
		return view('about-us');
	}

	protected function contactUs() {
		return view('contact-us');
	}

	protected function privacyPolicy() {
		return view('privacy-policy');
	}

	protected function termsOfService() {
		return view('terms-of-service');
	}

	protected function dateSched()
	{

		$appointments = Appointments::get();

		return view('client-appointment.date-scheduler', [
			'appointments' => $appointments
		]);
	}

	
	protected function appointmentsCreate()
	{
		return view('client-appointment.appointment-form');
	}

	protected function submitAppointments(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'pet_owner' => 'required|min:2|max:255|string',
			'pet_name' => 'required|min:2|max:255|string',
			'email' => 'required|min:2|max:255|email',
			'date' => 'required|min:2|max:255|date',
			'time' =>  'required|min:2|max:255|string',
			'service_type' => 'required|unique:users,username|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
			DB::beginTransaction();

			$appointments = Appointments::create([
				'pet_owner' => $req->pet_owner,
				'pet_name' => $req->pet_name,
				'email' => $req->email,
				'date' => $req->date,
				'time' => $req->time,
				'service_type' => $req->service_type,
			]);


			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('home')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('home')
			->with('flash_success', "Successfully added appointments.");
	}

	protected function ServicesOffer()
	{
		return view('services');
	}

};
