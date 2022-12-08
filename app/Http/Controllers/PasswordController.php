<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    protected function forgotPassword() {
		return view('password.forgot-password');
		
	}

	protected function newPassword() {
		return view('password.new-password');
		
	}
	
}
