<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;

use App\Appointments;
use App\Services;


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
			$appointments = $appointments->where('pet_owner', 'LIKE', $search)
				->orWhere('email', 'LIKE', $search);

		return view('admin.appointment.index', [
			'appointments' => $appointments->get()
		]);
	}

	protected function create()
	{
		$service = Services::where('service_category_id', '=', 1)->get();

		return view('admin.appointment.create', [
			'services' => $service
		]);
	}

	protected function saveAppointments(Request $req)
	{

		$appointmentNo = strtotime(Carbon::now());

		$validator = Validator::make($req->all(), [
		    'service_id' => 'required|numeric|exists:services,id',
			'appointment_time' => 'required|min:2|max:255|string',
			'reserved_at' =>  'required|min:2|max:255|date',
			'user_id' => 'required|numeric|exists:users,id',
			'pet_information_id' => 'required|numeric|exists:petsInformations,id',
			'breed' => 'required|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
			DB::beginTransaction();

			$appointments = Appointments::create([

				'appointment_no' => $appointmentNo,
				'service_id' => $req->service_id,
				'appointment_time' => $req->appointment_time,
				'reserved_at' => $req->reserved_at,
				'user_id' => $req->user_id,
				'pet_information_id' => $req->pet_information_id,
				'breed' => $req->breed,
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


	protected function updateAppointments(Request $req, $id)
	{
		$appointments = Appointments::find($id);

		if ($appointments == null) {
			return redirect()
				->route('appointments.index')
				->with('flash_error', 'Client either does not exists or is already deleted.');
		}

		$validator = Validator::make($req->all(), [

			'service_id' => 'required|numeric|exists:services,id',
			'appointment_time' => 'required|min:2|max:255|string',
			'reserved_at' =>  'required|min:2|max:255|date',
			'user_id' => 'required|numeric|exists:users,id',
			'pet_information_id' => 'required|numeric|exists:petsInformations,id',
			'breed' => 'required|min:2|max:255|string',

		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator);
		}

		try {
			DB::beginTransaction();
			$appointments->service_id = $req->service_id;
			$appointments->appointment_time = $req->appointment_time;
			$appointments->reserved_at = $req->reserved_at;
			$appointments->user_id = $req->user_id;
			$appointments->pet_information_id = $req->pet_information_id;
			$appointments->breed = $req->breed;
			$appointments->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			if ($appointments == null)
				return redirect()
					->route('appointments.index')
					->with('flash_error', 'Clients already removed. Please refresh your browser if it is still visible.');
		}
		return redirect()
			->route('appointments.index')
			->with('flash_success', 'Successfully updated clients scheduled appointments.');
	}

	protected function edit($id)
	{
		$appointments = Appointments::find($id);

		if (!$appointments)
			return redirect()
				->route('appointments.index')
				->with('flash_error', 'Something went wrong, please try again later');

		return view('admin.appointment.edit', [
			'appointments' => $appointments
		]);
	}

	protected function show($id)
	{
		$appointments = Appointments::find($id);

		if ($appointments == null)
			return redirect()
				->route('appointments.index')
				->route('flash_errors', 'Clients already removed. Please refresh your browser if it is still visible');

		return view('admin.appointment.show', [
			'appointments' => $appointments
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
