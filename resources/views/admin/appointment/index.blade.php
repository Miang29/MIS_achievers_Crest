@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h2 class="text-1">APPOINTMENT LIST</h2>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{route('appointments.create')}}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Apointment</a>
		</div>

		<form method="GET" action="{{ route('appointments.index') }}" class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" value="{{ request()->search }}" name="search" placeholder="Search..." />

				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>

		<ul class="nav nav-tabs" id="myTab" role="tablist">
  			<li class="nav-item">
   				<a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All Appoinment</a>
 			</li>

 			<li class="nav-item">
   		 		<a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
 		 	</li>

  			<li class="nav-item">
   		 		<a class="nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">Accepted</a>
  			</li>

  			<li class="nav-item">
   		 		<a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
  			</li>
		</ul>
	<div class="tab-content" id="myTabContent">
		{{-- ALL APPOINTMENT --}}
	 	<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
			<div class="overflow-x-auto h-100 card">
				<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1 text-center">Service Name</th>
								<th scope="col" class="hr-thick text-1 text-center">Appointment Date</th>
								<th scope="col" class="hr-thick text-1 text-center">Client Name</th>
								<th scope="col" class="hr-thick text-1 text-center">Status</th>
							</tr>
						</thead>

						<tbody>
							@forelse ($appointments as $ap)
							<tr>
								<td class="text-center">{{ $ap->services->service_name }}</td>
								<td class="text-center">{{ $ap->reserved_at }}</td>
								<td class="text-center">{{ $ap->petsInformations->user->getName() }}</td>
								<td class="text-center">
									@if($ap->status == 0)
										<small><i class="fa-solid fa-circle mr-3 text-info"></i>Pending</small>
									@elseif($ap->status == 1)
										<small><i class="fa-solid fa-circle mr-3 text-success"></i>Accepted</small>
									@elseif($ap->status == 2)
										<small><i class="fa-solid fa-circle mr-3 text-danger"></i>Rejected</small>
									@endif
								</td>
								<td class="text-center"></td>

								<td class="text-center">
									<div class="dropdown">
										<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
											Action
										</button>

										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
											<a href="{{route ('appointments.show', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Appointment</a>
											<a href="{{route ('appointments.edit', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</a>
											<a href="{{route ('accept.appointment', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-calendar-check mr-2"></i>Accept Appointment</a>
											<a href="{{route ('reason.appointment', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-calendar-xmark mr-2 text-danger"></i>Reject Appointment</a>
										</div>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5">Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>

		{{-- PENDING APPOINTMENT --}}
		<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
			<div class="overflow-x-auto h-100 card">
				<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1 text-center">Service Name</th>
								<th scope="col" class="hr-thick text-1 text-center">Appointment Date</th>
								<th scope="col" class="hr-thick text-1 text-center">Client Name</th>
								<th scope="col" class="hr-thick text-1 text-center">Status</th>
							</tr>
						</thead>

						<tbody>
							@forelse ($appointments as $ap)
							<tr>
								<td class="text-center">{{ $ap->services->service_name }}</td>
								<td class="text-center">{{ $ap->reserved_at }}</td>
								<td class="text-center">{{ $ap->petsInformations->user->getName() }}</td>
								{{-- <td class="text-center">{{ $ap->status }}</td> --}}
								<td class="text-center"></td>

								<td class="text-center">
									<div class="dropdown">
										<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
											Action
										</button>

										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
											<a href="{{route ('appointments.show', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Appointment</a>
											<a href="{{route ('appointments.edit', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</a>
											<a href="{{route ('accept.appointment', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-calendar-check mr-2"></i>Accept Appointment</a>
											<a href="{{route ('reason.appointment', [$ap->id]) }}" class="dropdown-item"><i class="fa-solid fa-calendar-xmark mr-2 text-danger"></i>Reject Appointment</a>
										</div>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5">Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
  	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection