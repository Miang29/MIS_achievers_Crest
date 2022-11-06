<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;
use DB;
use Exception;
use Log;
use Validator;
use Hash;

class UserController extends Controller
{
	// AUTHENTICATION
	protected function login() {
		return view('login');
	}

	protected function authenticate(Request $req) {
        $user = User::where('username', '=', $req->username)->first();

		if ($user == null)
			return redirect()
				->back()
				->with('flash_error', 'Wrong username/password!');

		$authenticated = false;
		if (!$user->locked) {
			$authenticated = Auth::attempt([
				'username' => $req->username,
				'password' => $req->password
			]);
		}
		
		if ($authenticated) {
			if ($user) {
				try {
					DB::beginTransaction();
			
					$user->login_attempts = 0;
					$user->save();
			
					DB::commit();
				} catch (Exception $e) {
					DB::rollback();
					Log::error($e);
				}
			}

			return redirect()
				->intended(route('dashboard'))
				->with('flash_success', 'Logged In!');
		}
		else {
			if ($user) {
				try {
					DB::beginTransaction();

					if ($user->login_attempts < 5) {
						$user->login_attempts = $user->login_attempts + 1;
						$msg = 'Wrong username/password!';
					}
					else {
						if ($user->locked == 0) {
							// DO THE MAILING HERE. THIS IS TO SEND AN EMAIL ONLY ONCE
						}

						$user->locked = 1;
						$user->locked_by = User::getIP();
						$msg = 'Exceeded 5 tries, account locked';
					}
					$user->save();
					
					DB::commit();
				} catch (Exception $e) {
					DB::rollback();
					Log::error($e);
				}
			}

			auth()->logout();
			return redirect()
				->back()
				->with('flash_error', $msg)
				->withInput(array('username' => $req->username));
		}
    }

    protected function logout() {
    	if (Auth::check()) {
			auth()->logout();
			return redirect(route('home'))->with('flash_success', 'Logged out!');
		}
		return redirect()->route('admin.dashboard')->with('flash_error', 'Something went wrong, please try again.');
    }

	protected function userAccount() {
		return view('admin.useraccount.index');
	}

	protected function createuserAccount() {
		return view('admin.useraccount.create');
	}
	
	protected function edituserAccount() {
		return view('admin.useraccount.edit');
	}
}