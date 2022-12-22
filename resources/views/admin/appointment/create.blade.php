@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12 col-lg-12">
			<form method="POST" action="{{route ('save-appointments')}}" class="card my-3" enctype="multipart/form-data">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Appointment</h3>
				{{ csrf_field() }}
				<div class="card-body d-flex">
					<div class="col-lg-8 mx-auto ">

						{{-- OWNER --}}
						<div class="form-group">
							<input class="form-control border-secondary" type="text" name="pet_owner" value="{{old('petowner')}}" placeholder="Pet Owner" />
							<small class="text-danger small">{{ $errors->first('pet_owner') }}</small>
						</div>

						{{-- PET --}}
						<div class="form-group">
							<input class="form-control border-secondary" type="text" name="pet_name" value="{{old('petname')}}" placeholder="Pet Name" />
							<small class="text-danger small">{{ $errors->first('pet_name') }}</small>
						</div>

						{{-- EMAIL --}}
						<div class="form-group">
							<input class="form-control border-secondary" type="email" name="email" value="{{old('email')}} " placeholder="Email" />
							<small class="text-danger small">{{ $errors->first('email') }}</small>
						</div>

						{{-- DATE --}}
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white border-secondary">Date</span>
								</div>
								<input class="form-control border-secondary border-left-0" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
							</div>
							<small class="text-danger small">{{ $errors->first('date') }}</small>
						</div>

						{{-- TIME --}}
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text bg-white border-secondary">Time</div>
								</div>
								<input class="form-control border-secondary border-left-0" type="time" name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
							</div>
							<small class="text-danger small">{{ $errors->first('time') }}</small>
						</div>

						{{-- SERVICE-TYPE --}}
						<div class="form-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-white border-secondary border-right-0">Service Type</span>
								<select class="custom-select border-secondary border-left-0" id="inputGroupSelect01" name="service_type">
									<option selected name="service_type">Consultation</option>
									<option selected name="service_type">Vaccination</option>
									<option selected name="service_type"></option>
								
								</select>
							</div>
							<small class="text-danger small">{{ $errors->first('service_type') }}</small>
						</div>
					</div>
				</div>

				<div class="card-footer  d-flex flex-row">
					<button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit">Book</button>
					<a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.create') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-25 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection