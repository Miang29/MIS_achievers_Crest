@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<div class="container-fluid m-0">
<h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>

    <hr class="hr-thick" style="border-color: #707070;">

    <h2 class="font-weight-bold text-1 text-center">View Client Appointment </h2>
    <div class="row" id="form-area">
        <div class="col-lg-8 col-md-12 col-12 mx-auto my-5 ">

            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- PET OWNER  --}}
                    <button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $appointment['owner'] }}"></button>
                    <span class="h2 m-auto text-truncate">{{ $appointment["owner"] }}</span>
                </div>
                
                <div>
                    {{-- Email --}}
                    <div class="mt-5 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Email"><i class="fa-solid fa-envelope"></i></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $appointment['email'] }}</span>
                    </div>

                    {{-- PET --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Pet Name"><i class="fas fa-dog fa-lg"></i></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $appointment['pet'] }}</span>
                    </div>

                    {{-- DATE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Date"><i class="fas fa-calendar fa-lg"></i></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $appointment['appointment_schedule']->format('F d, Y') }}</span>
                    </div>

                    {{-- TIME --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Time"><i class="fas fa-clock fa-lg"></i></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $appointment['appointment_schedule']->format('g:i A') }}</span>
                    </div>

                    {{-- SERVICE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Service Type"><i class="fa-solid fa-chart-simple"></i></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $appointment['service'] }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection