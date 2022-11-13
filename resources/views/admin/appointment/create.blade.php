@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h2 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<form class="card my-3 mx-auto">
				<h3 class="card-header  text-white gbg-1">Create Appointment</h3>

				<div class="card-body">
					<div class="row">
						<div class=" col-12 col-lg-6">
							{{-- OWNER --}}
							<div class="form-group w-75 mx-auto">
								<label class="h6 important" for="petowner">Pet Owner</label>
								<input class="form-control" type="text" name="petowner" value="{{old('petowner')}} " />
							</div>

							{{-- EMAIL --}}
							<div class="form-group w-75 mx-auto">
								<label class="h6 important" for="email">Email</label>
								<input class="form-control" type="email" name="email" value="{{old('email')}} " />
							</div>

							{{-- PET --}}
							<div class="form-group w-75 mx-auto">
								<label class="h6 important" for="petname">Pet Name</label>
								<input class="form-control" type="text" name="petname" value="{{old('petname')}} " />
							</div>
						</div>

						<div class="col-12 col-lg-6 form-group">
							{{-- DATE --}}
							<div class="form-group w-75 mx-auto">
								<label class="h6 important" for="date">Date</label>
								<input class="form-control" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
							</div>

							{{-- TIME --}}
							<div class="form-group w-75 mx-auto">
								<label class="h6 important" for="time">Time</label>
								<input class="form-control" type="time" name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
							</div>
						</div>

					</div>
				</div>
				
				<div class="card-footer d-flex flex-row">
					<button class="btn btn-outline-custom ml-auto mr-4 w-25" type="submit">Book</button>
					<a href="{{ route('appointments.index') }}" class="btn btn-outline-danger ml-1 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
