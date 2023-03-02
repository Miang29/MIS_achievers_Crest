@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0 ">
<h3 class="mt-3"><a href="{{route('service_variation.index', [$id, $serviceId]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Variation List</a></h3>

	<hr class="hr-thick" style="border-color: #707070;">
	<h2 class="font-weight-bold text-1 text-center">Services Information</h2>
	<div class="row">
		<div class="col-12 col-lg-8 col-md-8 mx-auto my-5 ">
			<div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
				<div class="position-absolute border border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
					{{-- CATEGORY NAME --}}
					<button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $variation['category_name']}}"></button>
					<span class="h2 m-auto text-truncate" >{{ $variation["category_name"]}}</span>
				</div>
				<div>
					<div class=" mt-5 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- SERVICE NAME --}}
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Service Name"><i class="fa-solid fa-gears"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $variation["service_name"]}}</span>
					</div>
					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- VARIATION NAME --}}
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Variation Name"><i class="fa-solid fa-list-check"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $variation["variation_name"]}}</span>
					</div>
					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						{{-- PRICE --}}
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Price"><i class="fa-solid fa-barcode"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $variation["price"]}}</span>
					</div>
					{{-- REMARKS --}}
					<div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Remarks"><i class="fa-solid fa-notes-medical"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ $variation["remarks"]}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection