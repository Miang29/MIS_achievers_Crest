<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Log;

class PageController extends Controller
{
	// DASH BOARD
	protected function redirectDashboard() {
		return redirect()->route('dashboard');
	}

	protected function dashboard() {
		$months = array();
		$monthly_earnings = array();

		for ($i = 1; $i <= Carbon::now()->format('m'); $i++) {
			array_push($months, Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-' . Carbon::now()->format('d'))->format('M'));

			array_push(
				$monthly_earnings,
				// SalesOrder::where('created_at', '>=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i . '-01'))
				// 	->where('created_at', '<=', Carbon::parse(Carbon::now()->format('Y') . '-' . $i)->endOfMonth())
				// 	->where('status', '>=', '3')
				// 	->get()
				// 	->sum('price')
				random_int(0, 10000)
			);
		}

		return view('admin.dashboard', [
			'months' => $months,
			'monthly_earnings' => $monthly_earnings
		]);
	}


	// CLIENT PANEL
	protected function user() {
		return view('index');
	}

	protected function Appointment() {
		return view('appointment');
	}

	protected function ServicesOffer() {
		return view('services');
	}

}
