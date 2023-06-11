@extends('layouts.user')

@section('title', 'Client Profile')

@section('content')
<div class="container-fluid m-0">
    
    <div class="card col-12 col-lg-8 col-md-8 mx-auto my-5">
    <h3 class="font-weight-bold text-center mt-3">Profile Information</h3>
        {{ csrf_field() }}
        <div class="row h-75">
             <div class="card col-lg-4 col-12 col-md-12 mx-auto ml-5 my-3">
                @if($user->gender == "male")
                  <img src="{{ asset('uploads/settings/profile-male.png') }}" class="card-img-top my-5">
                  @elseif($user->gender == "female")
                  <img src="{{ asset('uploads/settings/profile-female.png') }}" class="card-img-top my-5">
                @endif
            </div>

            <div class="card col-lg-6 col-12 col-md-12 mx-auto my-3">
                 <div class="position-absolute border rounded input m-0" style="top: -1rem; right: -1rem;">
                    <a href="{{ route('client.edit.profile',[$user->id])}}" class="btn btn-md bg-white border-light"><i class="fa-solid fa-pen text-black"></i></a>
                </div>
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

                  {{-- USERNAME --}}
                  <div class="input-group mt-2 mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-1"><i class="fa-solid fa-image-portrait text-white mr-2"></i></span>
                    </div>
                    <input class="form-control bg-white" value="{{$user ['username']}}" readonly>
                 </div>
            </div>
        </div>
        <a href="{{ route('pets.profile.information',[$user->id])}}" class="btn btn-outline-info font-weight-bold btn-sm text-center mb-3">View Pets Information</a>
    </div>
</div>
@endsection