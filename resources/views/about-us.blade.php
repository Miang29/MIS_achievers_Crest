@extends('layouts.user')

@section('title', 'Home')

@section('content')

{{-- ============================================= ABOUT ============================================= --}}
<div class="about  h-100 bg-custom min-vh-100">
    {{-- Title --}}
    <div class="col-12 d-flex border-bottom border-secondary  ">
        <h3 class="title mx-auto text-white"><i class="fa-solid fa-circle-info mr-2"></i>About Us</h3><br>
    </div>

    {{-- Content --}}
    <div class="row w-100 mb-2 ">
        <div class=" col-12 col-lg-6 w-md-100 mt-5 text-center position-relative d-none d-lg-block ">
            <div class="card w-50 h-75 mx-auto">
                <div class="w-100 overflow-hidden mx-auto h-75">
                    <img src="{{ asset('uploads/settings/doc-nano.jpg') }}" class="img img-fluid mt-5" style="object-position: center; transform: translateY(-15%);">
                </div>
                <h5 class="card-title mt-2 ">Silverio E. Nano, D.V.M </h5>
                <h4 class="card-text">Veterinarian</h4>
                <p class="card-text font-italic">since 2006</p>
            </div>
        </div>

        <div class=" col-12 col-md-12 col-lg-6  mt-5 d-flex text-center h-100" style="border-left: solid white;">
            <p class="card-text font-italic text-white mr-auto mt-3 ">Dr. Silverio E. Nano specializes in the area of Dog and Cat. He is interested in Clinical/Surgical procedures. The Nano Veterinary Clinic was built last September 2015. Our Veterinary Clinic was located in Glendale Village, Brgy. Dolores, Taytay Rizal. If you have concerns for your pets health you can look for Doc. Nano and his staffs. We would love to accomodate you and your pets, and answers all your questions and inquiries.<br><br>
                <h7 class="font-weight-bold">Our Patients:</h7>
                <h9><i class="fa-solid fa-dog mr-2"></i>Dog</h9>
                <h9><i class="fa-solid fa-cat mr-2"></i>Cat</h9>
            </p>
        </div>
    </div>
</div>
@endsection