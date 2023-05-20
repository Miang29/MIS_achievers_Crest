@extends('layouts.admin')

@section('title', 'User Account')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">USERS LIST</h3>
		</div>

		<div class="w-lg-25 my-2">
			<a href="{{ route('notify-client')}}" class="btn btn-info btn-sm my-1 bg-1 w-50"><i class="fa-solid fa-bell mr-2"></i>Notify Client</a>
		</div>

		<div class="col-12 col-md-6 col-lg-4 my-2 text-center text-md-left text-lg-right">
			<a href="{{route('user.create')}}" class="btn btn-info btn-sm  my-1 bg-1 w-50"><i class="fas fa-plus-circle mr-2"></i>Add User</a>
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
						<th scope="col" class="hr-thick text-1">Name</th>
						<th scope="col" class="hr-thick text-1">Email</th>
						<th scope="col" class="hr-thick text-1">User Type</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@forelse ($user as $u)
					<tr>
						<td>{{ $u->getName() }}</td>
						<td>{{ $u->email }}</td>
						<td>{{ $u->userType->name }}</td>
					  
						<td>
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{ route('user.view', [$u->id]) }}" class="dropdown-item"><i class="fas fa-eye mr-2"></i>View User Information</a>
									<a href="{{ route('user.edit', [$u->id]) }}" class="dropdown-item"><i class="fas fa-pen-to-square mr-2"></i>Edit User Information</a>
									<a href="{{ route('user.edit-password', [$u->id]) }}" class="dropdown-item"><i class="fa-solid fa-lock mr-2"></i>Change Password</a>
									<a href="javascript:void(0);" onclick="confirmLeave('{{ route('user.delete', [$u->id]) }}', undefined, 'Are you sure you want to archived this user?');" class="dropdown-item"><i class="fa-solid fa-box-archive mr-2"></i>Archive</a>
								</div>
							</div>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4">Nothing to show~</td>
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

@if (Session::has('sendEmail'))
<script type="text/javascript" class="forRemoval">
	$(document).ready(() => {
		let amt = parseInt(`{{ Session::get('sendEmail') }}`);

		$.post(`{{ route('api.notify.client.send') }}`, {
			_token: `{{ csrf_token() }}`,
			amount: `a`
		}).done((response) => {
			let opt = {
				position: `top`,
				showConfirmButton: false,
				toast: true,
				background: response.success ? `#28a745` : `#dc3545`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			};

			if (response.success) {
				opt.title = `Successfully sent all emails`;
				opt.timer = 10000;
			}
			else {
				opt.title = `A problem occured but was dealt with`;
				opt.toast = false;
				opt.showConfirmButton = true;
				
				opt.html = `<ul>`;
				for (let keyI in response.validationMsg) {

					opt.html += `<li><p><b>${keyI}</b></p><ul>`;
					for (let keyM in response.validationMsg[keyI]) {
						opt.html += `<li>${response.validationMsg[keyI][keyM]}</li>`;
					}
					opt.html += `</ul></li>`;

				}
				opt.html += `</ul>`;
			}
			
			$(`script.forRemoval`).remove();
			Swal.fire(opt);
		});
	});
</script>
@endif
@endsection