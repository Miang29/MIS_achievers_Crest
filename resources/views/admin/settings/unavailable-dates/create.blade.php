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
				<div class="card col-lg-6 mx-auto mt-5">
					 {{--- Unavailable date --}}
					<div class="col-lg-12 col-md-8 col-12 mr-auto">
						<div class="input-group mt-5">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days mr-2 fa-lg"></i></span>
						  </div>
							<input type="date" class="form-control" name="date" aria-label="date" aria-describedby="basic-addon1" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}">
						</div>
						 	<small class="text-danger small ml-3 mb-2">{{ $errors->first('date') }}</small>
					</div>

					<div class="input-group mb-5">
					  {{--- Unavailable time --}}
	                    <div class="col-lg-12 col-md-8 col-12 mr-auto">
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
	                            </div>
	                            <select class="custom-select" name="time" aria-label="Please select an unvailable time">
									@foreach ($time as $k => $v)
									<option value="{{ $k + 1 }}" {{ old('appointment_time') == ($k + 1) ? 'selected' : '' }}>{{ $v }}</option>
									@endforeach
									<option {{ old('appointment_time') ? '' : 'selected'}} disabled>--- SELECT TIME ---</option>
								</select>
	                        </div>
	                    <small class="text-danger small ml-3 mb-2">{{ $errors->first('time') }}</small>
	                    </div>
					</div>
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
	</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection