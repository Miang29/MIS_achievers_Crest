@extends('layouts.admin')

@section('title', 'Product Category')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class=" text-1">INVENTORY LIST</h3>
		</div>

		<div class="dropdown col-12 col-md-6 col-lg my-1 text-center text-md-left text-lg-right">
			<button class="btn btn-info bg-1 btn-sm my-1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-plus-circle mr-2"></i>Add Category with Product
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="{{ route('create-category') }}"><i class="fa-solid fa-sitemap mr-2"></i> Category</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="{{route('category.create')}}"><i class="fa-solid fa-boxes-stacked mr-2"></i> Products</a>
			</div>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-lg-right">
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
						<th scope="col" class="hr-thick text-1">Category Name</th>
						<th scope="col" class="hr-thick text-1">Total No. of Products</th>
						<th scope="col" class="hr-thick text-1">Action</th>
					</tr>
				</thead>

				<tbody>
					@forelse ($categories as $c)
					<tr>
						<td>{{ $c->category_name }}</td>
						<td>{{ $c->products()->count() }}</td>

						<td>
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{ route('category.view', [$c->id]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Category</a>
									<button data-scf="Category Name" data-scf-name="category_name" data-scf-target-uri="{{ route('category.update', [$c->id]) }}" data-scf-label="This will also move all the content of this category to the same category if it already exists." class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Category</button>
									<a href="javascript:void(0);" onclick="confirmLeave('{{ route("category.delete", [$c->id]) }}', undefined, 'Are you sure you want to remove this category? This will <b>remove all the items</b> encoded within this category.');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
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
<script type="text/javascript" src="{{ asset('js/util/swal-change-field.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection