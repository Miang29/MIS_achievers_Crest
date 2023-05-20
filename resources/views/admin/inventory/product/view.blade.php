@extends('layouts.admin')

@section('title', 'View Product')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('category.view', [$id])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	<div class="card mx-auto">
		 <h5 class="card-header gbg-1"></h5>
		 <h2 class="font-weight-bold text-1 text-center mt-5">Product Information</h2>
		<div class=" card col-lg-6 col-md-4 col-6 mx-auto my-3 border rounded p-3 shadow">
			{{-- PRODUCT NAME --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold text-1" id="basic-addon1">Product Name</span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $products->product_name }}" aria-describedby="basic-addon1">
            </div>
            <div class="dropdown-divider"></div>

            {{-- STOCKS --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-arrow-trend-up fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{$products->stocks }} pcs." aria-describedby="basic-addon1">
            </div>
             {{-- PRICE --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="₱{{ ($products->price) }}.00" aria-describedby="basic-addon1">
            </div>
            {{-- STATUS --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-circle-half-stroke fa-lg text-1 mr-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="active" {{ $products['status'] ? 'Checked' : '' }}" aria-describedby="basic-addon1">
            </div> 
            {{-- DESCRIPTION --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-note-sticky fa-lg text-1 mr-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $products->description }}" aria-describedby="basic-addon1">
            </div> 
		</div>
	</div>
</div>
@endsection