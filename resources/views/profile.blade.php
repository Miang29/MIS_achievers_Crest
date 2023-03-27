@extends('layouts.user')

@section('title', 'Client Profile')

@section('content')
<div class="container-fluid m-0">
    <h1 class="font-weight-bold text-1 text-center p-3">Profile Information</h1>
    <div class="card col-12 col-lg-8 col-md-8 mx-auto my-3 h-50">
        <div class="row h-75">
             <div class="card col-lg-4 col-12 col-md-12 mx-auto ml-5 mt-5 mb-5">
                @if($user->gender == "male")
                  <img src="{{ asset('uploads/settings/profile-male.png') }}" class="card-img-top my-5">
                  @elseif($user->gender == "female")
                  <img src="{{ asset('uploads/settings/profile-female.png') }}" class="card-img-top my-5">
                @endif
            </div>

            <div class="card col-lg-6 col-12 col-md-12 mx-auto mt-5 mb-5">
                  {{-- FULL NAME --}}
                  <div class="input-group mt-5">
                       <div class="input-group-prepend">
                          <span class="input-group-text bg-1"><i class="fa-solid fa-user text-white"></i></span>
                        </div>
                    <input class="form-control bg-white" value="{{$user ['first_name'] }} {{$user ['last_name']}}" readonly>
                  </div>

                    {{-- EMAIL --}}
                    <div class="input-group mt-3">
                         <div class="input-group-prepend">
                              <span class="input-group-text bg-1"><i class="fa-solid fa-envelope text-white"></i></span>
                        </div>
                               <input class="form-control bg-white" value="{{$user ['email']}}" readonly>
                   </div>

                {{-- ADDRESS --}}
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-1"><i class="fa-solid fa-location-dot text-white mr-1"></i></span>
                    </div>
                     <textarea class="form-control bg-white" readonly>{{$user ['address']}}</textarea>
                </div>
                {{-- GENDER --}}
                  <div class="input-group mt-2 mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-1"><i class="fa-solid fa-venus-mars text-white"></i></span>
                    </div>
                    <input class="form-control bg-white" value="{{$user ['gender']}}" readonly>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection