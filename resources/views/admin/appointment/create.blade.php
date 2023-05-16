@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12 col-lg-12 col-md-12">
			<form method="POST" class="card my-3" enctype="multipart/form-data">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>Create Appointment</h3>
				{{ csrf_field() }}
				<div class="card-body d-flex">

					<div class="card border-light col-lg-6 col-md-12 col-12 mx-auto mb-3 mt-3">
			            <div class="row">
			            	{{-- Service Type --}}
			               		<label class="ml-3 mt-3">Please select a service type.</label>
			               	<div class="col-12 col-lg-12 col-md-8 mx-auto">
			               		
				                <select class="custom-select" name="service_id">
				                    <option class="font-weight-bold" value="">Services</option>
				                </select>
			            	</div>
			            	{{--- Reserved AT --}}
		            		<div class="col-12 col-lg-12 col-md-8  mt-3 mx-auto">
		               		 	<label class="">Please select an available date.</label>
				                <div class="input-group mb-3">
				                    <div class="input-group-prepend">
				                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
				                    </div>
				                    <input type="date" class="form-control" name ="reserved_at" aria-label="date" aria-describedby="basic-addon1">
				                </div>
		            	 	</div>

		            	 	{{--- Appointment time --}}
		                    <div class="col-lg-12 col-md-8 col-12 mr-auto">
		                        <label>Please select an available time.</label>
		                        <div class="input-group mb-3">
		                            <div class="input-group-prepend">
		                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
		                            </div>
		                            <select class="custom-select" name="appointment_time" id="inputGroupSelect01">
		                                <option selected value="">Choose...</option>
		                                <option value="1">8:00 AM - 10:00 PM</option>
		                                <option value="2">10:00 AM - 12:00 PM</option>
		                                <option value="3">1:00 PM - 3:00 PM</option>
		                                <option value="4">3:00 PM - 5:00 PM</option>
		                                <option value="5">5:00 PM - 7:00 PM</option>
		                            </select>
		                        </div>
		                    </div>

		                    {{-- Client Name --}}
                    		<div class="col-12 col-lg-12 col-md-12 mx-auto">
				                <select class="custom-select" name="user_id">
				                    <option class="font-weight-bold" value="">Client Name</option>
				                    <option value=""></option>
				                </select>
			            	</div>
                			{{-- Pet Name --}}

                			<div class="col-12 col-lg-12 col-md-12 mx-auto mt-3">
				                <select class="custom-select" name="pet_information_id">
				                    <option class="font-weight-bold" value="">Pet Name</option>
				                    <option value=""></option>
				                </select>
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