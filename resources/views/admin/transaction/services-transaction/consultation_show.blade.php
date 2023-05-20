@extends('layouts.admin')

@section('title', 'View Consultation Transaction')

@section('content')
<div class="container-fluid m-0">
    <h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="card mx-auto mt-4">
        <h5 class="card-header gbg-1"></h5>
            <div class="card-body">
                <div class ="row">

                     <div class="col-lg-6 col-md-4 col-6 mx-auto">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Reference No</span>
                          </div>
                          <input type="text" class="form-control bg-white" readonly value="{{ $conTran->reference_no}}" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-4 col-6 mx-auto">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Mode of Payment</span>
                          </div>
                          <input type="text" class="form-control bg-white" readonly value="{{ $conTran->mode_of_payment}}" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>


                <div class="card-body">
                     <div class="row mb-3">
                        @foreach($conTran->consultation as $ct)
                          <div class="col-12 col-md-12 col-lg-6">
                            <div class="row mx-1 border rounded p-3 shadow flex-fill position-relative">
                              <div class="col-lg-12 col-md-12 col-12">
                                
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-gears fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="{{ $ct->serviceVariation->services->service_name }}"  aria-describedby="basic-addon1">
                                </div>

                                    <div class="dropdown-divider"></div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="₱{{ $ct->price }}.00"  aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="₱{{ $ct->additional_cost }}.00"  aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-paw fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="{{ $ct->petsInformations->pet_name }}"  aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-weight-scale fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="{{ $ct->weight }}"  aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-temperature-three-quarters fa-lg text-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="{{ $ct->temperature }}"  aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-notes-medical fa-lg text-1"></i></span>
                                    </div>
                                        <textarea class="form-control bg-white" aria-describedby="basic-addon1" readonly rows="3">{{ $ct->findings }}</textarea>
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-notes-medical fa-lg text-1"></i></span>
                                    </div>
                                        <textarea class="form-control bg-white" aria-describedby="basic-addon1" readonly rows="3">{{ $ct->treatment }}</textarea>
                                </div>

                                 <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-equals fa-lg text-1 mr-1"></i></span>
                                    </div>
                                        <input type="text" class="form-control bg-white" readonly value="₱{{ $ct->total }}.00"  aria-describedby="basic-addon1">
                                </div>
                              </div>
                          </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection