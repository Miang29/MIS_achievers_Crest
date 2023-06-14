@extends('layouts.admin')

@section('title', 'Services')
 
@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<a href="{{ route('settings.index') }}">
				<h2 class="font-weight-bold text-1"><i class="fas fa-chevron-left mr-2"></i>Settings</h2>
			</a>
		</div>

		<form method="GET" action="{{ route('service.index',[$id])}}" class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" value="{{ request()->search }}" name="search" placeholder="Search..." />

				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
	<hr class="hr-thick" style="border-color: #707070;">
	<div class="row mb-2">
		<a href="{{ route('services.archive',[$id])}}" class="btn btn-info btn-sm my-1 bg-1 mr-3 ml-3"><i class="fa-solid fa-box-archive mr-2"></i>Archived Service</a>
	
		<a href="{{ route('service.create',[$id]) }}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Service</a>
	</div>

	<div class="overflow-x-auto h-100 card">
		<div class=" card-body h-100 px-0 pt-0 ">
			<table class="table table-striped text-center" id="table-content">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1">Service Name</th>
						<th scope="col" class="hr-thick text-1">Total No. of Variation</th>
						<th scope="col" class="hr-thick text-1"></th>
					</tr>
				</thead>

				<tbody>
				@forelse ($serviceVar as $sv)
					<tr>
						<td>{{ $sv->service_name }}</td>
						<td>{{ $sv->variations()->count() }}</td>

						<td>
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false">
									Action
								</button>
								
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{route ('service_variation.create', [$id, $sv->id] )}}" class="dropdown-item"><i class="fa-solid fa-plus mr-2"></i>Add Variation</a>	
									<a href="{{route ('service_variation.index', [$id, $sv->id] )}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Variation</a>
									
									{{-- Removes the archive buttons for essential services --}}
									@if (!in_array($sv->id, $essentials))
									<button onclick="confirmLeave('{{ route("service.delete", [$id, $sv->id]) }}', undefined, 'Are you sure you want to archive this services? This will <b>archived all the variations</b> encoded within this category.');" class="dropdown-item">
										<i class="fa-solid fa-box-archive mr-2"></i>Archive Service
									</button>
									@endif
								</div>
							</div>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="3">Nothing to show~</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/swal-change-field.js') }}"></script>
@endsection