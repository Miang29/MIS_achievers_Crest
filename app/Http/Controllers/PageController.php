<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

class PageController extends Controller
{
	//DASHBOARD
	protected function redirectDashboard() {
		return redirect()->route('dashboard');
	}
	protected function dashboard() {
		return view('admin.dashboard');
	}


	//CLIENTPANEL
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
