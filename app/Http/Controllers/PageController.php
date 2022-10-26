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

	protected function editClient() {
		return view('admin.reservation.client.edit');
	}

	protected function viewClient() {
		return view('admin.reservation.client.view');
	}

	protected function EditPet() {
		return view('admin.reservation.pet.edit');
	}

	protected function viewPet() {
		return view('admin.reservation.pet.view');
	}
}