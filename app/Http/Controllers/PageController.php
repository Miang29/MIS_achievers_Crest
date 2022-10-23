<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	protected function dashboard() {
		return view('admin.dashboard');
	}

	 protected function registration() {
		return view('admin.registration.index');
	}
	protected function registerPet() {
		return view('admin.registration.registerPet.pet');
	}
}