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

	protected function update($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated category name'
			]);
	}

	protected function delete($id) {
		return redirect()
			->route('service_category.index')
			->with('flash_success', 'Successfully removed entire category and all its items');
	}
}
