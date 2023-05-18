@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<a href="{{ route('service_category.index') }}">
				<h2 class="font-weight-bold text-1"><i class="fas fa-chevron-left mr-2"></i>Services Category List</h2>
			</a>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{ route('service.create',[$id]) }}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Service</a>
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
								 <div class="dropdown-divider"></div>
								<a href="{{route ('service_variation.index', [$id, $sv->id] )}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Variation</a>
								<div class="dropdown-divider"></div>
								<button onclick="confirmLeave('{{ route("service_category.delete", [1]) }}', undefined, 'Are you sure you want to archive this services? This will <b>archived all the variations</b> encoded within this category.');" class="dropdown-item"><i class="fa-solid fa-box-archive mr-2"></i>Archive Service</button>
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