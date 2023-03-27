@extends('layouts.admin')

@section('title', 'Boarding Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	
	<div class="card mx-auto">
		<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Boarding Transaction</h3>

		{{-- REFERENCE NO --}}
		<div class="row col-lg-12 col-12 col-md-12 mx-auto mt-3">
			<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
				<label class="important font-weight-bold text-1" for="ref_no">Reference No</label>
				<input class="form-control" type="text" name="ref_no" value="{{old('ref_no')}} " />
			</div>

			{{-- MODE OF PAYMENT --}}
			<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
				<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
				<select id="select" class="form-control" name="mop">
					<option>Select mode of payment</option>
					<option>Cash</option>
					<option>Paymaya</option>
					<option>Gcash</option>
				</select>
			</div>
		</div>

		<div class="card-body col-lg-12 col-12 col-md-12 mx-auto" id="form-area-grooming">
			<div class="position-relative border border-secondary col-lg-12 col012 col-md-12 mb-3" id="orig-groom">

				<div class="row">
					{{-- PET NAME  --}}
					<div class="col-lg-4 col-md-12 col-12 mt-3 mx-auto ">
						<label class="important font-weight-bold text-1" for="pet_name">Pet Name</label>
						<div class="input-group mb-3">
							<select class="custom-select text-1" id="inputGroupSelect01">
								<option selected name="pet_name" value="{{old('pet_name')}}"></option>
							</select>
						</div>
					</div>

					{{-- Service Name  --}}
					<div class="col-lg-4 col-md-12 col-12 mt-3 mx-auto ">
						<label class="important font-weight-bold text-1" for="pet_owner">Service Name</label>
						<div class="input-group mb-3">
							<select class="custom-select text-1" id="inputGroupSelect01">
								<option selected name="service_name" value="{{old('service_name')}}"></option>
							</select>
						</div>
					</div>

					{{-- PRICE --}}
					<div class="col-lg-4 col-md-12 col-12 mt-3 mr-auto ">
						<div class="form-group col-12 col-lg-8 col-md-6 mx-auto">
							<label class="important font-weight-bold text-1" for="price">Price</label>
							<input class="form-control bg-light" type="number" name="price" value="{{old('price')}}" readonly />
						</div>
					</div>
				</div>
			</div>

			{{-- TOTAL AMOUNT --}}
			<div class="col-12 col-lg-4 col-md-4 ml-auto mb-3">
				<label class="important  font-weight-bold text-1" for="total_amt">Total Amount</label>
				<div class="input-group flex-nowrap">
					<div class="input-group-prepend">
						<span class="input-group-text">₱</span>
					</div>
					<div class="input-group-append flex-fill">
						<div class="input-group">
							<input type="number" data-type="currency" name="total_amt" class="form-control" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- FOOTER --}}
		<div class="card-footer d-flex flex-column">
			<div class="col-4 my-2 mx-auto text-center">
				<button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
				<a href="#" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
			</div>
		</div>
	</div>
</div>
@endsection