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
	 protected function clientProfile() {
		return view('admin.clientprofile.index');
	}
	protected function createClientprofile() {
		return view('admin.clientprofile.create');
	}

	protected function editClientprofile() {
		return view('admin.clientprofile.client.edit');
	}

	protected function viewClientprofile() {
		return view('admin.clientprofile.client.view');
	}

	protected function EditPetprofile() {
		return view('admin.clientprofile.pet.edit');
	}

	protected function viewPetprofile() {
		return view('admin.clientprofile.pet.view');
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
	

}