<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Carbon\Carbon;

use DB;
use Exception;
use Log;

class AppointmentController extends Controller
{
	protected function index()
	{
		return view('admin.appointment.index');
	}

	protected function create()
	{
		return view('admin.appointment.create');
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

	protected function delete($id) {
		try {
			DB::beginTransaction();

			// Deletion logic goes here...
			if (random_int(0, 1))
				throw new Exception();

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
			->with('flash_success', 'Successfully removed appointment');
	}
}