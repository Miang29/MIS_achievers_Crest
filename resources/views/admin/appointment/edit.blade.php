@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<div class="container-fluid m-0">
    <h3 class="text-center text-lg-left  mx-lg-5 my-4 ">
        <a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a>
    </h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="col-12 mx-auto">

        <div class="card my-3 mx-auto">
            <h2 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</h2>

            <div class=" col-12 col-md-9 col-lg-6 mx-auto">
                <div class="card-body d-flex mt-1 ">
                    <div class="form-group mx-auto w-100">

                        <label class="h6 important" for="petowner">Pet Owner</label>
                        <input class="form-control" type="text" name="petowner" value="{{ $appointment["owner"] }}" />

                        <label class="h6 important" for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $appointment["email"] }}" />

                        <label class="h6 important" for="petname">Pet Name</label>
                        <input class="form-control" type="text" name="petname" value="{{ $appointment["pet"] }}" />

                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="date" name="date" value="{{ $appointment["appointment_schedule"]->format("Y-m-d") }}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />

                        <label class="h6 important" for="time">Time</label>
                        <input class="form-control" type="time" name="time" value="{{ $appointment["appointment_schedule"]->format("H:i") }}" />

                        <label class="h6 important" for="service">Service Type</label>
                        <input class="form-control" type="text" name="service" value="{{ $appointment["service"] }}" />

                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">
                <div class="col-4 mx-auto text-center">
                    <button class="btn btn-outline-info btn-sm w-50">Save</button>
                    <a href="#"class="btn btn-outline-danger btn-sm w-50">Cancel</a>
                </div>
            </div>

        </div>
    </div>

</div>



@endsection