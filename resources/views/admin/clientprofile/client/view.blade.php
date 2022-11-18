@extends('layouts.admin')

@section('title', 'Client Profile')

@section('content')
<div class="container-fluid m-0 ">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('client-profile')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i>Client Profile List</a></h2>
	
	<hr class="hr-thick" style="border-color: #707070;">
	
	<h2 class="font-weight-bold text-1">Client Information</h2>
	<div class="w-50 row col-12 h-50 mx-auto my-5">

		<div class="card card-body position-relative">
			<div class="position-absolute border border-secondary bg-1 text-white text-center d-flex" style="top: -1.8rem; left:1.5rem; width:50%; height:4rem;">
				{{-- CLIENT NAME  --}}
				<span class="h2 m-auto text-wrap">{{ $client["name"] }}</span>
			</div>

			<div>
				<div class=" mt-4">
					{{-- EMAIL --}}
					<button class="btn btn-info mr-2" data-toggle="tooltip" data-placement="left" title="Email"><i class="fa-solid fa-envelope"></i></button>
					<span class="h5 my-0 text-wrap">{{ $client["email"] }}</span>
				</div>

				<div class="mt-3">
					{{-- TELEPHONE  --}}
					<button class="btn btn-info mr-2" data-toggle="tooltip" data-placement="left" title="Telephone"><i class="fa-solid fa-phone"></i></button>
					<span class="h5 my-0 text-wrap">{{ $client["telephone"] }}</span>
				</div>

				<div class="mt-3">
				{{-- MOBILE  --}}
					<button class="btn btn-info mr-2" data-toggle="tooltip" data-placement="left" title="Mobile No"><i class="fa-solid fa-mobile-button"></i></button>
					<span class="h5 my-0 text-wrap">{{ $client["mobile"] }}</span>
				</div>

				{{-- TYPES --}}
				<div class="mt-3">
					<button class="btn btn-info mr-2" data-toggle="tooltip" data-placement="left" title="Types"><i class="fa-solid fa-check-to-slot"></i></button>
					<span class="h5 my-0 text-wrap">{{ ucfirst($client["type"]) }}</span>
				</div>

				<div class="mt-3">
					{{-- ADDRESS  --}}
					<button class="btn btn-info mr-2" data-toggle="tooltip" data-placement="left" title="Address"><i class="fa-solid fa-address-book"></i></button>
					<span class="h5 my-0 text-wrap">{{ $client["address"] }}</span>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection