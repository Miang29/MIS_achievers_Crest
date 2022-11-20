<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{

	// TEMPORARY VAR
	private $services = [
		[
			"id" => 1,
			"category_name" => "Proffessional Services",
			"service_name" => "Home Service",
			"variation_name" => "Antipolo",
			"price" => "300",
			"remarks" => ""
		]
	];

	protected function create() {
		return view('admin.service_category.services.create', [
			'category' => 'Professional Services'
		]);
	}
	
	protected function view() {
		return view('admin.service_category.services.view');
	}

	//protected function edit() {
	//	return view('admin.service_category.services.edit');
	//}

	protected function update($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated service name'
			]);
	}

	protected function deleteservice($id) {
		return redirect()
			->route('services.show', [1])
			->with('flash_success', 'Successfully removed entire services and all its items');
	}

	protected function show($id) {
		$services = $this->services[$id-1];

		return view('admin.service_category.services.show', [
			'id' => $id,
			'services' => $services
		]);
	}
}