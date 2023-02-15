@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="my-3"><a href="{{route('service_category.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services Category List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">
			<form class="card my-3 mx-auto h-100" action="{{ route('submit-service') }}" method="POST" enctype="multipart/form-data">
				<h3 class="card-header  text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Service Name</h3>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				
				<div class="card-body">
					<div class="col-12 col-md-6 col-lg-8  mx-auto mt-5">
						<div class="input-group mb-3 col-lg-12">
							<div class="input-group-prepend">
								<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Service Category</label>
							</div>

							<select class="custom-select" id="inputGroupSelect01" name="category_name">
								@foreach ($service as $s)
								<option value="{{ $s->id}}">{{ $s->service_category_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-8 mx-auto mt-3">
						<div class="input-group mb-3 col-lg-12">
							<div class="input-group-prepend">
								<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Service Name</label>
							</div>
							<input type="text" name="service_name" id="service" class="form-control">
						</div>
							<span class="text-danger">{{ $errors->first('service') }}</span>
					</div>
				</div>
				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50" type="submit" data-type="submit" data-action="submit">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection