@extends('layouts.admin')

@section('title', 'User Account')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">USERS LIST</h3>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
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
									<a href="{{ route('user.view', [$u->id]) }}" class="dropdown-item"><i class="fas fa-eye mr-2"></i>View</a>
									<a href="{{ route('user.edit', [$u->id]) }}" class="dropdown-item"><i class="fas fa-pen-to-square mr-2"></i>Edit</a>
									<a href="{{ route('user.edit-password') }}" class="dropdown-item"><i class="fa-solid fa-lock mr-2"></i>Change Password</a>
									<a href="javascript:void(0);" onclick="confirmLeave('{{ route('user.delete', [$u->id]) }}', undefined, 'Are you sure you want to delete this user? <b>It cannot be undone.</b>');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
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
@endsection