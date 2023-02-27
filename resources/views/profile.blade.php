@extends('layouts.user')

@section('title', 'User Account')

@section('content')
<div class="container-fluid m-0">

    <h1 class="font-weight-bold text-1 text-center p-5">Profile Information</h1>
    <div class="row" id="form-area">
        <div class="col-12 col-lg-6 col-md-8 mx-auto my-3">


            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-100 w-md-100 h-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-75 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- NAME  --}}
                    <button class="btn" data-toggle="tooltip" data-placement="left" title="{{$user ['first_name'] }}, {{$user ['last_name']}}"></button>
                    <span class="h2 m-auto text-truncate">{{$user ['first_name'] }}, {{$user ['last_name']}}</span>
                </div>

                <div>
                    {{-- EMAIL --}}
                    <div class="mt-5 border-secondary border-bottom w-lg-100 mx-auto">
                        <button class="btn mr-5 font-weight-bold" data-toggle="tooltip" data-placement="left" title="Email"><i class="fa-solid fa-envelope mr-2"></i>Email</button>
                        <span class="h5 m-auto text-wrap text-1">{{$user ['email']}}</span>
                    </div>

                    {{-- ADDRESS --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-100 mx-auto">
                        <button class="btn mr-5 font-weight-bold" data-toggle="tooltip" data-placement="left" title="Address"><i class="fa-solid fa-location-dot mr-2"></i>Address</button>
                        <span class="h5 m-auto text-wrap text-1">{{$user ['address']}}</span>
                    </div>

                    {{-- USERTYPE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-100 mx-auto">
                        <button class="btn mr-2 font-weight-bold" data-toggle="tooltip" data-placement="left" name="user_type" title="User Type"><i class="fa-solid fa-users mr-2"></i>User Type</button>
                        <span class="h5 m-auto text-wrap text-1">{{ucfirst($user->userType->name)}}</span>
                    </div>


                    {{-- USERNAME --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-100 mx-auto">
                        <button class="btn mr-2 font-weight-bold" data-toggle="tooltip" data-placement="left" title="User Name"><i class="fa-solid fa-user mr-2"></i>Username</button>
                        <span class="h5 m-auto text-wrap text-1">{{$user ['username']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection