<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\User;

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
				$data = $this->getTransactionSales($from, $to);
				break;

			case 'transaction-services':
				$data = $this->getTransactionServices($from, $to);
				break;

			case 'user':
			default:
				$data = $this->getUsers($from, $to);
				break;
		}

		// $fromMin = Carbon\Carbon::parse(Carbon\Carbon::now()->format('Y-m')."-1")->format('Y-m-d');
		// $fromMax = ;
		// $toMin = ;
		// $toMax = ;

		return view('admin.report.index', [
			'data' => $data,
			'type' => $t,
			'from' => $from,
			'to' => $to,
		]);
	}

	// GETTERS
	private function getAppointments($from, $to) {
		return [];
	}

	private function getClients($from, $to) {
		return [];
	}

	private function getInventory($from, $to) {
		return [];
	}

	private function getServices($from, $to) {
		return [];
	}

	private function getTransactionSales($from, $to) {
		return [];
	}

	private function getTransactionServices($from, $to) {
		return [];
	}

	private function getUsers($from, $to) {
		return User::whereDate('created_at', '>', $from)->get();
	}
}