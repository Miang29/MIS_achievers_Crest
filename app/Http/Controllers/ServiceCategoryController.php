<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    protected function index() {
		return view('admin.service_category.index');
	}

	protected function create() {
		return view('admin.service_category.create');
	}

	protected function edit() {
		return view('admin.service_category.edit');
	
	}

	protected function show() {
		return view('admin.service_category.show');
	}
}
