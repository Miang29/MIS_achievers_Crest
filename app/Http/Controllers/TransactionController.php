<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Exception;
use Log;

class TransactionController extends Controller
{

	//TEMP VAR
	protected $order = [
			[
               'id' => 1,
				'reference' => "",
				'mode' => "",
				'name' => "",
				'type' => "",
				'no' => "",
				'price' =>"",
				'qty' => "",
				'total' => ""
			]
		];

	//TRANSACTIONS

	protected function viewProductsOrder($id) {
		$order = $this->order[$id-1];

		return view('admin.transaction.productsOrder.view', [
			'id' => $id,
			'order' => $order
		]);
	}

	protected function productsOrder() {
		return view('admin.transaction.productsOrder.index');
	}

	protected function createproductsOrder() {
		return view('admin.Transaction.productsOrder.create');
	}

	
	protected function deleteproductsOrder($id) {
		return redirect()
			->route('transaction.products-order')
			->with('flash_success', 'Successfully removed transaction from table');
	}





	//SERVICES
	protected function Service() {
		return view('admin.transaction.services-transaction.index');
	}

	protected function createServices() {
		return view('admin.Transaction.services-transaction.create');
	}  

	protected function viewServices() {
		return view('admin.transaction.services-transaction.view');
	}

	protected function deleteServices($id) {
		return redirect()
			->route('transaction.service')
			->with('flash_success', 'Successfully removed transaction from table');
	}
}