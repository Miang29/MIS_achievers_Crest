@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('services.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services Category List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<div class="card my-3 mx-auto">
				<h5 class="card-header text-center font-weight-bold text-white gbg-1">Edit Service Category</h5>

				<div class="row card-body">
					<div class="col-12 ">
						<div class="d-flex mt-1 ">
							<div class="form-group mx-auto w-50"><br>

								<div class="row">
									<div class="col-6">
										<label class="h6 important font-weight-bold text-1" for="category">Service Category Name</label>
										<input class="form-control" type="text" name="category" value="{{old('category')}}" readonly />
									</div>

									<div class="col-6">
										<label class="h6 important font-weight-bold text-1 " for="productname">Service Name</label>
										<input class="form-control" type="text" name="productname" value="{{old('productname')}} " />
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-4">
										<label class="h6 important font-weight-bold text-1">Price</label>
										<div class="input-group ">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>
											<input type="number" class="form-control" value min="0.00" step=".01" />
										</div>
									</div>

									<div class="col-8 ml-auto">
										<label class="h6 font-weight-bold text-1 " for="category">Service Variation</label>
										<input class="form-control" type="text" name="category" value="{{old('category')}} " /><br>
									</div>
								</div>


								<label class="h6 font-weight-bold text-1 font-weight-bold text-1" for="remarks">Remarks</label>
								<textarea class="form-control not-resizable  my-2" name="remarks" rows="5"></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50"><a href="#"></a>Save Changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection