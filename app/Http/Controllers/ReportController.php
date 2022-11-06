<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
	//REPORT
	protected function report() {
		return view('admin.report.index');
	}
}
