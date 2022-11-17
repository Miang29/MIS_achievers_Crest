@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('category.view', [$cid])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<div class="card my-3 mx-auto">
				<h5 class="card-header text-center text-white gbg-1"> View Product</h5>

				<div class="card-body d-flex">
					<div class="col-6 mx-auto">
						<div class="d-flex mt-1 ">
							<div class="mx-auto w-100">
								{{ csrf_field() }}

								<div class="form-group">
									<label class="h6 important" for="product_name">Product Name</label>
									<input class="form-control" type="text" name="product_name" value="{{ $product['name'] }}" disabled />
								</div>

								<div class="row">
									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="stocks">Stocks</label>
										<input class="form-control" type="number" name="stocks" value="{{ $product['stocks'] }}" disabled />
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important">Price</label>
										<div class="input-group ">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<input type="text" class="form-control" value="{{ number_format($product['price']) }}" disabled />
										</div>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="status">Status</label><br>
										
										<select class="custom-select" name="status" disabled>
											<option value="active" {{ $product['status'] ? 'checked' : '' }}>Active</option>
											<option value="inactive" {{ $product['status'] ? '' : 'checked' }}>Inactive</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="h6 important" for="categoryname">Category Name</label>
									<input class="form-control" type="text" name="categoryname" value="{{ $category['name'] }}" disabled />
								</div>

								<div class="form-group">
									<label class="h6 important" for="description">Description</label>
									<textarea class="form-control not-resizable" name="description" rows="3" disabled>{{ $product['description'] }}</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection