<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	//DASHBOARD
	protected function dashboard() {
		return view('admin.dashboard');
	}

	//RESERVATION
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

	//TRANSACTION
	protected function transaction() {
		return view('admin.transaction.index');
	}
	protected function createTransaction() {
		return view('admin.Transaction.create');
	}

	protected function viewTransaction() {
		return view('admin.transaction.view');
	}
	

	
	//INVENTORY
	protected function inventory() {
		return view('admin.inventory.index');
	}
	protected function createInventory() {
		return view('admin.inventory.create');
	}

	protected function viewInventory() {
		return view('admin.inventory.view');
	}

	protected function editInventory() {
		return view('admin.inventory.edit');
	}
	
}