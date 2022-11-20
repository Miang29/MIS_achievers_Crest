<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
	// TEMPORARY VAR
	private $services = [
		"1" => [
			"id" => 1,
			"category_name" => "Proffessional Services",
			"service_name" => "Home Service",
			"variation_name" => "Antipolo",
			"price" => "300",
			"remarks" => "No remarks"
		]
	];

	protected function index($id) {
		return view('admin.service_category.service.index');
	}

	protected function create($id) {
		return view('admin.service_category.service.create', [
			'category' => 'Professional Services'
		]);
	}

	protected function update($id, $serviceId) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated service name'
			]);
	}

	protected function delete($id, $serviceId) {
		return redirect()
			->route('services.index', [1])
			->with('flash_success', 'Successfully removed entire services and all its items');
	}
}