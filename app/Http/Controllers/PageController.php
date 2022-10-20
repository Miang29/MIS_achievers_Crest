<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	protected function dashboard() {
		return view('layouts.admin');
	}
}