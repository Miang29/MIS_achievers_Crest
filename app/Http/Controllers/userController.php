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

	protected function authentice(Request $req) {
		
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