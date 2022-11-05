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

	function authenticate(Request $req)
    {
        $authenticated = Auth::attempt([
            'username' => $req->username,
            'password' => $req->password
        ]);

        if ($authenticated) {
            return redirect()->intended('/');
        } else {
            auth()->logout();
            return redirect()->back()->with('flash_error', 'Wrong username/password')->withInput($req->all());
        }
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