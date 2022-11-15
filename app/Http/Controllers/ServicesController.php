<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
protected function create() {
	return view('admin.service_category.services.create');
}

protected function edit() {
	return view('admin.service_category.services.edit');
}

protected function view() {
	return view('admin.service_category.services.view');
}


}