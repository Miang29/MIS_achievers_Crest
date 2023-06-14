<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;
use App\Appointments;
use App\PetsInformation;
use App\Products;
use App\ProductCategory;
use App\Services;
use App\ProductsOrderTransaction;
use App\ServicesOrderTransaction;
use App\ProductsOrderTransactionItem;
use App\ConsultationTransaction;
use App\VaccinationTransaction;
use App\GroomingTransaction;
use App\BoardingTransaction;
use App\OtherTransaction;


use Auth;
use DB;
use Exception;
use Log;

class ReportController extends Controller
{
	//REPORT
	protected function report(Request $req) {
		$date = Carbon::now()->timezone("Asia/Manila");
		$from = $req->from;
		$to = $req->to;
		$t = $req->t;

		if ($req->t == null)
			$t = "users";

		if ($req->from == null)
			$from = Carbon::parse("{$date->format('Y-m')}-1")->format('Y-m-d');

		if ($req->from == null)
			$to = Carbon::parse("{$date->format('Y-m-d')}")->format("Y-m-d");

		switch ($t) {
			case 'appointments':
				$data = $this->getAppointments($from, $to);
				break;

			case 'pets':
				$data = $this->getPets($from, $to);
				break;

			case 'clients':
				$data = $this->getClients($from, $to);
				break;

			case 'inventory':
				$data = $this->getInventory($from, $to);
				break;

			case 'services':
				$data = $this->getServices($from, $to);
				break;

			case 'transaction-sales':
				$data = $this->getProductOrder($from, $to);
				break;

			case 'transaction-services':
				$data = $this->getConsultation($from, $to);
				break;

			case 'transaction-vaccination':
				$data = $this->getVaccination($from, $to);
				break;

			case 'transaction-grooming':
				$data = $this->getGrooming($from, $to);
				break;

			case 'transaction-boarding':
				$data = $this->getBoarding($from, $to);
				break;

			case 'transaction-other':
				$data = $this->getOther($from, $to);
				break;

			case 'user':
			default:
				$data = $this->getUsers($from, $to);
				break;
		}

		return view('admin.report.index', [
			'data' => $data,
			'type' => $t,
			'from' => $from,
			'to' => $to,
		]);
	}

	protected function print(Request $req) {
		$output = $req->output;
		$date = Carbon::now()->timezone("Asia/Manila");
		$from = $req->from;
		$to = $req->to;
		$t = $req->t;

		if ($req->output == null)
			$output = 'print';

		if ($req->t == null)
			$t = "users";

		if ($req->from == null)
			$from = Carbon::parse("{$date->format('Y-m')}-1");
		else
			$from = Carbon::parse($from);

		if ($req->from == null)
			$to = Carbon::parse("{$date->format('Y-m-d')}");
		else
			$to = Carbon::parse($to);

		switch ($t) {
			case 'appointments':
				$data = $this->getAppointments($from, $to);
				break;

		  	case 'pets':
				$data = $this->getPets($from, $to);
				break;

			case 'clients':
				$data = $this->getClients($from, $to);
				break;

			case 'inventory':
				$data = $this->getInventory($from, $to);
				break;

			case 'services':
				$data = $this->getServices($from, $to);
				break;

			case 'transaction-productOrder':
				$data = $this->getProductOrder($from, $to);
				break;

			case 'transaction-services':
				$data = $this->getConsultation($from, $to);
				break;

			case 'transaction-vaccination':
				$data = $this->getVaccination($from, $to);
				break;

			case 'transaction-grooming':
			$data = $this->getGrooming($from, $to);
			break;

			case 'transaction-boarding':
				$data = $this->getBoarding($from, $to);
				break;

			case 'transaction-other':
				$data = $this->getOther($from, $to);
				break;

			case 'user':
			default:
				$data = $this->getUsers($from, $to);
				break;
		}

		return view('admin.report.print', [
			'output' => $output,
			'data' => $data,
			'type' => $t,
			'from' => $from,
			'to' => $to,
		]);
	}

	// GETTERS
	private function getAppointments($from, $to) {
		return Appointments::whereDate('created_at','>=', $from)->get();
	}

	private function getPets($from, $to) {
		return PetsInformation::whereDate('created_at','>=', $from)->get();
	}

	private function getClients($from, $to) {
		return User::where('user_type_id', '=', 4)->whereDate('created_at','>=', $from)->get();
	}

	private function getInventory($from, $to) {

		return Products::whereDate('created_at','>=', $from)->get();
	}

	private function getProductOrder($from, $to) {
		return ProductsOrderTransaction::has("productsOrderItems", '>', 0)->whereDate('created_at','>=', $from)->get();

	}

	private function getServices($from, $to) {
		return Services::has("variations", '>', 0)->with(['variations','variations.servicesCategory'])->whereDate('created_at', '>=', $from)->get();
	}

	private function getConsultation($from, $to) {
		return ServicesOrderTransaction::has("consultation", '>', 0)->with(['consultation','consultation.serviceVariation','consultation.serviceVariation.services','consultation.petsInformations'])->whereDate('created_at', '>=', $from)->get();
		
	}

	private function getVaccination($from, $to) {
			return ServicesOrderTransaction::has("vaccination", '>', 0)->with(['vaccination','vaccination.variations','vaccination.petsInformations'])->whereDate('created_at', '>=', $from)->get();
	}

	private function getGrooming($from, $to) {
			return ServicesOrderTransaction::has("grooming", '>',0)->with(['grooming','grooming.variations','grooming.petsInformations' ])->whereDate('created_at', '>=', $from)->get();
	}

	private function getBoarding($from, $to) {
			return ServicesOrderTransaction::has("boarding", '>', 0)->with(['boarding','boarding.variations','boarding.variations.services','boarding.petsInformations'])->whereDate('created_at', '>=', $from)->get();
	}

	private function getOther($from, $to) {
			return ServicesOrderTransaction::has("otherTransaction",'>',0)->with(['otherTransaction','otherTransaction.variations','otherTransaction.variations.services','otherTransaction.variations.services','otherTransaction.petsInformations'])->whereDate('created_at', '>=', $from)->get();
	}

	private function getUsers($from, $to) {
		return User::whereDate('created_at', '>=', $from)->get();
	}
}