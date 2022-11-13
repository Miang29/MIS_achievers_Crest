@extends('layouts.admin')

@section('title', 'appointment')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">

            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white gbg-1">View Appointment</h5>

                <div class="col col-12 col-md-9 col-lg-6 mx-auto">
                    <div class="card-body d-flex mt-1 ">
                        <div class="form-group mx-auto w-100">

                            <label class="h6 important" for="petowner">Pet Owner</label>
                            <input class="form-control" type="text" name="petowner" value="{{ $appointment['owner'] }} " readonly />

                            <label class="h6 important" for="email">Email</label>
                            <input class="form-control" type="email" value="{{ $appointment['email'] }} " readonly />

                            <label class="h6 important" for="petname">Pet Name</label>
                            <input class="form-control" type="text" value="{{ $appointment['pet'] }} " readonly />

                            <label class="h6 important" for="date">Date</label>
                            <input class="form-control" type="text" value="{{ $appointment['appointment_schedule']->format('F d, Y') }}" readonly />

                            <label class="h6 important" for="time">Time</label>
                            <input class="form-control" type="text" value="{{ $appointment['appointment_schedule']->format('g:i A') }} " readonly />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection