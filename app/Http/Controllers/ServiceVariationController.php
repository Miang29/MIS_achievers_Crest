<?php

namespace App\Http\Controllers;

use App\ServicesVariation;
use Illuminate\Http\Request;


use DB;
use Exception;
use Log;
use Validator;

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

	// -------------- INDEX OF SERVICE VARIATION --------------- //
	protected function index($id, $serviceId)
	{
		$variations = ServicesVariation::where('service_id', '=', $serviceId)->get();
		return view('admin.service_category.service.service_variation.index', [
			'variations' => $variations,
			'id' => $id,
			'serviceId' => $serviceId
		]);
	}
	// ---------------- CREATE SERVICE VARIATIONS --------------- //
	protected function create($id, $serviceId,$variationId){
		$var = ServicesVariation::where('service_id', '=', $serviceId)->get();
		return view('admin.service_category.service.service_variation.create', [
			'variation' => $var,
			'id' => $id,
			'serviceId' => $serviceId,
			'vId' => $variationId
		]);
	}

	protected function show($id, $serviceId, $variationId)
	{
		$variation = $this->variations[$variationId];

		return view('admin.service_category.service.service_variation.show', [
			'variation' => $variation
		]);
	}

	protected function edit($id, $serviceId, $variationId)
	{
		$variation = $this->variations[$variationId];

		return view('admin.service_category.service.service_variation.edit', [
			'variation' => $variation
		]);
	}

	protected function delete($id, $serviceId, $variationId)
	{
		return redirect()
			->route('service_variation.index', [1, 1])
			->with('flash_success', 'Successfully removed variation');
	}
}
