<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

class PageController extends Controller
{
	// DASH BOARD
	protected function redirectDashboard() {
		return redirect()->route('dashboard');
	}

	protected function dashboard() {
		$months = array();
		$monthly_earnings = array();

		return view('admin.dashboard', [
			''
		]);
	}


	// CLIENT PANEL
	protected function user() {
		return view('index');
	}

	protected function Appointment() {
		return view('appointment');
	}

	protected function ServicesOffer() {
		return view('services');
	}

}
