@extends('layouts.user')

@section('title', 'Appointment')

@section('content')
<form method="POST" action="{{ route('client.appointment.store') }}" class="card dark-shadow my-3 mt-5 mb-5 mx-auto w-md-50 w-100 w-lg-75" enctype="multipart/form-data">
	{{ csrf_field() }}
	
	<input type="hidden" name="service" value="{{ session('service') }}" readonly>
	<input type="hidden" name="isFromIndex" value="{{ session('isFromIndex') }}" readonly>

	<h2 class="card-header font-weight-bold col-lg-12 col-md-8 col-12 text-center text-white gbg-1">Appointment Information</h2>
	<div class="card-body">
		<div class="card border-light shadow-sm col-lg-8 col-md-12 col-12 mx-auto py-2">
			{{-- SERVICE --}}
			<div class="form-group">
				<label for="service" class="form-label">Service</label>
				<input type="text" class="form-control" value="{{ $service_name }}" readonly>
			</div>

			{{-- RESERVED AT --}}
			<div class="form-group">
				<label for="reserved_at" class="form-label">Date</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="fas fa-calendar-days"></i>
						</span>
					</div>
					<input type="date" name="reserved_at" class="form-control" value="{{ session('reserved_at') }}" readonly>
				</div>
			</div>
		</div>
	</div>

	<div class="card-body">
		<div class="card border-light shadow-sm col-lg-8 col-md-12 col-12 mx-auto py-2">
			{{--- TIME --}}
			<div class="form-group">
				<label>Please select an available time.</label>
				
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
					</div>

					<select class="custom-select" name="reserved_at_time" aria-label="Please select an available time">
						@foreach ($appointmentTimes as $k => $v)
						<option value="{{ $k + 1 }}" {{ old('reserved_at_time') == ($k + 1) ? 'selected' : '' }}>{{ $v }}</option>
						@endforeach
						<option {{ old('reserved_at_time') ? '' : 'selected'}} disabled>--- SELECT TIME ---</option>
					</select>
				</div>

				<small class="text-danger small">{{ $errors->first('reserved_at_time') }}</small>
			</div>

			{{-- NAME --}}
			<div class="form-group">
				<input class="form-control bg-light" placeholder="Name" type="text" name="owner_name" value="{{ $user->getName() }}" readonly />
			</div>

			<div class="row mb-3 mt-3">
				{{-- PET NAME --}}
				<div class="col-12 col-md-9 col-lg-6 mx-auto">
					<input class="form-control" placeholder="Pet Name" type="text" name="pet_name" value="{{ old('pet_name') }}" />
					<small class="text-danger small">{{ $errors->first('pet_name') }}</small>
				</div>

				{{-- BREED --}}
				<div class="col-12 col-md-9 col-lg-6 mx-auto">
					<input class="form-control" placeholder="Breed" type="text" name="breed" value="{{ old('breed') }}" />
					<small class="text-danger small">{{ $errors->first('breed') }}</small>
				</div>
			</div>
		</div>
	</div>

	<div class="card-footer col-12 col-lg-12 mx-auto text-center flex-row">
		<a href="{{ route('client.appointment.index')}}" class="btn btn-outline-custom btn-sm w-lg-25 w-50"><i class="fa-solid fa-arrow-left fa-lg mr-2"></i>Back</a>
		<button type="submit" class="btn btn-outline-custom btn-sm w-lg-25 w-50" data-type="submit">Make Appointment</button>
	</div>
</form>

@endsection

@section('post-script')
<script type="text/javascript" id="toRemove">
	$(document).ready(() => {
		let petNames = [
			@foreach($pets as $p)
			"{{ $p->pet_name }}",
			@endforeach
		];

		$(`[name="pet_name"]`).autocomplete({
			source: petNames,
			minLength: 0,
			delay: 0
		}).on('click focus', (e) => {
			$(e.currentTarget).autocomplete('search', $(e.currentTarget).val());
		}).on('autocompletechange autocompleteclose', (e) => {
			let obj = $(e.currentTarget);

			let petInformation = {
				@foreach($pets as $p)
				"{{ $p->pet_name}}": "{{ $p->breed }}",
				@endforeach
			};

			console.log(petInformation[obj.val()]);
			$(`[name="breed"]`)
				.val(petInformation[obj.val()])
				.text(petInformation[obj.val()]);
		});
	});
</script>
@endsection