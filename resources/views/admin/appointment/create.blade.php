@extends('layouts.admin')

@section('title', 'Create Appointment ')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12 col-lg-12 col-md-12">
			{{-- FORM START --}}
			<form method="POST" action="{{ route('submit.appointments') }}" class="card my-3" enctype="multipart/form-data">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Appointment</h3>
				{{ csrf_field() }}
				
				<div class="card-body d-flex">
					<div class="card border-light col-lg-6 col-md-12 col-12 mx-auto mt-3">
						{{-- SERVICE --}}
						<div class="form-group">
							<label class="form-label">Please select a service type.</label><br>
							
							<select class="custom-select" name="service_id">
								@foreach ($services as $s)
								<option value="{{$s->id}}">{{$s->service_name}}</option>
								@endforeach
								
								<option {{ old('service_id') ? '' : 'selected' }} disabled>--- SELECT SERVICE ---</option>
							</select><br>
							
							<small class="text-danger">{{ $errors->first('service_id') }}</small>
						</div>

						{{-- RESERVED AT --}}
						<div class="form-group">
							<label class="form-label">Please select an available date.</label>
							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
								</div>
								
								<input type="date" class="form-control" name ="reserved_at" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}" aria-label="date" aria-describedby="basic-addon1">
							</div>
						 	
						 	<small class="text-danger" id="reserved_at_error">{{ $errors->first('reserved_at') }}</small>
						</div>
						
						{{-- APPOINTMENT TIME --}}
						<div class="form-group">
							<label class="form-label">Please select an available time.</label>
							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
								</div>
								
								<select class="custom-select" name="appointment_time" aria-label="Please select an available time" {{ old('reserved_at') ? '' : "data-val=0 disabled" }} data-attempt="5">
									@foreach ($appointmentTime as $k => $v)
									<option value="{{ $k + 1 }}" {{ old('appointment_time') == ($k + 1) ? 'selected' : '' }} {{ old('reserved_at') ? '' : 'hidden' }} data-option>{{ $v }}</option>
									@endforeach

									<option value="0" disabled hidden>--- SELECT TIME ---</option>
									<option value="-1" {{ old('appointment_time') ? '' : 'selected'}} disabled hidden>--- SELECT A DATE FIRST ---</option>
								</select>
							</div>

							<small class="text-danger">{{ $errors->first('appointment_time') }}</small>
						</div>

					</div>
				</div>

				{{-- PET --}}
				<div class="row" id="dateRangeContainer">
					<div class="card border-secondary-light col-lg-5 col-md-12 col-12 ml-5 mb-3 position-relative"id="dateRangeOg">
						<div class="form-group col-lg-12" >
							<label class="form-label mt-2">Please select a client pets</label>
							
							<div class="input-group my-2">
								<div class="input-group-prepend">
									<label class="input-group-text"><i class="fa-solid fa-paw"></i></label>
								</div>

								<select class="custom-select" name="pet_information_id">						
									@foreach($user as $u)
									<optgroup label="{{$u->getName()}}">
										@foreach($u->petsInformations as $p)
										<option selected  value="{{$p->id}}">{{"{$p->pet_name} - {$p->breed}"}}</option>
										@endforeach
									</optgroup>
									@endforeach

									<option {{ old('pet_information_id') ? '' : 'selected'}} disabled>--- SELECT PET ---</option>
								</select>
							</div>
							
							<small class="text-danger">{{ $errors->first('pet_information_id') }}</small>
						</div>
					</div>
				</div>

				{{-- ADD --}}
				<div class="form-group col-lg-10 col-md-12 col-12 mx-auto">
					<button class="card mx-auto w-75 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addDateRange">
						<span class="m-auto font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Pet</span>
					</button>
				</div>

				<div class="card-footer  d-flex flex-row">
					<button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit" data-action="submit">Book</button>
					<a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.create') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-25 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
				</div>
			</form>
			{{-- FORM END --}}
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript" class="forRemoval">
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

	$(document).ready(() => {
		$(`script.forRemoval`).remove();
	});
