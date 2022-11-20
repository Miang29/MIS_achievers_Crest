<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceVariationController extends Controller
{
	// TEMPORARY VAR
	private $variations = [
		"1" => [
			"id" => 1,
			"category_name" => "Proffessional Services",
			"service_name" => "Home Service",
			"variation_name" => "Antipolo",
			"price" => "300",
			"remarks" => "No remarks"
		],
		"2" => [
			"id" => 2,
			"category_name" => "Proffessional Services",
			"service_name" => "Home Service",
			"variation_name" => "Quezon City",
			"price" => "500",
			"remarks" => "No remarks"
		]
	];

	protected function index($id, $serviceId) {
		$variations = $this->variations;

		return view('admin.service_category.service.service_variation.index', [
			'variations' => $variations
		]);
	}

	protected function create($id, $serviceId) {
		return view('admin.service_category.service.service_variation.create', [
			'category' => 'Professional Services',
			'service' => 'Home Service'
		]);
	}

	protected function show($id, $serviceId, $variationId) {
		$variation = $this->variations[$variationId];

		return view('admin.service_category.service.service_variation.show', [
			'variation' => $variation
		]);
	}

	protected function edit($id, $serviceId, $variationId) {
		$variation = $this->variations[$variationId];
		
		return view('admin.service_category.service.service_variation.edit', [
			'variation' => $variation
		]);
	}

	protected function delete($id, $serviceId, $variationId) {
		return redirect()
			->route('service_variation.index', [1, 1])
			->with('flash_success', 'Successfully removed variation');
	}
}