<?php

namespace App\Http\Controllers;

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
		],
		2 => [
			"name" => "Pet Grooming",
			"pc" => 2
		]
	];

    // INVENTORY
	protected function category() {
		return view('admin.inventory.index', [
			'categories' => $this->categories
		]);
	}

	protected function createCategory() {
        return view('admin.inventory.create', [
        	'existing_categories' => 'Pet Food'
        ]);
	}

	protected function updateCategory($id) {
		return response()
			->json([
				'success' => true,
				'title' => 'Success',
				'message' => 'Successfully updated category name'
			]);
		// return view('admin.inventory.edit');
	}

	protected function deleteCategory($id) {
		return redirect()
			->route('category')
			->with('flash_success', 'Successfully removed entire category and all its items');
	}

	// PRODUCT
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
	
	protected function create($cid) {
		return view('admin.inventory.product.create');
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
}