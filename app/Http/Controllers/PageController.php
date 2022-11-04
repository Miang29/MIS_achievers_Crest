<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	//DASHBOARD
	protected function dashboard()
	{
		return view('admin.dashboard');
	}

	//RESERVATION
	protected function clientProfile()
	{
		return view('admin.clientprofile.index');
	}
	protected function createClientprofile()
	{
		return view('admin.clientprofile.create');
	}

	protected function editClientprofile()
	{
		return view('admin.clientprofile.client.edit');
	}

	protected function viewClientprofile()
	{
		return view('admin.clientprofile.client.view');
	}

	protected function EditPetprofile()
	{
		return view('admin.clientprofile.pet.edit');
	}

	protected function viewPetprofile()
	{
		return view('admin.clientprofile.pet.view');
	}

	//INVENTORY
	protected function category()
	{
		return view('admin.inventory.index');
	}
	protected function createCategory()
	{
		return view('admin.inventory.create');
	}
	protected function viewCategory()
	{
		return view('admin.inventory.view');
	}
	protected function editCategory()
	{
		return view('admin.inventory.edit');

	//Products
	}
	protected function editProduct()
	{
		return view('admin.inventory.product.edit');
	}
	protected function createProduct()
	{
		return view('admin.inventory.product.create');
	}

	//APPOINTMENT
	protected function appointment()
	{
		return view('admin.appointment.index');
	}
	protected function CreateAppointment()
	{
		return view('admin.appointment.create');
	}
	protected function EditAppointment()
	{
		return view('admin.appointment.edit');
	}

	//REPORT
	protected function report()
	{
		return view('admin.report.index');
	}
	//SETTINGS 
	protected function settings()
	{
		return view('admin.settings.index');
	}

	//CLIENTPANEL

	protected function user()
	{
		return view('user.components.header');
	}

}
