<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use App\PetsInformation;
use App\ServicesOrderTransaction;
use App\ConsultationTransaction;
use App\VaccinationTransaction;
use App\GroomingTransaction;
use App\BoardingTransaction;
use App\OtherTransation;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;



class ServiceTransactionController extends Controller
{
	// SERVICES TRANSACTION 
	// INDEX 
	protected function Services()
	{
		$consulService = ServicesOrderTransaction::has("consultation", '>', 0)->with(['consultation','consultation.serviceVariation','consultation.serviceVariation.services','consultation.petsInformations'])->get();
		$vaccService =  ServicesOrderTransaction::has("vaccination", '>', 0)->with(['vaccination','vaccination.variations','vaccination.petsInformations'])->get();
		$groomService = ServicesOrderTransaction::has("grooming", '>',0)->with(['grooming','grooming.variations','grooming.petsInformations' ])->get();
		$boardService = ServicesOrderTransaction::has("boarding", '>', 0)->with(['boarding','boarding.variations','grooming.petsInformations'])->get();
		$otherService = ServicesOrderTransaction::has("otherTransaction",'>',0)->with(['otherTransaction','otherTransaction.variations','otherTransaction.variations.services','otherTransaction.petsInformations'])->get();
	// dd($consulService[0]->consultation);
		return view('admin.transaction.services-transaction.index',[
			'consultService' => $consulService,
			'vacciService' => $vaccService,
			'groomService' => $groomService,
			'boardService' => $boardService,
			'otherService' => $otherService,
		]);
	}

	protected function showConsultation($id)
	{
		$conTran = ServicesOrderTransaction::with('consultation')->find($id);
		return view('admin.transaction.services-transaction.consultation_show', [
			'id' => $id,
			'conTran' => $conTran
		]);
	}

	protected function showVaccination($id)
	{
		$vacTran = ServicesOrderTransaction::with('vaccination')->find($id);
		return view('admin.transaction.services-transaction.vaccination_show', [
			'id' => $id,
			'vacTran' => $vacTran
		]);
	}

	protected function showGrooming($id)
	{
		$groomTran = ServicesOrderTransaction::with('grooming')->find($id);
		return view('admin.transaction.services-transaction.grooming_show', [
			'id' => $id,
			'groomTran' => $groomTran
		]);
	}

	protected function showBoarding($id)
	{
		$boardTran = ServicesOrderTransaction::with('boarding')->find($id);
		return view('admin.transaction.services-transaction.boarding_show', [
			'id' => $id,
			'boardTran' => $boardTran
		]);
	}

	protected function showTransaction($id)
	{
		$Tran = ServicesOrderTransaction::with('otherTransaction')->find($id);
		return view('admin.transaction.services-transaction.transaction_show', [
			'id' => $id,
			'Tran' => $Tran
		]);
	}

	// CREATE Consultation TRANSACTION
	protected function createConsultation()
	{
		$serviceVariations = ServicesVariation::where('service_id', '=', 2)->with('services')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		
		return view('admin.transaction.services-transaction.consultation-create', [
			'serviceVariations' => $serviceVariations,
			'owner' => $owner,
		]);
	} 
   
