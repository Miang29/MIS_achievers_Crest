@extends('layouts.admin')

@section('title', 'User Account')

@section('content')
<div class="container-fluid m-0">
	<h3 class="text-center text-lg-left mx-0 mx-lg-5 my-4">
		<a href="{{ route('user.index') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Users</a>
	</h3>
	<hr class="hr-thick" style="border-color: #707070;">


	<h2 class="font-weight-bold text-1 text-center">View Users Information</h2>
	<div class="row" id="form-area">
		<div class="col-8 mx-auto my-5 ">


			<div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
				<div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-75 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
					{{-- NAME  --}}
					<button class="btn" data-toggle="tooltip" data-placement="left" title="{{$user ['first_name'] }}, {{$user ['last_name']}}"></button>
					<span class="h2 m-auto text-truncate">{{$user ['first_name'] }}, {{$user ['last_name']}}</span>
				</div>

				<div>
					{{-- EMAIL --}}
					<div class="mt-5 border-secondary border-bottom w-lg-75 mx-auto">
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Email"><i class="fa-solid fa-envelope"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{$user ['email']}}</span>
					</div>


					{{-- USERTYPE --}}
					<div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" name ="user_type" title="User Type"><i class="fa-solid fa-users"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{ucfirst($user->userType->name)}}</span>
					</div>


					{{-- USERNAME --}}
					<div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
						<button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="User Name"><i class="fa-solid fa-user"></i></button>
						<span class="h5 m-auto text-wrap text-1">{{$user ['username']}}</span>
					</div>


				</div>
			</div>
		</div>

	</div>
	@endsection