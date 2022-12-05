@extends('layouts.admin')

@section('title', 'Client Profile')

@section('content')
<div class="container-fluid m-0 ">
	<h3 class="text-center text-lg-left  text-sm-left mx-0 mx-lg-5 my-3">
		<a href="{{route('client-profile')}}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Profile List</a>
	</h3>

	<hr class="hr-thick" style="border-color: #707070;">

	<h2 class="font-weight-bold text-1 text-center">Client Information</h2>
	<div class="row">
		<div class="col-8 col-md-8 col-12 mx-auto my-5 ">

			<div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
				<div class="position-absolute border border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
					{{-- CLIENT NAME  --}}
					<button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $client['name'] }}"  ></button>
					<span class="h2 m-auto text-truncate" >{{ $client["name"] }}</span>
				</div>

				<div>
					<div class=" mt-5 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- EMAIL --}}
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Email"><i class="fa-solid fa-envelope"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $client["email"] }}</span>
					</div>

					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- TELEPHONE  --}}
						<button class="btn  mr-2" data-toggle="tooltip" data-placement="left" title="Telephone"><i class="fa-solid fa-phone"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $client["telephone"] }}</span>
					</div>

					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- MOBILE  --}}
						<button class="btn  mr-2" data-toggle="tooltip" data-placement="left" title="Mobile No"><i class="fa-solid fa-mobile-button"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $client["mobile"] }}</span>
					</div>

					{{-- TYPES --}}
					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Types"><i class="fa-solid fa-check-to-slot"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ ucfirst($client["type"]) }}</span>
					</div>

					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- ADDRESS  --}}
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Address"><i class="fa-solid fa-address-book"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $client["address"] }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection