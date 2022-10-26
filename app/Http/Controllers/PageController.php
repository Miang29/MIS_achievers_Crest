<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	protected function dashboard() {
		return view('admin.dashboard');
	}

	 protected function reservation() {
		return view('admin.reservation.index');
	}
	protected function createReservation() {
		return view('admin.reservation.create');
	}
}