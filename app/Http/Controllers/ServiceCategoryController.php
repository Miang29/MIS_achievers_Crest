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
    protected function index(Request $req) {
		$serviceCategory = ServicesCategory::has('services', '>', 0);
		$search = "%{$req->search}%";

		if ($req->search) {
			$serviceCategory = $serviceCategory->where('service_category_name', 'LIKE', $search);
		}

		return view('admin.service_category.index',[
			'servicesCategory' => $serviceCategory->get(),
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

		$serviceCategory = ServicesCategory::find($id);

		if ($serviceCategory == null) {
			return redirect()
			->route('service_category.index')
			->with('flash_error','Service category does not exists');
			}

			try{
				DB::beginTransaction();
				$serviceCategory->delete();
			
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('service_category.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('service_category.index')
			->with('flash_success', "Successfully archived service category");
	}


	protected function archiveServicesCategory(){

		$serviceCategory = ServicesCategory::onlyTrashed()->get();
		return view ('admin.service_category.archive_services_category',[
			'serviceCategory' => $serviceCategory
		]);
	}


	protected function restoreServiceCategory($id){

		$serviceCategory = ServicesCategory::withTrashed()->find($id);

		if ($serviceCategory == null) {
			return redirect()
			->route('service_category.index')
			->with('flash_error','Services category does not exists');
			}

			try{
				DB::beginTransaction();
				$serviceCategory->restore();

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('service_category.index')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('service_category.index')
			->with('flash_success', "Successfully restored services category");
	}
 
}
