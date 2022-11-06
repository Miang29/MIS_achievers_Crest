@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')
<div class="container-fluid m-0">
	<h2 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<form class="card my-3 mx-auto">
				<h5 class="card-header text-center text-white bg-1">Create Appointment</h5>

				<div class="card-body">
					<div class="row">
						<div class="col-12 col-lg-6">
							{{-- OWNER --}}
							<div class="form-group">
								<label class="h6 important" for="petowner">Pet Owner</label>
								<input class="form-control" type="text" name="petowner" value="{{old('petowner')}} " />
							</div>

							{{-- EMAIL --}}
							<div class="form-group">
								<label class="h6 important" for="email">Email</label>
								<input class="form-control" type="email" name="email" value="{{old('email')}} " />
							</div>

							{{-- PET --}}
							<div class="form-group">
								<label class="h6 important" for="petname">Pet Name</label>
								<input class="form-control" type="text" name="petname" value="{{old('petname')}} " />
							</div>
						</div>

						<div class="col-12 col-lg-6 form-group">
							{{-- DATE --}}
							<div class="form-group">
								<label class="h6 important" for="date">date</label>
								<input class="form-control" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
							</div>

							{{-- TIME --}}
							<div class="form-group">
								<label class="h6 important" for="time">time</label>
								<input class="form-control" type="time" name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
							</div>
						</div>

						<div class="col-12">
							<div id="scheduler" class="overflow-x-auto"></div>
						</div>
					</div>
				</div>
				
				<div class="card-footer d-flex flex-row">
					<button class="btn btn-outline-info ml-auto mr-4 w-25" type="submit">Book</button>
					<a href="{{ route('appointments.index') }}" class="btn btn-outline-danger ml-1 mr-auto w-25">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('lib/fullcalendar-5.11.3/lib/main.min.css') }}">
<style type="text/css3">
	@media screen and (max-width:767px) {
		.fc-toolbar.fc-header-toolbar {
			flex-direction:column;
		}
		.fc-toolbar-chunk {
			display: table-row; text-align:center; padding:5px 0;
		}
	}
</style>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('lib/fullcalendar-5.11.3/lib/main.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready((e) => {
		let calendarEl = document.querySelector('#scheduler');

		let calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridDay'
				},
				selectable: true,
				businessHours: {
					daysOfWeek: [0,1,2,3,4,5,6],
					startTime: '08:00',
					endTime: '20:00',
				},
				windowResize: (e) => {
					calendar.updateSize();
				},
				dateClick: (e) => {
					console.log(e);
				}
			}
		);
		calendar.render();
	});
</script>
@endsection