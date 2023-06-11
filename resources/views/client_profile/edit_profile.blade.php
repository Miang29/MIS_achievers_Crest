@extends('layouts.user')

@section('title', 'Edit Information')
@section('content')
<form method="POST" action ="{{route ('client.update.profile', [$client->id]) }}"class="container-fluid m-0 mt-5"  enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="card col-12 col-lg-8 col-md-8 mx-auto my-3">
		<h3 class="font-weight-bold my-3 text-center">Update Profile Information</h3>
		<div class="card-body d-flex">
			<div class="form-group mx-auto col-lg-12 col-12 col-md-12">

				<div class="row">
					{{-- FIRST NAME --}}
					<div class="col-12 col-md-9 col-lg-6 mx-auto">
						<div class="form-group">
							<label class="important font-weight-bold text-1 important">First Name</label>
							<input class="form-control" type="text" name="first_name" value="{{ $client->first_name }}" />
							<small class="text-danger small">{{ $errors->first('first_name') }}</small>
						</div>
					</div>

					{{-- MIDDLE NAME --}}
					<div class="col-12 col-md-9 col-lg-6 mx-auto">
						<div class="form-group">
							<label class="font-weight-bold text-1">Middle Name</label>
							<input class="form-control" type="text" name="middle_name" value="{{ $client->middle_name }}" />
							<small class="text-danger small">{{ $errors->first('middle_name') }}</small>
						</div>
					</div>

					{{-- LAST NAME --}}
					<div class="col-12 col-md-9 col-lg-6 mx-auto">
						<div class="form-group">
							<label class="important font-weight-bold text-1 important">Last Name</label>
							<input class="form-control" type="text" name="last_name" value="{{ $client->last_name }}" />
							<small class="text-danger small">{{ $errors->first('last_name') }}</small>
						</div>
					</div>


					{{-- SUFFIX --}}
					<div class="col-12 col-md-9 col-lg-6 mx-auto">
						<div class="form-group">
							<label class="font-weight-bold text-1">Suffix</label>
							<input class="form-control" type="text" name="suffix" value="{{ $client->suffix }}" />
							<small class="text-danger small">{{ $errors->first('suffix') }}</small>
						</div>
					</div>

					{{-- ADDRESS --}}
					<div class="col-12 col-md-9 col-lg-12 mx-auto">
						<div class="form-group">
							<label class="font-weight-bold text-1">Address</label>
							<input class="form-control" type="text" name="address" value="{{ $client->address }}" />
							<small class="text-danger small">{{ $errors->first('address') }}</small>
						</div>
					</div>
				</div>

				<div class="row">
					{{-- EMAIL --}}
					<div class="col-12 col-md-9 col-lg-6  form-group">
						<label class="important font-weight-bold text-1">E-mail</label>
						<input class="form-control" type="email" name="email" value="{{ $client->email }}" />
						<small class="text-danger small">{{ $errors->first('email') }}</small>
					</div>

					<input class="form-control" type="hidden" name="user_type" value="4" />

					{{-- USERNAME --}}
					<div class="col-12 col-md-9 col-lg-6 form-group">
						<label class="important font-weight-bold text-1">Username</label>
						<input class="form-control" type="text" name="username" value="{{ $client->username }}" />
						<small class="text-danger small">{{ $errors->first('username') }}</small>
					</div>
				</div>

			</div>
		</div>
		<div class="d-flex">
			<div class="col-lg-6 col-md-6 col-12 mx-auto  text-center">
				<button type="submit" class="btn btn-outline-info  btn-sm  w-25  mb-3" data-type="submit" data-action="update">Update</button>
				<a href="{{route('profile',[$client->id])}}" class="btn btn-outline-primary btn-sm w-25 mb-3">back</a>
			</div>
		</div>
	</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection