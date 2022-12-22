<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;

use App\Appointments;


use Auth;
use DB;
use Exception;
use Hash;
use Log;
use Mail;
use Validator;



class AppointmentController extends Controller
{
	protected function index(Request $req)
	{
		$appointments = Appointments::query();
		$search = "%{$req->search}%";

		if ($req->search)
			$appointments = $appointments->where('pet_owner', 'LIKE', $search);

		return view('admin.appointment.index', [
			'appointments' => $appointments->get()
		]);
	}

	protected function create()
	{
		$appointments = Appointments::get();

		return view('admin.appointment.create', [
			'appointments' => $appointments
		]);
	}

	protected function saveAppointments(Request $req)
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
				->route('appointments.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('appointments.index')
			->with('flash_success', "Successfully added appointments.");
	}



	protected function edit($id, $petId)
	{
		// $appointment = Appointment::find($id);
		return view('admin.appointment.edit', [
			// 'appointment' => $appointment
			// 'appointment' => Appointment::find($id)
			'appointment' => collect([
				'owner' => 'Joseph Polio',
				'email' => 'joseph.polio@gmail.com',
				'pet' => array("Brownie", "Siomai", "Siopao", "Voodoo")[$petId],
				'appointment_schedule' => Carbon::now()->timezone('Asia/Manila'),
			    'service' => 'Consultation'
				])
		]);
	}

	protected function show($id, $petId)
	{
		return view('admin.appointment.show', [
			'appointment' => collect([
				'owner' => 'Joseph Polio',
				'email' => 'joseph.polio@gmail.com',
				'pet' => ["Brownie", "Siomai", "Siopao", "Voodoo"][$petId],
				'appointment_schedule' => Carbon::now()->timezone('Asia/Manila'),
				'service' => 'Consultation'
			])
		]);
	}

	protected function delete($id)
	 {
		$appointments = Appointments::find($id);
		try {
			DB::beginTransaction();

			if (Auth::check())
				$appointments->delete();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('appointments.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('appointments.index')
			->with('flash_success', 'Successfully removed scheduled appointments from table');

	}
}