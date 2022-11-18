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

	// protected function edit() {
	// 	return view('admin.service_category.edit');
	// }

	protected function update($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated category name'
			]);
	}

	protected function deletecategory($id) {
		return redirect()
			->route('services.index')
			->with('flash_success', 'Successfully removed entire category and all its items');
	}

	protected function show() {
		return view('admin.service_category.show');
	}
}
