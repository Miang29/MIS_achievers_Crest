<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //CLIENT-PROFILE
	protected function clientProfile(){

		return view('admin.clientprofile.index');
	}

	protected function createClientprofile(){

		return view('admin.clientprofile.create');
	}

	protected function editClientprofile(){

		return view('admin.clientprofile.client.edit');
	}

	protected function viewClientprofile(){

		return view('admin.clientprofile.client.view');
	}

	protected function EditPetprofile(){

		return view('admin.clientprofile.pet.edit');
	}

	protected function viewPetprofile(){
        
		return view('admin.clientprofile.pet.view');
	}
}
