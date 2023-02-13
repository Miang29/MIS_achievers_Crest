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
			$appointments = $appointments->where('pet_owner', 'LIKE', $search)
				->orWhere('email', 'LIKE', $search);

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


	protected function updateAppointments(Request $req, $id)
	{
		$appointments = Appointments::find($id);

		if ($appointments == null) {
			return redirect()
				->route('appointments.index')
				->with('flash_error', 'Client either does not exists or is already deleted.');
		}

		$validator = Validator::make($req->all(), [

			'pet_owner' => 'required|min:2|max:255|string',
			'pet_name' => 'required|min:2|max:255|string',
			'email' => 'required|min:2|max:255|email',
			'date' => 'required|min:2|max:255|date',
			'time' =>  'required|min:2|max:255|string',
			'service_type' => 'required|unique:users,username|min:2|max:255|string',

		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator);
		}

		try {
			DB::beginTransaction();
			$appointments->pet_owner = $req->pet_owner;
			$appointments->pet_name = $req->pet_name;
			$appointments->email = $req->email;
			$appointments->date = $req->date;
			$appointments->time = $req->time;
			$appointments->service_type = $req->service_type;
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
