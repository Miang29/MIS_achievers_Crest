<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\PasswordReset;
use App\User;

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
    protected function forgotPassword(Request $req) {
		return view('password.forgot-password', [
			'email' => $req->e
		]);
	}

	/**
	 * === F  U  C  K    Y  O  U ===
	 */
	protected function fuckYou(Request $req) {
		dd($req);
	}

	/**
	 * Sends an email to notify user that they've requested a password reset
	 */
	protected function sendNotification(Request $req) {

		try {
			DB::beginTransaction();

			$pr = PasswordReset::insert([
				'email' => $req->email,
				'token' => uniqid(),
				'expired_at' => Carbon::now()->addWeek(1),
			]);

			// Mail::send(...etc);

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
	
	protected function newPassword() {
		return view('password.new-password');
		
	}
}; 



 
