<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\User;
use App\UserType;

use Auth;
use DB;
use Exception;
use Hash;
use Log;
use Mail;
use Validator;

class UserController extends Controller
{
	// AUTHENTICATION FUNCTIONS
	protected function login()
	{
		return view('login');
	}

	protected function authenticate(Request $req)
	{
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
		} else {
			if ($user) {
				try {
					DB::beginTransaction();

					if ($user->login_attempts < 5) {
						$user->login_attempts = $user->login_attempts + 1;
						$msg = 'Wrong username/password!';
					} else {
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


	protected function logout()
	{
		if (Auth::check()) {
			auth()->logout();
			return redirect(route('home'))->with('flash_success', 'Logged out!');
		}
		return redirect()->route('admin.dashboard')->with('flash_error', 'Something went wrong, please try again.');
	}

	// RESOURCE FUNCTIONS
	protected function index()
	{
		$users = User::get();

		return view('admin.useraccount.index', [
			'user' => $users
		]);
	}

	protected function create()
	{
		$password = str_shuffle(Str::random(25) . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT));
		$types = UserType::get();

		return view('admin.useraccount.create', [
			'password' => $password,
			'types' => $types
		]);
	}

	protected function store(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'first_name' => 'required|min:2|max:255|string',
			'middle_name' => 'nullable|min:2|max:255|string',
			'last_name' => 'required|min:2|max:255|string',
			'suffix' => 'nullable|min:2|max:255|string',
			'email' => 'required|unique:users,email|min:2|max:255|email',
			'username' => 'required|unique:users,username|min:2|max:255|string',
			'user_type' => 'required|exists:user_types,id|numeric',
			'password' => array('required', 'string', 'min:8', 'max:255', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]*$/'),
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
			DB::beginTransaction();

			$user = User::create([
					'first_name' => $req->first_name,
					'middle_name' => $req->middle_name,
					'last_name' => $req->last_name,
					'suffix' => $req->suffix,
					'email' => $req->email,
					'username' => $req->username,
					'user_type_id' => $req->user_type,
					'password' => Hash::make($req->password),
				]);


			// MAILER SHIT
			Mail::send(
				'layouts.emails.creation',
				[
					'req' => $req,
				],
				function ($mail) use ($user) {
					$mail->to($user->email)
						->from("nano.mis@technical.com") // MIS Nano Vet Clinic
						->subject("Account Created");
				}
			);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('user.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('user.index')
			->with('flash_success', "Successfully added {$user->getName()} as {$user->userType->name}");
	}

	protected function view($id)
	{
		$user = User::find($id);

		if ($user == null)
			return redirect()
				->route('user.index')
				->with('flash_error', 'User already removed. Please refresh your browser if it is still visible');

		return view('admin.useraccount.view', [
			'user' => $user
		]);
	}

	protected function edit($id)
	{
		$user = User::find($id);
		$types = UserType::get();

		if ($user == null)
			return redirect()
				->route('user.index')
				->with('flash_error', 'User already removed. Please refresh your browser if it is still visible');

		return view('admin.useraccount.edit', [
			'user' => $user,
			'types' => $types,
		]);
	}

	//UPDATE USER
	protected function updateUser(Request $req, $id)
	{
		$user = User::find($id);

		if ($user == null){
			return redirect()
			->route('user.index')
			->with('flash_error', 'User either does not exists or is already deleted.');
		}

		$validator = Validator::make($req->all(), [
			'first_name' => 'required|min:2|max:255|string',
			'middle_name' => 'nullable|min:2|max:255|string',
			'last_name' => 'required|min:2|max:255|string',
			'suffix' => 'nullable|min:2|max:255|string',
			'email' => 'required|unique:users,email|min:2|max:255|email',
			'username' => 'required|unique:users,username|min:2|max:255|string',
			'user_type' => 'required|exists:user_types,id|numeric',
			
		], [
			'first_name.required' => 'Firstname is required',
			'last_name.required' => 'Lastname is required',
			'username.required' => 'Username is required',
			'usertype.required' => 'Usertype is required',
			'email.email' => 'Please provide a proper email address',
			'email.max' => 'Please provide a proper email address',
			
		]);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator);
		}

		try {
			DB::beginTransaction();

			$user->first_name = $req->first_name;
			$user->middle_name = $req->middle_name;
			$user->last_name = $req->last_name;
			$user->suffix = $req->suffix;
			$user->email = $req->email;
			$user->username = $req->username;
			$user->user_type_id = $req->user_type;
			$user->save();
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			if ($user == null)
				return redirect()
					->route('user.index')
					->with('flash_error', 'User already removed. Please refresh your browser if it is still visible');
		}
		return redirect()
			->route('user.index')
			->with('flash_success', 'Successfully updated user information');
	}



	protected function delete($id)
	{
		$user = User::find($id);

		if ($user == null)
			return redirect()
				->route('user.index')
				->with('flash_error', 'User already removed. Please refresh your browser if it is still visible');

		$isDeleted = false;

		try {
			DB::beginTransaction();

			if (Auth::check() && (Auth::user()->email != $user->email)) {
				$user->delete();
				$isDeleted = true;
			}

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('user.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		if ($isDeleted)
			return redirect()
				->route('user.index')
				->with('flash_success', 'Successfully removed user from table');

		return redirect()
			->route('user.index')
			->with('flash_info', 'Cannot delete your own account while active');
	}

	protected function submitPassword(Request $req, $id)
	{
		$user = User::find($id);
       
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

			$user->save();
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->back()
				->with('flash_error', 'Something went wrong, please try again later.');
		}
		return redirect()
			->route('user.index')
			->with('flash_success', "Succesfully updated password");
	}

		
	protected function editPassword($id) {
		$user = User::find($id);

		if (!$user)
			return redirect()
				->route('user.index');
		
		return view('admin.useraccount.change_password', [
			'user' => $user
		]);

	}
}
