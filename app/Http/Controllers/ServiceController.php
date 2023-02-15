<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

 // ----------------- INDEX SERVICES ------------------ //
	protected function index( $scid) {
		$sv = Services::where('service_category_id', '=' , $scid)->get();
		return view('admin.service_category.service.index',[
			'serviceVar' => $sv,
		
		]);
	}

	// ----------- CREATE SERVICE ---------------- //
	protected function create() {
		$service = Services::get();
		return view('admin.service_category.service.create', [
			'services' => $service,
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