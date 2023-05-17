@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12 col-lg-12 col-md-12">
			<form method="POST" action="{{ route('submit.appointments') }}" class="card my-3" enctype="multipart/form-data">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Appointment</h3>
				{{ csrf_field() }}
				<div class="card-body d-flex">

					<div class="card border-light col-lg-6 col-md-12 col-12 mx-auto mb-3 mt-3">
			            <div class="row">
			            	{{-- Service Type --}}
			               		<label class="ml-3 mt-3">Please select a service type.</label>
			               	<div class="col-12 col-lg-12 col-md-8 mx-auto">
				                <select class="custom-select" name="service_id">
			               			@foreach ($services as $s)
				                    <option value="{{$s->id}}">{{$s->service_name}}</option>
				                    @endforeach
				                    <option {{ old('service_id') ? '' : 'selected' }} disabled>--- SELECT SERVICE ---</option>
				                </select>

				                <small class="text-danger small">{{ $errors->first('service_id') }}</small>
			            	</div>

			            	{{--- Reserved AT --}}
		            		<div class="col-12 col-lg-12 col-md-8  mt-3 mx-auto">
		               		 	<label class="">Please select an available date.</label>
				                <div class="input-group mb-3">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
				                    </div>
				                    <input type="date" class="form-control" name ="reserved_at" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}" aria-label="date" aria-describedby="basic-addon1">
				                </div>
		            	 	</div>
		            	 	 <small class="text-danger small ml-3 mb-2">{{ $errors->first('reserved_at') }}</small>

		            	 	{{--- Appointment time --}}
		                    <div class="col-lg-12 col-md-8 col-12 mr-auto">
		                        <label>Please select an available time.</label>
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
		                            </div>
		                            <select class="custom-select" name="appointment_time" aria-label="Please select an available time">
										@foreach ($appointmentTime as $k => $v)
										<option value="{{ $k + 1 }}" {{ old('appointment_time') == ($k + 1) ? 'selected' : '' }}>{{ $v }}</option>
										@endforeach
										<option {{ old('appointment_time') ? '' : 'selected'}} disabled>--- SELECT TIME ---</option>
									</select>
		                        </div>
		                    </div>
		                    <small class="text-danger small ml-3 mb-2">{{ $errors->first('appointment_time') }}</small>


		                     <div class="col-lg-12 col-md-8 col-12 mr-auto">
		                        <label>Please select a client</label>
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
		                            </div>
		                           	<select class="custom-select" name="user_id">				        
					                    @foreach($user as $u)
										<option selected  value="{{$u->id}}">{{ $u->getName() }}</option>
										@endforeach
										<option {{ old('user_id') ? '' : 'selected'}} disabled>--- SELECT CLIENT ---</option>
					                </select>
		                       </div>
		                   </div>
		                	
		                	<div class="col-lg-12 col-md-8 col-12 mr-auto">
		                        <label>Please select a clients pet</label>
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
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
		                   </div>
					    </div>
			        </div>
				</div>

				<div class="card-footer  d-flex flex-row">
					<button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit" data-action="submit">Book</button>
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