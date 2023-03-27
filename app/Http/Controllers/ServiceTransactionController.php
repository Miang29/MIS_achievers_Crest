<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceTransactionController extends Controller
{
    //----------- SERVICES TRANSACTION ------------- //
    // ----------------- INDEX ------------------ //
    protected function Service()
    {
        return view('admin.transaction.services-transaction.index');
    }


    // ------------- CREATE Consultation TRANSACTION -------------- //
    protected function createConsultation()
    {
        // $serviceCat = ServicesCategory::has("services", '>', 0)->get();
        return view('admin.transaction.services-transaction.consultation-create',[
            // 'serviceCategory' => $serviceCat,
        ]);
    }

       // ------------- CREATE VACCINATION TRANSACTION -------------- //
    protected function createVaccination()
    {
          return view('admin.transaction.services-transaction.vaccination-create');
    }

       // ------------- CREATE GROOMING TRANSACTION -------------- //
    protected function createGrooming()
    {
          return view('admin.transaction.services-transaction.grooming-create');
    }

       // ------------- CREATE BOARDING TRANSACTION -------------- //
    protected function createBoarding()
    {
          return view('admin.transaction.services-transaction.boarding-create');
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
