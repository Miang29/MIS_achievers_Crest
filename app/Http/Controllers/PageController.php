<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	//DASHBOARD
	protected function dashboard() {
		return view('admin.dashboard');
	}

	//APPOINTMENT
	protected function appointment() {
		return view('admin.appointment.index');
	
	}
	protected function CreateAppointment() {
		return view('admin.appointment.create');
	
	}
	protected function EditAppointment() {
		return view('admin.appointment.edit');
	
	}
	protected function viewAppointment() {
		return view('admin.appointment.view');
	}

	//CLIENTPANEL

	protected function user() {
		return view('user.components.header');
	}

}
