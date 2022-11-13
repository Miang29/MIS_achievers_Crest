@extends('layouts.admin')

@section('title', 'Client Profile')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h2 class="font-weight-bold text-1">Client & Pet Profile List </h2>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{ route('client-profile.create') }}" class="btn btn-info btn-sm my-1 bg-1"><i class="fas fa-plus-circle mr-2"></i>Add Profile</a>
			<button class="btn btn-info btn-sm my-1 bg-1" id="clientNotify"><i class="fa-solid fa-bell mr-2"></i>Notify Clients</a>
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
					<th scope="col" class="hr-thick text-1 text-center">Email</th>
					<th scope="col" class="hr-thick text-1 text-center">Pet(s)</th>
					<th scope="col" class="hr-thick text-1 text-center"></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td class="text-center">Joseph Polio</td>
					<td class="text-center">joseph.polio@gmail.com</td>
					<td class="text-center text-truncate">Brownie, Siomai, Siopao, Voodoo</td>
				  
					<td class="text-center">
						<div class="dropdown">
							<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
								Action
							</button>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
								<a href="{{route('client-profile.show', [1])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Client</a>
								<a href="{{route('client-profile.edit', [1])}}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Client</a>
								<a href="{{route('client-profile.pet.show', [1])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Pet</a>
								<a href="" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
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
<script type="text/javascript">
	$(document).ready(() => {
		$('#clientNotify').on('click', (e) => {
			let obj = $(e.currentTarget);

			const dataPacket = {
				_token: $('meta[name="csrf-token"]').attr('content'),
				triggerer: {{ Auth::user()->id }},
			};

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.post(
				'{{ route('clients.notify') }}',
				dataPacket
			).done((response) => {
				if (response.success) {
					Swal.fire({
						title: `${response.title}`,
						html: `${response.message}`,
						position: `top`,
						showConfirmButton: false,
						toast: true,
						timer: 10000,
						background: `#28a745`,
						customClass: {
							title: `text-white`,
							content: `text-white`,
							popup: `px-3`
						},
					});
				}
				else {
					Swal.fire({
						title: `${response.title}`,
						html: `${response.message}`,
						position: `top`,
						showConfirmButton: false,
						toast: true,
						timer: 10000,
						background: `#dc3545`,
						customClass: {
							title: `text-white`,
							content: `text-white`,
							popup: `px-3`
						},
					});
				}
			});
		});
	});
</script>
@endsection