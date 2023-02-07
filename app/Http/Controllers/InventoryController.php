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
	// TEMP VAR
	private $products = [
		1 => [
			[
				"id" => 1,
				"name" => 'Whiskat',
				"stocks" => 37,
				"price" => 50,
				"status" => 1,
				"description" => "Cat Food"
			],
			[
				"id" => 2,
				"name" => 'Woofen Biscuit',
				"stocks" => 0,
				"price" => 35,
				"status" => 0,
				"description" => "Dog Treat"
			]
		],
		2 => [
			[
				"id" => 1,
				"name" => 'Dog Shampoo',
				"stocks" => 0,
				"price" => 99.75,
				"status" => 0,
				"description" => "Shampoo for dogs"
			],
			[
				"id" => 2,
				"name" => 'Catter',
				"stocks" => 5,
				"price" => 150,
				"status" => 1,
				"description" => "Nail cutter??"
			]
		]
	];

	private $categories = [
		1 => [
			"name" => "Pet Food",
			"pc" => 2
		]
	];

    // --------------- INVENTORY --------------- //


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
        	'existing_categories' => 'Pet Food',
			'productCty' => $pcty,
        ]);
	}

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

	protected function deleteCategory($id) {
		return redirect()
			->route('category')
			->with('flash_success', 'Successfully removed entire category and all its items');
	} 

	// ------------------- PRODUCT --------------------------//
	protected function index($id) {
		return view('admin.inventory.view', [
			'id' => $id,
			'products' => $this->products[$id]
		]);
	}

	protected function edit($cid, $id) {
		$product = $this->products[$cid][$id];

		return view('admin.inventory.product.edit', [
			'cid' => $cid,
			'product' => $product,
			'category' => $this->categories[$cid]
		]);
    }

    protected function update(Request $req, $cid, $id) {
    	return redirect()
    		->route('category.view', [$cid])
    		->with('flash_success', "Successfully updated item");
    }
	
	protected function createProduct($cid) {
		return view('admin.inventory.product.create', [
			'cid' => $cid
		]);
    }
	
	protected function view($cid, $id) {
		$product = $this->products[$cid][$id];

		return view('admin.inventory.product.view', [
			'cid' => $cid,
			'product' => $product,
			'category' => $this->categories[$cid]
		]);
	}

	protected function delete($id) {
		return redirect()
			->route('category.view', $id)
			->with('flash_success', 'Successfully removed item');
	}

		// ---------------- CREATION OF CATEGORY NAME ------------------ //
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

protected function createCty() {

	$pc = ProductCategory::get();
	return view('admin.inventory.category.create',[
		'productCategory' => $pc,
			]);
	}

}


