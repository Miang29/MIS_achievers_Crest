<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;

use App\Appointments;
use App\Services;
use App\User;
use App\PetsInformation;

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
			$appointments = $appointments->where('user_id', 'LIKE', $search);

		$appointment = Appointments::has('petsInformations', '>', 0)->with('petsInformations','petsInformations.user')->get();
		return view('admin.appointment.index', [
			'appointments' => $appointments->get()
		]);
	}


	protected function acceptAppointment(Request $req, $id)
	{

		$appointment = Appointments::find($id);

		if ($appointment == null)

			return redirect()
			->route('appointments.index')
			->with('flash_error', 'Appointment does not exists.');
		
		{
			try{
				DB::beginTransaction();
				$appointment->status = 1;
				$appointment->save();

				//MAILER
			Mail::send(
				'admin.appointment.mail.accepted_mail',
				[
					'appointment' => $appointment,
				],
				function ($mail) use ($appointment) {
					$mail->to($appointment->petsInformations->user->email)
						->from("nano.mis@technical.com")
						->subject("Appointment Accepted");
				}
			);

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
			->with('flash_success', "Successfully accepted appointment.");
		}
	
	}

	protected function reason($id)
	{
		$appointment = Appointments::find($id);
		return view('admin.appointment.reason',[
			'appointment' => $appointment,
			'id' => $id
		]);
	}

	protected function rejectAppointment(Request $req, $id)
	{

		$appointment = Appointments::find($id);
		if ($appointment == null)
			return redirect()
			->route('appointments.index')
			->with('flash_error', 'Appointment does not exists.');
	{
		try{
				DB::beginTransaction();
				$appointment->status = 2;
				$appointment->reason = $req->reason;
				$appointment->save();

				//MAILER
				Mail::send(
				'admin.appointment.mail.rejected_mail',
				[
					'appointment' => $appointment,
				],
				function ($mail) use ($appointment) {
					$mail->to($appointment->petsInformations->user->email)
						->from("nano.mis@technical.com")
						->subject("Appointment Rejected");
				}
			);

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
			->with('flash_success', "Successfully rejected appointment.");
		}
	}

	protected function create()
	{
		$client = Auth()->user();
		$pets = $client->petsInformations;
		$appointmentTimes = Appointments::getAppointmentTimes();
		$service = Services::where('service_category_id', '=', 1)->get();
		$user = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		$appointment = Appointments::get();
		return view('admin.appointment.create', [
			'services' => $service,
			'user' => $user,
			'appointment' => $appointment,
			'appointmentTime' => $appointmentTimes,
			'pets' => $pets,
			'client' => $client
		]);


	}

	protected function saveAppointments(Request $req)
	{
		$appointmentNo = strtotime(Carbon::now());

		$validator = Validator::make($req->all(), [
		    'service_id' => 'required|numeric|exists:services,id',
			'appointment_time' => 'required|min:1|max:255|string',
			'reserved_at' =>  'required|min:2|max:255|date',
			'user_id' => 'required|numeric|exists:users,id',
			'pet_information_id' => 'required|numeric|exists:pets_informations,id',
		]);

		if ($validator->fails()) {

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		try {
			DB::beginTransaction();

			$appointment = Appointments::create([
				'appointment_no' => $appointmentNo,
				'service_id' => $req->service_id,
				'appointment_time' => $req->appointment_time,
				'reserved_at' => $req->reserved_at,
				'user_id' => $req->user_id,
				'pet_information_id' => $req->pet_information_id,
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
			'appointment_time' => 'required|min:1|max:255|string',
			'reserved_at' =>  'required|min:1|max:255|date',
			'user_id' => 'required|numeric|exists:users,id',
			'pet_information_id' => 'required|numeric|exists:pets_informations,id',
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
			$appointments->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			if ($appointments == null)
				return redirect()
					->route('appointments.index')
					->with('flash_error', 'Please refresh your browser if appointment still visible.');
		}
		return redirect()
			->route('appointments.index')
			->with('flash_success', 'Successfully updated clients scheduled appointments.');
	}

	protected function edit($id)
	{

		
		$appointmentTimes = Appointments::getAppointmentTimes();
		$service = Services::where('service_category_id', '=', 1)->get();
		// $user = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		$appointment = Appointments::find($id);
		return view('admin.appointment.edit',[
			'services' => $service,
			'appointment' => $appointment,
			'id' => $id,
			'appointmentTime' => $appointmentTimes,
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
}
