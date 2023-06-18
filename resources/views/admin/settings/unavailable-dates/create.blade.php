@extends('layouts.admin')

@section('title', 'Settings - Unavailable Dates')

@section('content')
<form method="POST" action="{{ route('settings.unavailable-dates.submit')}}" class="container-fluid m-0"  enctype="multipart/form-data">
	<h3 class="mt-3"><a href="{{ route('settings.index') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Settings</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	{{ csrf_field() }}
	<div class="col-12 col-lg-12 col-md-12 my-2 mx-auto">
		<div class="card mx-auto">
			<h3 class="card-header text-white bg-1 text-center">Unavailable Dates</h3>

			<div class="card-body">
				<div class="card col-lg-6 mx-auto mt-3 py-4">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-circle-half-stroke"></i></label>
							</div>
							<select class="custom-select" name="status">
								<option value="0">Pending</option>
								<option value="4">Cancelled</option>
								<option {{ old('status') ? '' : 'selected'}} disabled value="0">--- SELECT STATUS ---</option>
							</select>
						</div>
						<small class="text-danger">{{ $errors->first('status') }}</small>
					</div>
					<div class="form-group">
						<div class="col-12 col-md-12 col-lg-12 mx-auto">
							<label class="" for="reason">Reasons :</label>
							<textarea class="form-control not-resizable" name="reason" rows="3"></textarea>
							<small class="text-danger small">{{ $errors->first('reason') }}</small>
						</div>
					</div>
				</div>
				<hr class="hr-thick" style="border-color: lightgray;">
				<h4 class="text-center">Date Range</h4>
				<div class="col-lg-12 col-12 col-md-12">
					<div class="row" id="dateRangeContainer">
						<div class="card col-lg-5 mt-3 py-4 position-relative mr-3 ml-5 mb-2" id="dateRangeOg">
							{{--- UNAVAILABLE DATE --}}
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days mr-2 fa-lg"></i></span>
									</div>
									
									<input type="date" class="form-control" name="date[]" aria-label="date" aria-describedby="basic-addon1" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}" value="{{ old('date[]') }}">
								</div>
								<small class="text-danger">{{ $errors->first('date.*') }}</small>
							</div>

							{{--- UNAVAILABLE TIME --}}
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
									</div>

									<select class="custom-select" name="time[]" aria-label="Please select an unvailable time" {{ old('isWholeDay[]') == 'true' ? 'disabled' : '' }}>
										@foreach ($time as $k => $v)
											<option value="{{ $k + 1 }}" {{ old('appointment_time[]') == ($k + 1) ? 'selected' : '' }}>{{ $v }}</option>
										@endforeach
										<option {{ old('appointment_time[]') ? '' : 'selected'}} disabled value="0">--- SELECT TIME ---</option>
										<option disabled hidden value="-1">--- WHOLE DAY ---</option>
									</select>
								</div>

								<small class="text-danger">{{ $errors->first('time.*') }}</small>
							</div>

							{{-- IS WHOLE DAY --}}
							<div class="form-group">
								<div class="form-check">
									<input type="hidden" name="isWholeDay[]" value="false">
									<input type="checkbox" class="form-check-input checkbox" name="isWholeDay[]" {{ old('isWholeDay[]') == 'true' ? 'checked' : '' }} value="true">
									<label class="form-check-label">Is Whole Day?</label>
								</div>
								<small class="text-danger">{{ $errors->first('isWholeDay.*') }}</small>
							</div>
						</div>
					</div>

				</div>
				{{-- ADD --}}
				<div class="form-group col-lg-12 col-md-12 col-12 mx-auto">
					<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addDateRange">
						<span class="m-auto font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Date Range</span>
					</button>
				</div>
			</div>
		</div>
			
		<div class="card-footer d-flex">
			<div class="col-lg-6 col-md-6 col-12 mx-auto  text-center">
				<button type="submit" class="btn btn-outline-info  btn-sm  w-25  mb-3" data-action="submit" data-type="submit">Save</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('settings.index') }}');" class="btn btn-outline-danger btn-sm w-25 mb-3">Cancel</a>
			</div>
		</div>
	</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() =>{
		$(`[name=isWholeDay[]]`).on('change', (e) => {
			let isChecked = $(e.currentTarget).prop('checked');
			let target = $(`[name=time[]]`);

			if (isChecked) {
				target.prop('disabled', true)
					.attr('data-val', target.val() ? target.val() : 0)
					.val(-1);
			}
			else {
				target.prop('disabled', false)
					.val(target.attr('data-val'))
					.removeAttr('data-val');
			}
		})
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