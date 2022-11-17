@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('category.view', [$cid])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<form action="{{ route('product.update', [$cid, $product['id']]) }}" method="POST" class="card my-3 mx-auto" enctype="multipart/form-data">
				<h5 class="card-header text-center text-white gbg-1">Edit Product</h5>

				<div class="card-body d-flex">
					<div class="col-6 mx-auto">
						<div class="d-flex mt-1 ">
							<div class="mx-auto w-100">
								{{ csrf_field() }}

								<div class="form-group">
									<label class="h6 important" for="product_name">Product Name</label>
									<input class="form-control" type="text" name="product_name" value="{{ $product['name'] }}" />
								</div>

								<div class="row">
									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="stocks">Stocks</label>
										<input class="form-control" type="number" name="stocks" value="{{ $product['stocks'] }}" />
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important">Price</label>
										<div class="input-group ">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<input type="number" class="form-control" value="{{ $product['price'] }}" min="0.00" step=".25" />
										</div>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="h6 important" for="status">Status</label><br>
										
										<select class="custom-select" name="status">
											<option value="active" {{ $product['status'] ? 'checked' : '' }}>Active</option>
											<option value="inactive" {{ $product['status'] ? '' : 'checked' }}>Inactive</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="h6 important" for="categoryname">Category Name</label>
									<input class="form-control" type="text" name="categoryname" value="{{ $category['name'] }}" readonly />
								</div>

								<div class="form-group">
									<label class="h6 important" for="description">Description</label>
									<textarea class="form-control not-resizable" name="description" rows="3">{{ $product['description'] }}</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button type="submit" class="btn btn-outline-info btn-sm w-50" data-type="update">Save Changes</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

@endsection