<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    	//SERVICES

		
	protected function Services() {
		return view('admin.services.index');
	}

	protected function create() {
		return view('admin.services.create');
	}

	protected function edit() {
		return view('admin.services.edit');
	
	}

	protected function show() {
		return view('admin.services.show');
	}
}
