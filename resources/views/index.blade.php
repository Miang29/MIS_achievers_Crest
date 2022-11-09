@extends('layouts.user')

@section('title', 'Home')

@section('content')

<div class="row mt-5">
    <div class="col-12 col-lg-6 mt-5 text-center"><br>
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
                <a href="#" class="btn btn-outline-custom mx-auto"><i class="fa-solid fa-arrow-right mr-2"></i>Book Appointment</a>

            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 position-relative">
        <div class="circle"></div>
        <div class="home-banner">
            <img src="{{ asset('uploads/settings/vet.jpg') }}" />
        </div>
    </div>
</div><br>

<div class="about mt-5  bg-light ">
    {{-- TITLE --}}
    <div class="col-12 d-flex mt-3 ">
        <h2 class="title mx-auto ">About Us</h2><br>
    </div>

    {{--body --}}

    <div class="row">
        <div class=" col-12 col-lg-6 mt-3 text-center ">
            <div class="card w-50 h-75 mx-auto">
                <div class="w-100 overflow-hidden mx-auto h-100">
                    <img src="{{ asset('uploads/settings/doc.jpg') }}" class="img img-fluid m-auto " style="object-position: center; transform: translateY(-15%);">
                </div>
                <h3 class="card-title mt-2">Silverio E. Nano, D.V.M </h3>
                <h4 class="card-text">Veterinarian</h4>
                <p class="card-text font-italic">since 2006</p>
            </div>
        </div>

        <div class=" col-12 col-lg-6 mt-3 d-flex text-center ">
            
        </div>


    </div>


</div>

@endsection