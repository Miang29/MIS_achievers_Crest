@extends('layouts.admin')

@section('title', 'Client Profile')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg-6 text-center text-lg-left">
			<h2 class="font-weight-bold text-1">Client & Pet Profile List </h2>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{ route('client-profile.create') }}" class="btn btn-info btn-sm my-1 bg-1"><i class="fas fa-plus-circle mr-2"></i>Add Profile</a>
			<button class="btn btn-info btn-sm my-1 bg-1" id="clientNotify" data-scf="Message" data-scf-name="message" data-scf-target-uri="{{ route('clients.notify') }}" data-scf-custom-title="Notification Message" data-scf-use-textarea="true" data-scf-disable-button="true"><i class="fa-solid fa-bell mr-2"></i>Notify Clients</a>
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
		<div class=" card-body h-100 px-0 pt-0">
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1 text-center">Pet Owner</th>
						<th scope="col" class="hr-thick text-1 text-center">Email</th>
						<th scope="col" class="hr-thick text-1 text-center">Pet(s)</th>
						<th scope="col" class="hr-thick text-1 text-center"></th>
					</tr>
				</thead>

				<tbody>
					@forelse ($clients as $c)
					<tr>
						<td class="text-center">{{ $c['name'] }}</td>
						<td class="text-center">{{ $c['email'] }}</td>
						<td class="text-center text-truncate">
							@php
							$arr = [];
							foreach ($pets["{$c['id']}"] as $p)
								array_push($arr, $p['name']);
							
							echo implode(', ', $arr);
							@endphp
						</td>
					  
						<td class="text-center">
							<div class="dropdown">
								<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false">
									Action
								</button>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
									<a href="{{route('client-profile.show', [$c['id']])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Client</a>
									<a href="{{route('client-profile.edit', [$c['id']])}}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Client</a>
									<a href="{{route('client-profile.pet.show', [$c['id']])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Pet</a>
									<a href="#" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
								</div>
							</div>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" class="text-center">Nothing to show~</td>
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
@endsection