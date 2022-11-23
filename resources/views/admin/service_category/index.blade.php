@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">SERVICES CATEGORY LIST </h3>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{ route('service_category.create') }}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Category</a>
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
						<th scope="col" class="hr-thick text-1 text-center">Services Category Name</th>
						<th scope="col" class="hr-thick text-1 text-center">No. of Service Variation</th>
						<th scope="col" class="hr-thick text-1 text-center"></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="text-center">Professional Services</td>
						<td class="text-center">7</td>
						
						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{ route('service.index', [1]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Service</a>
									<button data-scf="Service Category Name" data-scf-name="service_category_name" data-scf-target-uri="{{ route('service_category.update', [1]) }}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Category</button>
									<button onclick="confirmLeave('{{ route("service_category.delete", [1]) }}', undefined, 'Are you sure you want to remove this category? This will <b>remove all the services and variations</b> encoded within this category.');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</button>
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

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/swal-change-field.js') }}"></script>
@endsection