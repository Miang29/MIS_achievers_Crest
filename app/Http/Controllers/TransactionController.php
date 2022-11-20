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
		"1" => [
			'id' => 1,
			'reference' => "#081478",
			'mode' => "Gcash",
			'name' => "Whiskat",
			'type' => "",
			'no' => "1",
			'price' => "50",
			'qty' => "2",
			'total' => "100"
		]
	];

	protected $services = [
		"1" => [
			'id' => 1,
			'reference' => "#081479",
			'mode' => "Gcash",
			'type' => "Home Service",
			'price' => "300",
			'additional' => "200",
			'date' => "",
			'time' => "",
			'petname' => "",
			'weight' => "",
			'temparature' => "",
			'history' => "",
			'treatment' => "",
			'total' => "500"
		]
	];

	//TRANSACTIONS
	protected function viewProductsOrder($id) {
		$order = $this->order[$id];
		
		return view('admin.transaction.productsOrder.view', [
			'id' => $id,
			'order' => $order
		]);
	}

	protected function productsOrder() {
		return view('admin.transaction.productsOrder.index');
	}

	protected function createproductsOrder() {
		return view('admin.transaction.productsOrder.create');
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
		return view('admin.transaction.services-transaction.create');
	}

	protected function show($id) {
		$services = $this->services[$id];

		return view('admin.transaction.services-transaction.view', [
			'id' => $id,
			'services' => $services
		]);
	}

	protected function deleteServices($id) {
		return redirect()
			->route('transaction.service')
			->with('flash_success', 'Successfully removed transaction from table');
	}
}