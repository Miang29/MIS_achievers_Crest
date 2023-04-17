<?php

namespace App\Http\Controllers;

use App\Services;
use App\ServicesCategory;
use App\ServicesVariation;
use App\PetsInformation;
use App\User;
use Illuminate\Http\Request;

use DB;
use Exception;
use Log;
use Validator;


class ServiceTransactionController extends Controller
{
    // SERVICES TRANSACTION 
    // INDEX 
    protected function Service()
    {
        return view('admin.transaction.services-transaction.index');
    }

    // CREATE Consultation TRANSACTION
    protected function createConsultation()
    {
        $service = Services::find(2);
        $owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
        return view('admin.transaction.services-transaction.consultation-create',[
            'services' => $service,
            'owner' => $owner,
        ]);
    }

       // CREATE VACCINATION TRANSACTION
    protected function createVaccination()
    {
        $services = Services::where('id', '=', 14)->has("variations", '>', 0)->with('variations')->get();
        // dd($serVar);
        $owner = User::where('user_type_id', '=', 4)->has("petsInformations", '>', 0)->with('petsInformations')->get();
          return view('admin.transaction.services-transaction.vaccination-create',[
            'services' => $services,
            'owner' => $owner,

          ]);

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
    

    // SHOW
    protected function show($id)
    {
        $services = $this->services[$id];

        return view('admin.transaction.services-transaction.view', [
            'id' => $id,
            'services' => $services
        ]);
    }
    // ARCHIVE
    protected function deleteServices($id)
    {
        return redirect()
        ->route('transaction.service')
        ->with('flash_success', 'Successfully removed transaction from table');
    }
}
