<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;

class ServiceCategoryController extends Controller
{
    protected function index() {
		$sc = ServicesCategory::has('services', '>', 0)->get();
		return view('admin.service_category.index',[
			'servicesCategory' => $sc,
			
		]);
	}
// --------------- CREATE BLADE ---------------- //
	protected function create() {
		$services = ServicesCategory::get();
		return view('admin.service_category.create',[
			'service' => $services,
		]);
	}

	// ------------------ SUBMIT SERVICE ----------------- //
	protected function submitService(Request $req){

		$validator = Validator::make($req->all(), [
			'service_name' => 'required|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {

			DB::beginTransaction();
			$services = Services::create([
				'service_category_id' => $req->category_name,
				'service_name' => $req->service_name,
			]);
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('service_category.create')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('service_category.index')
			->with('flash_success', "Successfully added a services category");
	}

	protected function update($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated category name'
			]);

			
	}
	// --------------- SUBMIT SEVICE CATEGORY ----------------- //
	protected function submitServiceCategory(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'service_category_name' => 'required|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {

			DB::beginTransaction();
			$pc = ServicesCategory::create([
				'service_category_name' => $req->service_category_name,
			]);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('settings.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('settings.index')
			->with('flash_success', "Successfully added a services category");
	}
	
	protected function delete($id) {
		return redirect()
			->route('service_category.index')
			->with('flash_success', 'Successfully removed entire category and all its items');
	}
}