	// SUBMIT-CONSULTATION
	protected function submitConsultation(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'service_category_id' => 'required|array',
			'service_category_id.*'=>'required|exists:services,service_category_id|string',
			'service_category_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'weight' => 'required|array',
			'weight.*' => 'required|min:2|max:255|string',
			'temperature' => 'required|array',
			'temperature.*' => 'required|min:2|max:255|string',
			'findings' => 'required|array',
			'findings.*' => 'required|min:2|max:255|string',
			'treatment' => 'required|array',
			'treatment.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric',
			'additional_cost' => 'required|array',
			'additional_cost.*' => 'required|numeric',
			'total' => 'required|array',
			'total.*' => 'required|numeric',
			'total_amt' => 'required|numeric',
		]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);

			for ($i = 0; $i < count($req->service_category_id); $i++) {
				
				$ct = ConsultationTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'service_category_id' => $req->service_category_id[$i],
					'price' =>  $req->price[$i],
					'additional_cost' => $req->additional_cost[$i],
					'total' => $req->total[$i],
					'pet_name' => $req->pet_name[$i],
					'weight' => $req->weight[$i],
					'temperature' => $req->temperature[$i],
					'findings' => $req->findings[$i],
					'treatment' => $req->treatment[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.consultation.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE VACCINATION TRANSACTION
	protected function createVaccination()
	{
		$services = Services::where('id', '=', 3)->has("variations", '>', 0)->with('variations')->get();
		// dd($serVar);
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.vaccination-create',[
			'services' => $services,
			'owner' => $owner,
		  ]);
	}
	// SUBMIT-VACCINATION
		protected function submitVaccination(Request $req)
	{
		$validator = Validator::make($req->all(), [
		'reference_no' => 'required|numeric|between:1000000000,9999999999999',
		'mode_of_payment' => 'required|max:255|string',
		'variation_id' => 'required|array',
		'variation_id.*'=>'required|exists:services_variations,id|string',
		'variation_id.*.*' => 'required|min:2|max:255|string',
		'pet_name' => 'required|array',
		'pet_name.*' => 'required|exists:pets_informations,id|string',
		'pet_name.*.*' => 'required|min:2|max:255|string',
		'expired_at' => 'required|array',
		'expired_at.*' => 'required|min:2|max:255|string',
		'price' => 'required|array',
		'price.*' => 'required|numeric'

		]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);

		for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = VaccinationTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'expired_at' => $req->expired_at[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.vaccination.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE GROOMING TRANSACTION
	protected function createGrooming()
	{
		$services = Services::where('id', '=', 4)->has("variations", '>', 0)->with('variations')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.grooming-create',[
				'service' => $services,
				'owner' => $owner
		  ]);
	}

	// Submit-Grooming
	protected function submitGrooming(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'variation_id' => 'required|array',
			'variation_id.*'=>'required|exists:services_variations,id|string',
			'variation_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric'

			]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction();
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);
			for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = GroomingTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.grooming.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	   // CREATE BOARDING TRANSACTION
	protected function createBoarding()
	{
		$services = Services::where('service_category_id', '=', 7)->has("variations", '>', 0)->with('variations')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		  return view('admin.transaction.services-transaction.boarding-create',[
			'service' => $services,
			'owner' => $owner
		  ]);
	}

	// Submit-Boarding
	protected function submitBoarding(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'variation_id' => 'required|array',
			'variation_id.*'=>'required|exists:services_variations,id|string',
			'variation_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric'

			]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction(); 
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);
			for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = BoardingTransaction::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('transaction.boarding.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}
	// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	// CREATE OTHER TRANSACTION
	protected function createOthers()
	{
		$services = Services::has("variations", '>', 0)->with('variations')->get();
		$owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
		return view('admin.transaction.services-transaction.others-create',[
			'services' => $services,
			'owner' => $owner
		]);
	}

protected function submitOtherTransaction(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'reference_no' => 'required|numeric|between:1000000000,9999999999999',
			'mode_of_payment' => 'required|max:255|string',
			'variation_id' => 'required|array',
			'variation_id.*'=>'required|exists:services_variations,id|string',
			'variation_id.*.*' => 'required|min:2|max:255|string',
			'pet_name' => 'required|array',
			'pet_name.*' => 'required|exists:pets_informations,id|string',
			'pet_name.*.*' => 'required|min:2|max:255|string',
			'price' => 'required|array',
			'price.*' => 'required|numeric'

			]);

		$validator->after(function($validator) use ($req) {
			$transaction = ServicesOrderTransaction::where('reference_no', '=', $req->reference_no)
			->where("voided_at", "=", null)
			->first();
			if (!(empty($transaction) || $transaction == null)) {
				$validator->errors()->add("reference_no", "Duplicate reference number");
			}
		});

		if ($validator->fails()) {
			Log::debug($validator->messages());

			return redirect()
				->back()
				->withErrors($validator)
				->withInput();
		}
		try {
			DB::beginTransaction(); 
			$serviceTransaction = ServicesOrderTransaction::create([
				'mode_of_payment' => $req->mode_of_payment,
				'reference_no' => $req->reference_no,
			]);
			for ($i = 0; $i < count($req->variation_id); $i++) {
				
				$ct = OtherTransation::create([
					'transaction_id'=> $serviceTransaction->id,
					'variation_id' => $req->variation_id[$i],
					'pet_name' => $req->pet_name[$i],
					'price' =>  $req->price[$i],
				]);
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);
			
			return redirect()
			->route('other.transaction.create')
			->with('flash_error', 'Something went wrong, please try again later');
		}
	// dd("TEST");
		return redirect()
			->route('transaction.service')
			->with('flash_success', "Transaction has been created successfully.");
	}

	// ----------------- VOID ---------------- //
	protected function voidConsultation($id) {
		$conTrans = ServicesOrderTransaction::with("consultation")->find($id);

		if ($conTrans == null || empty($conTrans)) {
			return redirect()
			->route('transaction.service')
			->with('flash_error', 'The transaction either does not exists or is already deleted.');
		}

		try {
			DB::beginTransaction();

			$conTrans->voided_at = Carbon::now();
			$conTrans->save();
		
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
			->route('transaction.service')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Voided successfully');
	}

	// ----------------- VOID ---------------- //
	protected function voidVaccination($id) {
		$vacTrans = ServicesOrderTransaction::with("vaccination")->find($id);

		if ($vacTrans == null || empty($vacTrans)) {
			return redirect()
			->route('transaction.service')
			->with('flash_error', 'The transaction either does not exists or is already deleted.');
		}

		try {
			DB::beginTransaction();

			$vacTrans->voided_at = Carbon::now();
			$vacTrans->save();
		
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
			->route('transaction.service')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Voided successfully');
	}

	// ----------------- VOID ---------------- //
	protected function voidBoarding($id) {
		$boardTrans = ServicesOrderTransaction::with("boarding")->find($id);

		if ($boardTrans == null || empty($boardTrans)) {
			return redirect()
			->route('transaction.service')
			->with('flash_error', 'The transaction either does not exists or is already deleted.');
		}

		try {
			DB::beginTransaction();

			$boardTrans->voided_at = Carbon::now();
			$boardTrans->save();
		
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
			->route('transaction.service')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Voided successfully');
	}

	// ----------------- VOID ---------------- //
	protected function voidGrooming($id) {
		$groomTrans = ServicesOrderTransaction::with("grooming")->find($id);

		if ($groomTrans == null || empty($groomTrans)) {
			return redirect()
			->route('transaction.service')
			->with('flash_error', 'The transaction either does not exists or is already deleted.');
		}

		try {
			DB::beginTransaction();

			$groomTrans->voided_at = Carbon::now();
			$groomTrans->save();
		
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
			->route('transaction.service')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Voided successfully');
	}

	// ----------------- VOID ---------------- //
	protected function voidTransaction($id) {
		$Trans = ServicesOrderTransaction::with("otherTransaction")->find($id);

		if ($Trans == null || empty($Trans)) {
			return redirect()
			->route('transaction.service')
			->with('flash_error', 'The transaction either does not exists or is already deleted.');
		}

		try {
			DB::beginTransaction();

			$Trans->voided_at = Carbon::now();
			$Trans->save();
		
		
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error($e);

			return redirect()
			->route('transaction.service')
			->with('flash_error', 'Something went wrong, please try again later');
		}

		return redirect()
		->route('transaction.service')
		->with('flash_success', 'Voided successfully');
	}


}
