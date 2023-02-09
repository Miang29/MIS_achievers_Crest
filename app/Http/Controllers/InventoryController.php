<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Products;
use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;

class InventoryController extends Controller
{
	//--------------------- WALA PANG BACK END -------------------------//
	protected function edit($cid, $id) {
		$prod = Products::find($id);
		return view('admin.inventory.product.edit', [
			'cid' => $cid,
			'product' => $prod,
		]);
    }

    protected function update(Request $req, $cid, $id) {
    	return redirect()
    		->route('category.view', [$cid])
    		->with('flash_success', "Successfully updated item");
    }
	
	protected function delete($id) {
		return redirect()
			->route('category.view', $id)
			->with('flash_success', 'Successfully removed item');
	}

	protected function deleteCategory($id) {
		return redirect()
			->route('category')
			->with('flash_success', 'Successfully removed entire category and all its items');
	} 

    // --------------- INDEX OF INVENTORY --------------- //
	protected function indexCategory() {
		$prd = ProductCategory::has('products')->get();
		return view('admin.inventory.index', [
			'categories' => $prd,
		]);
	}
	// -------------- CREATION OF PRODUCTS ----------------- //
	protected function create() {
		$pcty = ProductCategory::get();
        return view('admin.inventory.create', [
			'productCty' => $pcty,
        ]);
	}
     // ----------------- SUBMITTION OF PRODUCTS ----------------------- //
	protected function submitProducts(Request $req){	
		$validator = Validator::make($req->all(), [
			'category' => 'required|exists:product_categories,id|numeric',
			'product_name' => 'required|array',
			'product_name.*' => 'required|min:2|max:355|string',
			'stocks' => 'required|array',
			'stocks.*' => 'required|numeric',
			'price' => 'required|array',
			'price.*' => 'required|numeric',
			'status' => 'required|array',
			'status.*' => 'required|min:2|max:355|string',
			'description' => 'nullable|array',
			'description.*' => 'nullable|min:2|max:355|string',
		],[
			'product_name.*' => 'The product name is required.',
			'stocks.*' => 'The stock is required.', 
			'price.*' => 'The price is required.',
			'status.*' => 'Please select status',
			
		]);
		// dd($validator->messages());
		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {

			DB::beginTransaction();
			for ($i = 0; $i < count($req->product_name); $i++) {
			
				$prd = Products::create([
					'category_id' => $req->category,
					'product_name' => $req->product_name[$i],
					'stocks' => $req->stocks[$i],
					'price' =>  $req->price[$i],
					'status' => $req->status[$i],
					'description' => $req->description[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
				->route('category.create')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('inventory')
			->with('flash_success', "Successfully added in product inventory.");
	}
	
	protected function updateCategory($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated category name'
			]);
	}

		// ----------------- P R O D U C T S---------------//
	// ------------------- INDEX OF PRODUCTS -------------------- //
	protected function index($id) {
		$product = Products::where('category_id', '=' , $id)->get();
		return view('admin.inventory.view', [
			'id' => $id,
			'products' => $product
		]);
	}
  // ------------------ VIEW PRODUCT --------------------- //
	protected function viewProduct($id) {
		$product = Products::find($id);
		return view('admin.inventory.product.view', [
		'id' => $id,
		'products' => $product,
		]);	
	}
	// ----------------- CREATION OF NEW PRODUCTS --------------- //
	protected function createProduct($id) {
		$prcty = Products::where('category_id', '=' , $id)->get();
		return view('admin.inventory.product.create', [
		'productCategory' => $prcty,
		'id' => $id,
		]);
    }
		 // ------------------- FOR FIX ---------------------- //
	// -----------------SAVING OF NEW PRODUCTS ------------------- //
	protected function saveProduct(Request $req, $id){
		// dd($req);
		$validator = Validator::make($req->all(), [
			'product_name' => 'required|min:2|max:355|string',
			'stocks' => 'required|numeric',
			'price' => 'numeric',
			'status' => 'required|min:2|max:355|string',
			'description' => 'nullable|min:2|max:355|string',
		]);

		// dd($validator->messages());
		if ($validator->fails())
		return redirect()
			->back()
			->withErrors($validator)
			->withInput();
		
			try {
				DB::beginTransaction();
				$prcty = Products::create()([
					'category_id' => $id,
					'product_name' => $req->product_name,
					'stocks' => $req->stocks,
					'price' =>  $req->price,
					'status' => $req->status,
					'description' => $req->description,
				]);

			dd($req->price);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			// dd($e);

			return redirect()
				->route('product.create',[$id])
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('inventory')
				->with('flash_success', "Successfully added in product inventory.");
	}

			// ------------------C A T E G O R Y --------------------//
		// ---------------- CREATION OF CATEGORY NAME ------------------ //
		
	protected function createCty() {
			$pc = ProductCategory::get();
			return view('admin.inventory.category.create',[
				'productCategory' => $pc,
					]);
			}
		// -------------- SUBMIT OF CATEGORY NAME -------------- //
	protected function submitCty(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'category_name' => 'required|min:2|max:255|string',
		]);

		if ($validator->fails())
			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		try {

			DB::beginTransaction();
			$pc = ProductCategory::create([
				'category_name' => $req->category_name,
			]);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			dd($e);

			return redirect()
				->route('create-category')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('inventory')
		->with('flash_success', "Successfully Added");
	}

}