</script>
<script type="text/javascript">
	$(document).ready(() => {
		$(`[name=reserved_at]`).on('change',  (e) => {
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
			
			if (obj.val().length <= 0) {
				$(`[name=appointment_time`).prop('disabled', true)
					.trigger('mis-select-change');
			}
			else {
				$(`[name=appointment_time`).prop('disabled', false)
					.trigger('mis-select-change');
			}

			if (runSwal)
				Swal.fire(opt);

		});

		$(`[name=appointment_time]`).on('mis-select-change', (e) => {
			let obj = $(e.currentTarget);
			let opts = obj.find(`[data-option]`);
			
			if (obj.prop('disabled')) {
				obj.attr('data-val', obj.val())
					.val(-1);

				opts.prop('hidden', true);
			}
			else {
				obj.val(obj.attr('data-val') ? obj.attr('data-val') : 0)
					.removeAttr('data-val');

				$.post(`{{ route('api.fetch.unavailable-time') }}`, {
					_token: `{{ csrf_token() }}`,
					reserved_at: $(`[name=reserved_at]`).val()
				}).done((response) => {
					if (response.success) {
						const UNAVAILABLE_TIME = response.data;

						opts.each((k, v) => {
							let opt = $(v);

							console.log(`[${UNAVAILABLE_TIME}].includes(${opt.val()}) ? ${UNAVAILABLE_TIME.includes(parseInt(opt.val()))}`);
							if (UNAVAILABLE_TIME.includes(parseInt(opt.val()))) {
								opt.prop('disabled', true);
							}
							else {
								opt.prop('disabled', false);
							}
						});
					}
					else {
						let attempt = obj.attr('data-attempt');
						if (response.validationFailed) {
							$(`#reserved_at_error`).text(response.validationMsg.reserved_at[0]);
						}
						else {
							if (attempt > 0) {
								Swal.fire({
									title: `An error has occured`,
									html: `<p>Exception: "${response.data}"</p><hr><p>Retrying to fetch in 5 seconds...</p><p><small>(${attempt} attempts left)</small></p>`,
									background: `#dc3545`,
									timer: 6000,
									customClass: {
										title: `text-white`,
										content: `text-white`,
										popup: `px-3`
									},
								});
								
								obj.attr('data-attempt', parseInt(obj.attr('data-attempt')) - 1);
								let timerMultiplier = 1;
								for (let i = 4; i >= 0; i--) {
									setTimeout(() => {
										Swal.update({
											html: `<p>Exception: "${response.data}"</p><hr><p>Retrying to fetch in ${i} seconds...</p><p><small>(${attempt} attempts left)</small></p>`
										})
									}, (1000 * timerMultiplier++));
								}

								setTimeout(() => {
									$(`[name=appointment_time]`).trigger('mis-select-change');
								}, 5000);
							}
							else {
								Swal.fire({
									icon: `error`,
									title: `The error does not resolved itself`,
									html: `<p>Exception: "${response.data}"</p><hr><p>Error failed to resolved itself after 5 attempts, please contact the webmaster for a fix on the bug.</p>`,
									background: `#dc3545`,
									customClass: {
										title: `text-white`,
										content: `text-white`,
										popup: `px-3`
									},
								});

								obj.attr('data-attempt', 5);
							}
						}
					}
				});


				opts.prop('hidden', false);
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addDateRange', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#dateRangeOg");
			let container = $("#dateRangeContainer");
			let formCopy = form.clone();
			let copy = obj.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().css('opacity', 0); setTimeout(() => {$(this).parent().remove();}, 375);" style="top: -0.10rem; right: -0.10rem;">
					<i class="fas fa-circle-xmark fa-lg text-custom-1"></i>
				</span>
			`);

			obj.remove();
			formCopy.append(remove)
				.removeAttr("id")
				.css('transition', '0.375s ease-in-out')
				.css('opacity', 0);
			setTimeout(() => {
				formCopy.css('opacity', 1);
			});
			container.append(formCopy);
			container.append(copy);
		});
	});
</script>
@endsection