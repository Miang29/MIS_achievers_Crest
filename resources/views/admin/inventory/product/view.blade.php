@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="container-fluid m-0">
<h3 class="mt-3"><a href="{{route('category.view', [$cid])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h3>
	
	<hr class="hr-thick" style="border-color: #707070;">

	<h2 class="font-weight-bold text-1 text-center">View Product Information</h2>
	<div class="row" id="form-area">
		<div class="col-8 mx-auto my-5 ">

			<div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-100 w-md-100">
				{{ csrf_field() }}

				<div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
					{{-- PRODUCT NAME --}}
					<button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $product['name'] }}"></button>
					<span class="h2 m-auto text-truncate">{{ $product["name"] }}</span>
				</div>

				{{-- STOCKS --}}
				<div class="mt-5 border-secondary border-bottom w-lg-50  w-100 w-md-100 mx-auto">
					<button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Stocks"><i class="fa-solid fa-arrow-trend-up mr-2"></i>Stocks</button>
					<span class="h5 m-auto text-wrap text-1">{{ $product['stocks'] }}</span>
				</div>

				{{-- PRICE --}}
				<div class="mt-3 border-secondary border-bottom w-lg-50 w-100 w-md-100 mx-auto">
					<button class="btn  font-weight-bold" data-toggle="tooltip" data-placement="left" title="Price"><i class="fa-solid fa-tag mr-2"></i>Price</button>
					<span class="h5 m-auto text-wrap text-1">{{ number_format($product['price']) }}</span>
				</div>

				{{-- STATUS --}}
				<div class="mt-3 border-secondary border-bottom w-lg-50 w-100 w-md-100 mx-auto">
					<button class="btn  font-weight-bold" data-toggle="tooltip" data-placement="left" title="Status"><i class="fa-solid fa-circle-half-stroke mr-2"></i>Status</button>
					<span class="h5 m-auto text-wrap text-1" value="active" {{ $product['status'] ? 'Checked' : '' }}> Active</span>
				</div>

				{{-- CATEGORY NAME --}}
				<div class="mt-3 border-secondary border-bottom w-lg-50 w-100 w-md-100 mx-auto">
					<button class="btn  font-weight-bold" data-toggle="tooltip" data-placement="left" title="Category Name"><i class="fa-solid fa-shield-cat mr-2"></i>Category Name</button>
					<span class="h5 m-auto text-wrap text-1">{{ $category['name'] }}</span>
				</div>


				{{-- DESCRIPTION --}}
				<div class="mt-3 border-secondary border-bottom w-lg-50 w-100 w-md-100 mx-auto">
					<button class="btn  font-weight-bold" data-toggle="tooltip" data-placement="left" title="Description"><i class="fa-solid fa-note-sticky mr-2"></i>Description</button>
					<span class="h5 m-auto text-wrap text-1">{{ $product['description'] }}</span>
				</div>



			</div>


		</div>
	</div>
</div>


@endsection