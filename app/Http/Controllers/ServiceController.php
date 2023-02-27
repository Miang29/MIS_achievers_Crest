<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;


class ServiceController extends Controller
{

 // ----------------- INDEX SERVICES ------------------ //
	protected function index($scid) {
		$sv = Services::has("variations")->where("service_category_id", '=', $scid)->get();

		return view('admin.service_category.service.index',[
			'serviceVar' => $sv,
			'id' =>$scid
		]);
	}
	// ----------- CREATE SERVICE ---------------- //
	protected function create($id) {
		$service = Services::where("service_category_id", '=', $id)->get();
		return view('admin.service_category.service.create', [
			'services' => $service,
			'id' => $id,
			
		]);
	}
// SUBMIT //	
	
	protected function submitServiceVar(Request $req,$id)
	{
		// dd($req);
		$validator = Validator::make($req->all(), [
			'service_name' => 'required|numeric|exists:services,id',
			'variation' => 'nullable|array',
			'variation.*' => 'nullable|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric',
			'remarks' => 'nullable|array',
			'remarks.*' => 'nullable|min:2|max:255|string',
		],[
			'price.*' => 'The price field is required',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {
			DB::beginTransaction(); 
			for ($i = 0; $i < count($req->variation); $i++) {

				$serVar = ServicesVariation::create([
					'service_id' => $req->service_name,
					'variation' => $req->variation[$i],
					'price' => $req->price[$i],
					'remarks' => $req->remarks[$i],
				]);
			}

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			

			return redirect()
				->route('service.index',[$id])
				->with('flash_error', 'Something went wrong, please try again later');
		}
		return redirect()
			->route('service.index',[$id])
			->with('flash_success', "Successfully added a services category");
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