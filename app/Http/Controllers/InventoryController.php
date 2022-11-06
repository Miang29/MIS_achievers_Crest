<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{

    //INVENTORY
	protected function category() {
		return view('admin.inventory.index');

	}
	protected function createCategory() {
        return view('admin.inventory.create');

	}
	protected function viewCategory() {
		return view('admin.inventory.view');

	}
	protected function editCategory() {
		return view('admin.inventory.edit');
 
    }
	protected function editProduct() {
		return view('admin.inventory.product.edit');
	
    }
	protected function createProduct() {
		return view('admin.inventory.product.create');
	
    }
	protected function viewProduct() {
		return view('admin.inventory.product.view');
	}

}
