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
		$sv = Services::has("variations", '>', 0)->where("service_category_id", '=', $scid)->get();
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
		$priceRule = array();
		$priceMsg = array();
		foreach ($req->price as $i => $o) {
			$priceRule["price.$i"] = "required_unless:variation.$i,null|numeric";
			$priceMsg["price.$i.required_unless"] = "The price field is required {$i}";
		}

		$validator = Validator::make($req->all(), array_merge([
			'service_name' => 'required|numeric|exists:services,id',
			'variation' => 'nullable|array',
			'variation.*' => 'nullable|min:2|max:255|string',
			'price' => 'required|array',
			'remarks' => 'nullable|array',
			'remarks.*' => 'nullable|min:2|max:255|string',
		], $priceRule), $priceMsg);

		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction(); 

			for ($i = 0; $i < count($req->variation); $i++) {
				// dd($req->variation[$i]);
				$serVar = ServicesVariation::create([
					'service_id' => $req->service_name,
					'variation_name' => $req->variation[$i],
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

	// ---------------- ADD NEW SERVICE VARIATIONS --------------- //
	protected function addVariation($id, $serviceId){
		$var = ServicesVariation::where('service_id', '=', $serviceId)->get();
		return view('admin.service_category.service.service_variation.create', [
			'variation' => $var,
			'id' => $id,
			'serviceId' => $serviceId,
		]);
	}

	//--------------- SUBMIT ADDED VARIATION --------------------- //
	protected function submitVariation(Request $req,$id,$serviceId)
	{
		// dd("TEST");
		$validator = Validator::make($req->all(), [
			'variation' => 'nullable|min:2|max:255|string',
			'price' => 'required|numeric',
			'remarks.' => 'nullable|min:2|max:255|string',
		],[
			'price' => 'The price field is required',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();

		try {
				DB::beginTransaction(); 
				$serVar = ServicesVariation::create([
					'service_id' => $serviceId,
					'variation_name' => $req->variation_name,
					'price' => $req->price,
					'remarks' => $req->remarks,
				]);
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			

			return redirect()
				->route('service_variation.create',[$id])
				->with('flash_error', 'Something went wrong, please try again later');
		}
		return redirect()
			->route('service.index',[$id])
			->with('flash_success', "Successfully added a variation");
	}

	protected function update($id, $serviceId) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated service name'
			]);
	}

	protected function deleteService($id, $serviceId) {

		$service = Services::find($serviceId);

		if ($service == null) {
			return redirect()
			->route('service.index',[$id])
			->with('flash_error','Service does not exists');
			}

			try{
				DB::beginTransaction();
				$service->delete();
			
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
			->with('flash_success', "Successfully archived service");
	}


	protected function restore(){

		$petsInformations->restore();
	}
}