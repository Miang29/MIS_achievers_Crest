@extends('layouts.user')

@section('title', 'Home')

@section('content')
<div class="row mt-5">
    <div class="col-12 col-lg-6 text-center">
        <img src="{{ asset('uploads/settings/banner.png') }}" class="img img-fluid mx-auto my-2 w-25" alt="Nano machines son">
        <h3 class="mt-auto font-weight-bold mx-auto text-custom-1  ">VETERINARY CLINIC</h3>
        <p class="text-1 mx-auto">Blk. 3 Lot 3 Unit 5 Glendale Village,Brgy. Dolores, Taytay Rizal</p>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Clinic Hours</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM Daily</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Accept Home Service</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 d-flex">
                <h5 class="ml-auto text-1">Grooming Hours</h5>
            </div>
            <div class="col-6 d-flex">
                <p class="mr-auto">8:00 AM - 8:00 PM</p>
            </div>
        </div><br>

        <div class="row">
            <div class="col-12 d-flex ">
                <a href="#" class="btn btn-outline-custom mx-auto  "><i class="fa-solid fa-arrow-right mr-2"></i>Book Appointment</a>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 position-relative">
        <div class="circle"></div>
        <div class="home-banner">
            <img src="{{ asset('uploads/settings/vet.jpg') }}"/>
        </div>
    </div>
</div>
@endsection