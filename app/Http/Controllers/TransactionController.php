<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //TRANSACTION
	protected function productsOrder() {
		return view('admin.transaction.productsOrder.index');
	}
	protected function createproductsOrder() {
		return view('admin.Transaction.productsOrder.create');
	}

	protected function viewproductsOrder() {
		return view('admin.transaction.productsOrder.view');
	}
	

}
