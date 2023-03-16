<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Products;
use App\ProductsOrderTransactionItem;
use App\ProductsOrderTransaction;
use App\Services;
use App\ServicesCategory;
use Illuminate\Http\Request;


use DB;
use Exception;
use File;
use Hash;
use Log;
use Validator;

class TransactionController extends Controller
{

	//TEMP VAR
	protected $order = [
		"1" => [
			'id' => 1,
			'reference' => "#081478",
			'mode' => "Gcash",
			'name' => "Whiskat",
			'type' => "Pet Food",
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
			'type' => "Consultation",
			'price' => "300",
			'additional' => "200",
			'date' => "11/20/2022",
			'time' => "3:00 PM",
			'petname' => "Vodoo",
			'weight' => "15kg",
			'temperature' => "36.6",
			'history' => "fever",
			'treatment' => "Vaccine",
			'total' => "500"
		]
	];

	// ---------- PRODUCTS ORDER TRANSACTION --------- //
	// ---------------- SHOW ------------------ //
	protected function viewProductsOrder($id)
	{
		$order = $this->order[$id];

		return view('admin.transaction.productsOrder.view', [
			'id' => $id,
			'order' => $order
		]);
	}
	// ------------------- INDEX --------------------- //
	protected function productsOrder()
	{
		$prodOrder = ProductsOrderTransaction::has("productsOrderItems", '>', 0)->get();
		return view('admin.transaction.productsOrder.index',[
			'productOrder' => $prodOrder,
		]);
		
	}

	//-------------- PRODUCT ORDER CREATE TRANSACTION ----------------- //
	protected function createproductsOrder(){
		$prc = ProductCategory::has("products", '>', 0)->get();
		return view('admin.transaction.productsOrder.create', [
			'prodCat' => $prc,
		]);
	}
	protected function submitOrder(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'product_name' => 'required|array',
			'product_name.*'=>'required|exists:products,product_name|string',
			'product_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric',
			'quantity' => 'required|array',
			'quantity.*' => 'required|numeric',
			'total' => 'required|array',
			'total.*' => 'required|numeric',
			'total_amt' => 'required|numeric',
	
		]);

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$prodOrder = ProductsOrderTransaction::create([
				'reference_no' => $req->reference_no,
				'mode_of_payment' => $req->mode_of_payment,
			]);

			for ($i = 0; $i < count($req->product_name); $i++) {
				ProductsOrderTransactionItem::create([
					'transaction_id'=> $prodOrder->id,
					'product_name' => $req->product_name[$i],
					'price' =>  $req->price[$i],
					'quantity' => $req->quantity[$i],
					'total' => $req->total[$i],
				]);
			}

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
				->route('transaction.products.create')
				->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
			->route('transaction.products-order')
			->with('flash_success', "Transaction has been created successfully.");
	}

	// ----------------- ARCHIVE ---------------- //
	protected function deleteproductsOrder($id)
	{
		return redirect()
			->route('transaction.products-order')
			->with('flash_success', 'Successfully removed transaction from table');
	}

	//----------- SERVICES TRANSACTION ------------- //
	// ----------------- INDEX ------------------ //
	protected function Service()
	{
		return view('admin.transaction.services-transaction.index');
	}

	// ------------- CREATE SERVICE TRANSACTION -------------- //
	protected function createServices()
	{
		$serviceCat = ServicesCategory::has("services", '>', 0)->get();
		return view('admin.transaction.services-transaction.create',[
			'serviceCategory' => $serviceCat,
		]);
	}
	// ------------------- SHOW ------------------------ //
	protected function show($id)
	{
		$services = $this->services[$id];

		return view('admin.transaction.services-transaction.view', [
			'id' => $id,
			'services' => $services
		]);
	}
	// ------------- ARCHIVE --------------- //
	protected function deleteServices($id)
	{
		return redirect()
			->route('transaction.service')
			->with('flash_success', 'Successfully removed transaction from table');
	}
}
