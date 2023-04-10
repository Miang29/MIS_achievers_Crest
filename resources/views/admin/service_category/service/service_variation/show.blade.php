@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0 ">
<h3 class="mt-3"><a href="{{route('service_variation.index', [$id, $serviceId]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Variation List</a></h3>
	{{ csrf_field() }}
	<hr class="hr-thick" style="border-color: #707070;">
	
	<div class="card mx-auto">
		 <h5 class="card-header gbg-1"></h5>
		 <h2 class="font-weight-bold text-1 text-center mt-5">Service Information</h2>
		<div class=" card col-lg-6 col-md-4 col-6 mx-auto my-3 border rounded p-3 shadow">
			{{-- CATEGORY NAME --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Category Name</span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $variation->services->servicesCategory->service_category_name }}" aria-describedby="basic-addon1">
            </div>
             <div class="dropdown-divider"></div>
             {{-- SERVICE NAME --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-gears fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $variation->services->service_name }}" aria-describedby="basic-addon1">
            </div>
            {{-- VARIATION NAME --}}
             <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-list-check fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $variation->variation_name }}" aria-describedby="basic-addon1">
            </div>
            {{-- PRICE --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $variation->price }}" aria-describedby="basic-addon1">
            </div>
            {{-- REMARKS --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-notes-medical fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $variation->remarks }}" aria-describedby="basic-addon1">
            </div>
        </div>
	</div>
</div>
@endsection