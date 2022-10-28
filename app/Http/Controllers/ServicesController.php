<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    		// -------SERVICES---------//

	//CONSULTATION
	protected function consultation() {
		return view('admin.services.consultation.index');
	}

	protected function createConsultation() {
		return view('admin.services.consultation.create');
	}

	protected function viewConsultation() {
		return view('admin.services.consultation.view');
	}

	protected function editConsultation() {
		return view('admin.services.consultation.edit');
	}

	//VACCINATION
	protected function vaccination() {
		return view('admin.services.vaccination.index');
	}

	protected function createVaccination() {
		return view('admin.services.vaccination.create');
	}

	protected function editVaccination() {
		return view('admin.services.vaccination.edit');
	}

	protected function viewVaccination() {
		return view('admin.services.vaccination.view');
	}

    	//PETBOARDING
	protected function boarding() {
		return view('admin.services.boarding.index');
	}

	protected function createBoarding() {
		return view('admin.services.boarding.create');
	}

	protected function editBoarding() {
		return view('admin.services.boarding.edit');
	}

	protected function viewBoarding() {
		return view('admin.services.boarding.view');
	}

		//PETGROOMING
		protected function grooming() {
			return view('admin.services.grooming.index');
		}
	
		protected function createGrooming() {
			return view('admin.services.grooming.create');
		}
	
		protected function editGrooming() {
			return view('admin.services.grooming.edit');
		}
	
		protected function viewGrooming() {
			return view('admin.services.grooming.view');
		}
}
