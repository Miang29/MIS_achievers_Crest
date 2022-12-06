@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12 col-lg-12">
			<form class="card my-3">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Appointment</h3>
				<div class="card-body d-flex">

					<div class="col-lg-12 ">

						{{-- OWNER --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto ">
							<label class="h6 important" for="petowner">Pet Owner</label>
							<input class="form-control" type="text" name="petowner" value="{{old('petowner')}} " />
						</div>

						{{-- PET --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto">
							<label class="h6 important" for="petname">Pet Name</label>
							<input class="form-control" type="text" name="petname" value="{{old('petname')}} " />
						</div>

						{{-- EMAIL --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto">
							<label class="h6 important" for="email">Email</label>
							<input class="form-control" type="email" name="email" value="{{old('email')}} " />
						</div>
						{{-- DATE --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto">
							<label class="h6 important" for="date">Date</label>
							<input class="form-control" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
						</div>

						{{-- TIME --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto">
							<label class="h6 important" for="time">Time</label>
							<input class="form-control" type="time" name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
						</div>

						{{-- SERVICE-TYPE --}}
						<div class="form-group col-lg-6 col-12 col-md-12 mx-auto">
							<label class="h6 important" for="service-type">Service Type</label>
							<div class="input-group ">
								<select class="custom-select" id="inputGroupSelect01">
									<option selected name="service-type"></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer d-flex">
					<div class="col-lg-4 col-md-4 col-8 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50 mb-3">Save</button>
						<a href="#" class="btn btn-outline-danger btn-sm w-50 mb-3">Cancel</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection