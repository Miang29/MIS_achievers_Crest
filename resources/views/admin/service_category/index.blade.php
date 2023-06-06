@extends('layouts.admin')

@section('title', 'Services Category')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<h3 class="mt-3"><a href="{{ route('settings.index') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Settings</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">SERVICES CATEGORY LIST </h3>
		</div>

		<form method="GET" action="{{ route('service_category.index')}}" class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" value="{{ request()->search }}" name="search" placeholder="Search..." />

				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
	<div class="row mb-2">
		<a href="{{ route('service_category.archive')}}" class="btn btn-info btn-sm my-1 bg-1 ml-3 mr-3"><i class="fa-solid fa-box-archive mr-2"></i>Archived Services Category</a>

		<a href="{{ route('service_category.create') }}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Create Services</a>
	</div>

	<div class="overflow-x-auto h-100 card">
		<div class=" card-body h-100 px-0 pt-0 ">
			<table class="table table-striped" id="table-content">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1 text-center">Services Category Name</th>
						<th scope="col" class="hr-thick text-1 text-center">Total No. of Service</th>
						<th scope="col" class="hr-thick text-1 text-center"></th>
					</tr>
				</thead>

				<tbody>
				@forelse ($servicesCategory as $sc)
					<tr>
						<td class="text-center">{{ $sc->service_category_name }}</td>
						<td class="text-center">{{ $sc->services()->count() }}</td>
						
						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{ route('service.index',[$sc->id]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Service</a>
									<button onclick="confirmLeave('{{ route("service_category.delete", [$sc->id]) }}', undefined, 'Are you sure you want to archive this category? This will <b>archived all the services and variations</b> encoded within this category.');" class="dropdown-item"><i class="fa-solid fa-box-archive mr-2"></i>Archive</button>
								</div>
							</div>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="2">Nothing to show~</td>
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