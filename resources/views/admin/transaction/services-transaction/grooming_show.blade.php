@extends('layouts.admin')

@section('title', 'View Grooming Transaction')

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
                      <input type="text" class="form-control bg-white" readonly value="{{ $groomTran->reference_no}}" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-lg-6 col-md-4 col-6 mx-auto">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Mode of Payment</span>
                      </div>
                      <input type="text" class="form-control bg-white" readonly value="{{ $groomTran->mode_of_payment}}" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

             <div class="card-body">
	            <div class="row mb-3">
	               @foreach($groomTran->grooming as $gt)
	                  	<div class="col-12 col-md-12 col-lg-6">
		                    <div class="row mx-1 border rounded p-3 shadow flex-fill position-relative">
		                      	<div class="col-lg-12 col-md-12 col-12">

		                      		<div class="input-group mb-3 mt-3">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-gears fa-lg text-1"></i></span>
	                                    </div>
                                        	<input type="text" class="form-control bg-white" readonly value="{{ $gt->variations->variation_name }}"  aria-describedby="basic-addon1">
                                	</div>

									<div class="input-group mb-2">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
	                                    </div>
	                                        <input type="text" class="form-control bg-white" readonly value="₱{{ $gt->price }}.00"  aria-describedby="basic-addon1">
                               		</div>

                                	<div class="dropdown-divider"></div>

                                	<div class="input-group mb-2">
	                                    <div class="input-group-prepend">
	                                        <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-paw fa-lg text-1"></i></span>
	                                    </div>
	                                        <input type="text" class="form-control bg-white" readonly value="{{ $gt->petsInformations->pet_name }}"  aria-describedby="basic-addon1">
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