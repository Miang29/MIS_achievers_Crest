@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('services.show', [1])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<div class="card my-3 mx-auto">
				<h3 class="card-header  text-white gbg-1">CREATE SERVICE </h3>

				<form class="card-body">
					{{ csrf_field() }}
					<div class="w-lg-75 mx-auto">

						<div class="col-12 d-flex">
							<div class="form-group mx-auto w-50">
								<label class="h6 important font-weight-bold text-1" for="category">Service Name</label>
								<input class="form-control" type="text" name="service" value="{{ old('service') }}" />
							</div>
						</div>

						<div class="col-12 ml-auto">
							<div class="row">
								<div class="col-12 col-md-6 col-lg-4 ml-auto">
									<label class="h6 important my-2 font-weight-bold text-1" for="category">Variation Name</label>
									<input class="form-control" type="text" name="variation" value="{{old('variation')}}" />
								</div>
								
								<div class="col-12 col-md-6 col-lg-4 mr-auto">
									<label class="h6 important my-2 font-weight-bold text-1">Price</label>
									<div class="input-group ">
										<div class="input-group-prepend">
											<span class="input-group-text">₱</span>
										</div>
										<input type="number" class="form-control" value min="0.00" step=".01" />
									</div>
								</div>
							</div>
						</div>

						<div class="col-4 mr-auto">
						</div>
					   
						<div class="col-8 mx-auto">
							<label class="h6 font-weight-bold my-2 font-weight-bold text-1" for="remarks">Remarks</label>
							<textarea class="form-control not-resizable  my-2" name="remarks" rows="5"></textarea>
						</div>


					</div>
				</form>


				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50"><a href="#"></a>Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection