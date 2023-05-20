@extends('layouts.admin')

@section('title', 'Show Appointment')

@section('content')
<div class="container-fluid m-0">
    <h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">
    <div class="card mx-auto">
         <h5 class="card-header gbg-1"></h5>
         <h2 class="font-weight-bold text-1 text-center mt-5">Appointment Information</h2>
        <div class=" card col-lg-6 col-md-4 col-6 mx-auto my-3 border rounded p-3 shadow">

            {{-- APPOINTMENT NUM --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold text-1" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $appointments->appointment_no }}" aria-describedby="basic-addon1">
            </div>

            {{-- SERVICE NAME --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold text-1" id="basic-addon1">Service Name</span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $appointments->service->service_name }}" aria-describedby="basic-addon1">
            </div>
            <div class="dropdown-divider"></div>

            {{-- DATE --}}
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-calendar-days fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{$appointments->reserved_at }}" aria-describedby="basic-addon1">
            </div>
             {{-- TIME --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-clock fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="₱{{ ($appointments->getAppointedTime()) }}" aria-describedby="basic-addon1">
            </div>
            {{-- STATUS --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-circle-half-stroke fa-lg text-1 mr-1"></i></span>
                </div>
                @if ($appointments->status == 0)
                    <input type="text" class="form-control bg-white text-warning" readonly value="Pending" aria-describedby="basic-addon1">
                    @elseif ($appointments->status == 1)
                    <input type="text" class="form-control bg-white text-success" readonly value="Accepted" aria-describedby="basic-addon1">
                    @elseif ($appointments->status == 2)
                    <input type="text" class="form-control bg-white text-danger" readonly value="Rejected" aria-describedby="basic-addon1">
                    @else
                    <input type="text" class="form-control bg-white" readonly value="Unknown" aria-describedby="basic-addon1">
                @endif
            </div> 

            {{-- CLIENT NAME --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-user fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $appointments->user->getName() }}" aria-describedby="basic-addon1">
            </div> 

             {{-- PET NAME --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-paw fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $appointments->petsInformations->pet_name }}" aria-describedby="basic-addon1">
            </div> 
        </div>
    </div>
</div>
@endsection