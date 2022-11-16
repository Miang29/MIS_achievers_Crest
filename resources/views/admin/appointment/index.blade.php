@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h2 class="font-weight-bold text-1">Appointment List</h2>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{route('appointments.create')}}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Apointment</a>
		</div>

		<div class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" name="search" placeholder="Search..." />
				
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div class="overflow-x-auto h-100 card">
		<div class=" card-body h-100 px-0 pt-0 ">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1 text-center">Pet Owner</th>
						<th scope="col" class="hr-thick text-1 text-center">Pet Name</th>
						<th scope="col" class="hr-thick text-1 text-center">Appointment Date</th>
						
					</tr>
				</thead>

				<tbody>
					<tr>
						@php ($petId = random_int(0, 3))
						<td class="text-center">Joseph Polio</td>
						<td class="text-center">{{ array("Brownie", "Siomai", "Siopao", "Voodoo")[$petId] }}</td>
						<td class="text-center">{{ \Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y g:i A') }}</td>
						  
						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{route ('appointments.show', [1, $petId])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Appointment</a>
									<a href="{{route ('appointments.edit', [1, $petId])}}" class="dropdown-item"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</a>
									<a href="javascript:void(0);" onclick="confirmLeave('{{ route("appointments.delete", [1]) }}', undefined, 'Are you sure you want to remove this?');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>

			</table>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection