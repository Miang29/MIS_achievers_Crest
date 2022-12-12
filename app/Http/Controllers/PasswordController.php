<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\PasswordReset;

use DB;
use Exception;
use Hash;
use Log;
use Validator;
use Mail;

class PasswordController extends Controller
{
	/**
	 * Opens the /forgot-password view
	 */
	protected function forgotPassword(Request $req)
	{
		return view('password.forgot-password', [
			'email' => $req->e
		]);
	}

	/**
	 * === update ===
	 */
	protected function update(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'password' => array('required', 'regex:/([a-z]*)([0-9])*/i', 'min:8', 'confirmed'),
			'password_confirmation' => 'required'
		], [
			'password.required' => 'The new password is required',
			'password.regex' => 'Password must contain at least 1 letter and 1 number',
			'password.min' => 'Password should be at least 8 characters',
			'password.confirmed' => 'You must confirm your password first',
			'password_confirmation.required' => 'You must confirm your password first'
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator);
		}
		
		try {
			DB::beginTransaction();

			$user->password = Hash::make($req->password);
			$user->login_attempts = 0;
			$user->locked = 0;
			$user->locked_by = null;

			//MAILER
			
			Mail::send(

				'layouts.emails.new-password',
				[
					'req' =>$req,
				],
				function($mail) use ($user) {
					$mail->to($user->email)
						->from("nano.mis@technical.com") // MIS Nano Vet Clinic
						->subject("Successfully Changed Password");
				}
			);

			$user->save();
			$pr->delete();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->back()
				->with('flash_error', 'Something went wrong, please try again later.');
		}

		return redirect()
			->route('login')
			->with('flash_success', "Succesfully updated password");
	}

	/**
	 * Sends an email to notify user that they've requested a password reset
	 */
	protected function sendNotification(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'email' => 'required|email|exists:users,email|max:255'
		], [
			'email.required' => 'Please provide the registered email',
			'email.email' => 'Please provide a proper email address',
			'email.exists' => 'Account does not exists',
			'email.max' => 'Please provide a proper email address',
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator);
		}

		try {
			DB::beginTransaction();

			$pr = PasswordReset::insert([
				'email' => $req->email,
				'token' => uniqid(),
				'expired_at' => Carbon::now()->addWeek(1),
			]);

			//MAILER
			Mail::send(
				'layouts.emails.change-password',
				[
					'req' => $req,
				],
				function ($mail) use ($req) {
					$mail->to($req->email)
						->from("nano.mis@technical.com") // MIS Nano Vet Clinic
						->subject("Password Reset Request");
				}
			);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('login')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('login')
			->with('flash_success', 'Successfully sent password reset request.');
	}


	protected function newPassword()
	{
		return view('password.new-password');
	}
};
