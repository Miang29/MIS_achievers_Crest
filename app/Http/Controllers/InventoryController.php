<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;

class InventoryController extends Controller
{

    // INVENTORY
	protected function category() {
		return view('admin.inventory.index');
	}

	protected function createCategory() {
        return view('admin.inventory.create', [
        	'existing_categories' => 'Pet Food'
        ]);
	}
	
	protected function viewCategory() {
		return view('admin.inventory.view');
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

	// PRODUCT
	protected function editProduct($cid, $id) {
		return view('admin.inventory.product.edit');
	
    }
	protected function createProduct($cid) {
		return view('admin.inventory.product.create');
	
    }
	protected function viewProduct($cid, $id) {
		return view('admin.inventory.product.view');
	}

}
