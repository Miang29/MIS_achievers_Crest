<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ContactInformation;
use App\ClientNotification;
use App\Settings;
use App\UnavailableDate;
use App\Appointments;
use App\User;

use DB;
use Exception;
use File;
use Log;
use Validator;
use Auth;
use Mail;

class SettingsController extends Controller
{
	// COntact-information
	protected function viewMessage($id){

		$contact = ContactInformation::find($id);

		if ($contact == null)

			return redirect()
			->route('settings.index')
			->with('flash_error', 'Message does not exists.');

			{
			try{
				DB::beginTransaction();
				$contact->status = 1;
				$contact->save();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			return redirect()
			->route('settings.index')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('settings.index')
			->with('flash_success', "Message viewed");
		}

	}

	protected function messageResponse($id) {
		$user = Auth::user();
		$contacts = ContactInformation::find($id);
		return view('contact-information.message_response',[
		'contacts' => $contacts,
		'id' => $id,
		'user' => $user
		]);
	}

	protected function contactShow($id) {
		$contacts = ContactInformation::find($id);
		return view('contact-information.contact_show',[
		'contacts' => $contacts,
		'id' => $id
		]);
	}

	//SETTINGS 
	protected function settings() {
		$contact = ContactInformation::get();
		$client = User::where('user_type_id','=', 4)->get();
		$unavailableDates = UnavailableDate::get();
		
		return view('admin.settings.index', [
			'contacts' => $contact,
			'client' => $client,
			'unavailableDates' => $unavailableDates
		]);
	}

	protected function update(Request $req) {
		$validator = Validator::make($req->all(), [
			'web-name' => 'required|string|max:255',
			'web-desc' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'contact' => 'string|max:255',
			'email' => 'string|max:255',
			'web-logo' => 'max:5120|mimes:jpeg,jpg,png,webp|nullable',
			'mobile-no' => 'required|string|max:11',
		], [
			'web-name.required' => 'Website Name is required',
			'web-name.string' => 'Website Name should be a string of characters',
			'web-name.max' => 'Website Name should not exceed 255 characters',
			'web-desc.required' => 'Website Description is required',
			'web-desc.string' => 'Website Description should be a string of characters',
			'web-desc.max' => 'Website Description should not exceed 255 characters',
			'address.required' => 'Address is required',
			'address.string' => 'Address should be a string of characters',
			'address.max' => 'Address should not exceed 255 characters',
			'contact.string' => 'Contact should be a string of characters',
			'contact.max' => 'Contact should not exceed 255 characters',
			'email.required' => 'The email is required',
			// 'email.*.email' => 'Invalid email address',
			// 'email.*.string' => 'Inavlid email address',
			'email.max' => 'Emails must not exceed 255 characters',
			'web-logo.max' => 'Image should be below 5MB',
			'web-logo.mimes' => 'Selected file doesn\'t match the allowed image formats',
			'mobile-no' => 'Mobile No is required',
		]);


		if ($validator->fails())
			return redirect()
				->back()
				->withInput()
				->withErrors($validator);

		try {
			DB::beginTransaction();

			foreach ($req->except('_token') as $key => $v) {
				if ($key == 'contacts' || $key == 'emails') {
					$v = implode(', ', $v);
				}
				// LOGO HANDLIMG
				else if ($key == 'web-logo') {
					if ($req->hasFile($key)) {
						$setting = Settings::where('name', '=', $key)->first();

						if ($setting->value != 'logo.png')
							File::delete(public_path() . "/uploads/settings/{$setting->value}");
						
						$destination = "uploads/settings";
						$fileType = $req->file($key)->getClientOriginalExtension();
						$v = "favicon.{$fileType}";
						$req->file($key)->move($destination, $v);
					}
					else
						continue;
				}
				// logo handling end

				$setting = Settings::where('name', '=', $key)->first();

				if ($setting == null) {
					$setting = Settings::create([
						'name' => $key,
						'value' => ($v == null ? 'null' : $v)
					]);
				}
				else {
					$setting->value = $v;
					$setting->save();
				}
			}

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->back()
				->withInput()
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->back()
			->with('flash_success', 'Successfully updated settings');
	}

	protected function removeLogo(Request $req) {
		$success = true;
		$message = "Successfully removed and reset the logo of the website";
		$image = "";

		try {
			DB::beginTransaction();

			$setting = Settings::where('name', '=', "web-logo")->first();
			if ($setting->value != 'logo.png')
				File::delete(public_path() . "/uploads/settings/{$setting->value}");
			
			$destination = "uploads/settings";
			$fileType = "png";
			$v = "logo.{$fileType}";

			$image = asset("{$destination}/{$v}");

			$setting->value = $v;
			$setting->save();
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			$success = false;
			$message = "Something went wrong, please try again later";
		}

		return response()
			->json([
				'success' => $success,
				'message' => $message,
				'image' => $image
			]);
	}

	// UNAVAILABLE DATES
	protected function unavailableDatesCreate(Request $req) {
		$time = Appointments::getAppointmentTimes();
		return view('admin.settings.unavailable-dates.create',[
			'time' => $time,
		]);
	}

	protected function unavailableDatesSubmit(Request $req){

		$validator = Validator::make($req->all(), [
		    'date' =>'required|min:1|max:255|string',
			'time' => 'required|min:1|max:255|string',

			]);

			if ($validator->fails()) {

				return redirect()
					->back()
					->withErrors($validator)
					->withInput();
				}

				try {
				DB::beginTransaction();
				UnavailableDate::create([
					'date' => $req->date,
					'time' => $req->time,
				]);


				DB::commit();
			} catch (Exception $e) {
				DB::rollback();
				Log::error($e);
				return redirect()
					->route('settings.index')
					->with('flash_error', 'Something went wrong, please try again later');
			}

			return redirect()
				->route('settings.index')
				->with('flash_success', "Successfully set unavailable date and time");
		}

	}