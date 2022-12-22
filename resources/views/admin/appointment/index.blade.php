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
				<input type="text" class="form-control" name="search" placeholder="Search..." />

				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>

	<div class="overflow-x-auto h-100 card">
		<div class=" card-body h-100 px-0 pt-0 ">
			<table class="table table-striped text-center" id="table-content">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1 text-center">Pet Owner</th>
						<th scope="col" class="hr-thick text-1 text-center">Pet Name</th>
						<th scope="col" class="hr-thick text-1 text-center">Appointment Date</th>
						<th scope="col" class="hr-thick text-1 text-center">Service Type</th>
					</tr>
				</thead>

				<tbody>
					@forelse ($appointments as $ap)
					<tr>
						<td class="text-center">{{ $ap->pet_owner }}</td>
						<td class="text-center">{{ $ap->email }}</td>
						<td class="text-center">{{ $ap->date }}</td>
						<td class="text-center">{{ $ap->service_type }}</td>

						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{route ('appointments.show', [1, 1])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Appointment</a>
									<a href="{{route ('appointments.edit', [1, 1])}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</a>
									<a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.delete', [$ap->id]) }}', undefined, 'Are you sure you want to delete this schedule? <b>It cannot be undone.</b>');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
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
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection