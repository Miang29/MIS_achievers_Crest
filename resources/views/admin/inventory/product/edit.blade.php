@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('category.view', [$id]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h3>

	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<form  method="POST"  action=" {{ route('product.update', [$id, $product->id])}}" class="card my-3 mx-auto" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<h5 class="card-header text-center text-white gbg-1">Edit Product</h5>
				
				<div class="card-body d-flex">
					<div class="col-12 col-lg-6 col-md-6 mx-auto">
						<div class="d-flex mt-1 ">
							<div class="mx-auto w-100">

								<div class="form-group">
									<label class="h6 important" for="product_name">Product Name</label>
									<input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" />
									<small class="text-danger small">{{ $errors->first('product_name') }}</small>
								</div>

								<div class="row">
									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="stocks">Stocks</label>
										<input class="form-control" type="number" name="stocks" value="{{ $product->stocks }}" />
										<small class="text-danger small">{{ $errors->first('stocks') }}</small>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important">Price</label>
										<div class="input-group ">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>
											<input type="number" name="price" class="form-control" value="{{ $product->price }}" min="0.00" step=".25" />
											<small class="text-danger small">{{ $errors->first('price') }}</small>
										</div>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="status">Status</label><br>
										<div class="input-group ">
											<select class="custom-select" name="status">
												<option value="active" {{ $product['status'] ? 'checked' : '' }}>Active</option>
												<option value="inactive" {{ $product['status'] ? '' : 'checked' }}>Inactive</option>
											</select>
											<small class="text-danger small">{{ $errors->first('status') }}</small>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="h6 important" for="description">Description</label>
									<textarea class="form-control not-resizable" name="description" rows="3">{{ $product->description }}</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer d-flex">
					<div class="col-lg-4 col-12 col-md-4 mx-auto text-center">
						<button type="submit" data-action ="update" class="btn btn-outline-info btn-sm w-50" data-type="submit">Update</button>
						 <a href="javascript:void(0);" onclick="confirmLeave('{{ route('category.view',[$id]) }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-50 mr-auto w-50">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
@endsection