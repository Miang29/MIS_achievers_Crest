<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
	
	//SETTINGS 
	protected function settings() {
		return view('admin.settings.index');
	}

}