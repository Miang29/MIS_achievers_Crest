<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointments;
use App\PetsInformation;
use App\Services;

use DB;
use Exception;
use Log;
use Validator;

class ClientAppointmentController extends Controller
{
	protected function index(Request $req) {
		$services = Services::where('service_category_id', '=', 1)
			->get();

		// If `service` or `reserved_at` is present in the session storage...
		$service = session('service');
		$reserved_at = session('reserved_at');
		if (isset($service) || isset($reserved_at)) {
			session([
				'_old_input.service' => $service,
				'_old_input.reserved_at' => $reserved_at,
				'_old_input.isFromIndex' => 1,
			]);

			session()->forget([
				'service',
				'reserved_at',
				'isFromIndex',
			]);
		}
		else {
			session()->forget([
				'_old_input.service',
				'_old_input.reserved_at',
				'_old_input.isFromIndex',
			]);
		}

		return view('client-appointment.index', [
			'services' => $services
		]);
	}

	
	protected function create(Request $req) {
		$isFromIndex = $req->has('isFromIndex') ? $req->isFromIndex : 0;
		if ($isFromIndex == 1) {
			$validator = Validator::make($req->all(), [
				"service" => "required|numeric|exists:services,id",
				"reserved_at" => "required|date|after_or_equal:today"
			], [
				"service.required" => "Please select a service to avail",
				"service.numeric" => "Please refrain from modifying the form",
				"service.exists" => "Please re-select the service",
				"reserved_at.required" => "Please select a date to reserve your appointment at",
				"reserved_at.date" => "Please refrain from modifying the form",
				"reserved_at.after_or_equal" => "Please set your appointment date to today or after today",
			]);

			if ($validator->fails()) {
				return redirect()
					->back()
					->withInput()
					->withErrors($validator);
			}

			// Temporary Storage
			session([
				'service' => $req->service,
				'reserved_at' => $req->reserved_at
			]);
		}
		else if (!isset($isFromIndex) || $isFromIndex == 0) {
			return redirect()
				->route('client.appointment.index');
		}

		$user = auth()->user();
		$pets = $user->petsInformations;
		$appointmentTimes = Appointments::getAppointmentTimes();
		$service_name = Services::find($req->service)->service_name;

		return view('client-appointment.create', [
			'user' => $user,
			'pets' => $pets,
			'appointmentTimes' => $appointmentTimes,
			'service_name' => $service_name
		]);
	}

	protected function store(Request $req) {
		$validator = Validator::make($req->all(), [
			"service" => "required|numeric|exists:services,id",
			"reserved_at" => "required|date|after_or_equal:today",
			"reserved_at_time" => "required|numeric|between:1,5",
			"owner_name" => "required|string|between:2,255",
			"pet_name" => "required|string|between:2,255",
			"breed" => "required|string|between:2,255",
		]);

		if ($validator->fails()) {
			session(['isFromIndex' => 'true']);

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}

		try {
			DB::beginTransaction();

			session()->forget([
				'isFromIndex',
				'service',
				'reserved_at'
			]);

			$petInfo = PetsInformation::firstOrCreate([
				'pet_owner' => auth()->user()->id,
				'pet_name' => $req->pet_name,
				'breed' => $req->breed,
			]);

			$appointments = Appointments::create([
				'appointment_no' => strtotime('now'),
				'service_id' => $req->service,
				'appointment_time' => $req->reserved_at_time,
				'reserved_at' => $req->reserved_at,
				'user_id' => $petInfo->pet_owner,
				'pet_information_id' => $petInfo->id
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
}