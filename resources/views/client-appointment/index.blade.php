@extends('layouts.user')

@section('title', 'Set an Appointment')

@section('content')
<form method="GET" action="{{ route('client.appointment.create') }}" class="card dark-shadow mt-5 mb-5 mx-auto w-md-50 w-100 w-lg-75" enctype="multipart/form-data">
	<input type="hidden" name="isFromIndex" value="1" readonly>

	<h2 class="card-header col-lg-12 col-md-8 col-12 text-center gbg-1"></h2>

	<div class="card-body">
		<div class="card border-light col-lg-8 col-md-12 col-12 mx-auto mb-3 mt-3">
			<div class="row">
				{{-- SERVICE --}}
				<div class="col-12 col-lg-12 col-md-8 mx-auto form-group">
					<label class="form-label">Please select an available services.</label><br>
					<select class="custom-select" name="service">
						@foreach ($services as $s)
						<option value="{{ $s->id }}" {{ old('service') == $s->id ? 'selected' : '' }}>{{ $s->service_name }}</option>
						@endforeach
						<option {{ old('service') ? '' : 'selected' }} disabled>--- SELECT SERVICE ---</option>
					</select><br>
					<span class="text-danger text-wrap">{{ $errors->first('service') }}</span>
				</div>

				{{-- DATE --}}
				<div class="col-12 col-lg-12 col-md-8  mt-3 mb-3 mx-auto form-group">
					<label class="form-label">Please select an available date.</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
						</div>
						<input type="date" name="reserved_at" class="form-control" aria-label="date" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}" value="{{ old('reserved_at') }}">
					</div>
					<span class="text-danger text-wrap">{{ $errors->first('reserved_at') }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="card-footer d-flex">
		<button class="btn btn-outline-custom btn-sm mx-auto w-lg-25 w-50">
			Next<i class="ml-2 fa-solid fa-arrow-right fa-lg"></i>
		</button>
	</div>
</form>

@endsection

@section('post-script')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() => {
		$(`[name=reserved_at]`).on('change',  (e) => {
			const FULL_DATES = [
				@foreach ($appointments as $k => $a)
					@if (count($a) == 5)
						"{{ $k }}",
					@endif
				@endforeach
			];

			const UNAVAILABLE_DATES = [
				@foreach ($unavailableDates as $ud)
					@if ($ud->is_whole_day)
						"{{ \Carbon\Carbon::parse($ud->date)->format('Y-m-d') }}",
					@endif
				@endforeach
			];

			const obj = $(e.currentTarget);
			const val = obj.val();
			const opt = {
				position: `top`,
				showConfirmButton: false,
				toast: true,
				timer: 10000,
				background: `#ffc107`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			};

			let runSwal = false;
			if (FULL_DATES.includes(val)) {
				obj.val('');
				opt.title = "Selected date is already full.";

				runSwal = true;
			}
			else if (UNAVAILABLE_DATES.includes(val)) {
				obj.val('');
				opt.title = "The Veterinarian is unavailable at this date.";

				runSwal = true;
			}

			if (runSwal)
				Swal.fire(opt);

		});

		const validateDate = dateString => {
		}
	});
</script>
@endsection