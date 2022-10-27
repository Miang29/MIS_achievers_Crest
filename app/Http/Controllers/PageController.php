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

	protected function consultation() {
		return view('admin.services.consultation.index');
	}

	protected function createConsultation() {
		return view('admin.services.consultation.create');
	}

	protected function viewConsultation() {
		return view('admin.services.consultation.view');
	}

	protected function editConsultation() {
		return view('admin.services.consultation.edit');
	}
}