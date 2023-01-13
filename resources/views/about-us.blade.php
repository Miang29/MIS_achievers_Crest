@extends('layouts.user')

@section('title', 'Home')

@section('content')

<div class="col-lg-12 col-md-8 col-12 bg-white h-100 min-vh-100">
    {{-- Title --}}
    <div class="col-12 d-flex border-bottom border-secondary  ">
        <h1 class="title mx-auto"><i class="fa-solid fa-house-chimney-medical mr-2"></i>Our Clinic</h1><br>
    </div>

    <div class="row w-100">

        <div class=" col-12 col-md-12 col-lg-6 d-flex text-center h-100" style="margin-top:8rem;">
            <p class="card-text font-italic mr-auto mt-5">Nano Veterinary Clinic is located in Taytay, Rizal. Nano Veterinary Clinic is working in Veterinarians & animal hospitals, Animal and pet stores activities. The Nano Veterinary Clinic was built last September 2015.<br><br></p>
        </div>

        <div class=" col-12 col-lg-6 w-md-100 mt-5 text-center position-relative d-none d-lg-block ">
            <div class="card w-50 w-lg-100 h-75 mx-auto dark-shadow">
                <div class="w-100 overflow-hidden mx-auto h-100 mt-5">
                    <img src="{{ asset('uploads/settings/nano-clinic.jpg') }}" class="img img-fluid mt-5" style="object-position:center; transform: translateY(-50%);">
                </div>
            </div>
        </div>


    </div>

    <div class="card-body">
        <p> </p>
    </div>
</div>

{{-- ============================================= ABOUT ============================================= --}}
<div class="about h-100 bg-custom min-vh-100">
    {{-- Title --}}
    <div class="col-12 d-flex border-bottom border-secondary  ">
        <h1 class="title mx-auto text-white mt-5"><i class="fa-solid fa-user-doctor mr-2"></i>Our Veterinarian</h1><br>
    </div>

    {{-- Content --}}
    <div class="row w-100 mb-2 ">
        <div class=" col-12 col-lg-6 w-md-100 mt-5 text-center position-relative d-none d-lg-block ">
            <div class="card w-50 h-75 mx-auto">
                <div class="w-100 overflow-hidden mx-auto h-75">
                    <img src="{{ asset('uploads/settings/doc-nano.jpg') }}" class="img img-fluid mt-5" style="object-position: center; transform: translateY(-15%);">
                </div>
                <h5 class="card-title mt-2">Silverio E. Nano, D.V.M </h5>
                <h4 class="card-text">Veterinarian</h4>
                <p class="card-text font-italic">since 2006</p>
            </div>
        </div>

        <div class=" col-12 col-md-12 col-lg-6  mt-5 d-flex text-center h-100" style="border-left: solid white;">
            <p class="card-text font-italic text-white mr-auto mt-3">Dr. Silverio E. Nano specializes in the area of Dog and Cat. He is interested in Clinical/Surgical procedures. If you have concerns for your pets health you can look for Doc. Nano and his staffs. He would love to accomodate you and your pets, and answers all your questions and inquiries.<br><br>
                <h7 class="font-weight-bold">Our Patients:</h7>
                <h9><i class="fa-solid fa-dog mr-2"></i>Dog</h9>
                <h9><i class="fa-solid fa-cat mr-2"></i>Cat</h9>
            </p>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-8 col-12 bg-white h-100 min-vh-100">
    {{-- Title --}}
    <div class="col-12 d-flex">
        <h1 class="title mx-auto"><i class="fa-solid fa-map-pin mr-2"></i>Our Location</h1><br>
    </div>
    <div class="" style="border:#021f53 solid">
        <div class="mapouter mx-auto">
            <div class="gmap_canvas"><iframe width="1000" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=Blk.%203%20Lot%203%20Unit%205%20Glendale%20Village,Brgy.%20Dolores,%20Taytay%20Rizal&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com/divi-discount/">divi discount</a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 450px;
                        width: 1000px;
                    }
                </style><a href="https://www.embedgooglemap.net">map embed iframe</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 450px;
                        width: 1000px;
                    }
                </style>
            </div>
        </div>
    </div>
</div>

<div class="card-footer col-lg-12 text-center cite" style="background-color:#021f53; color:white;">
    Copyright <i class="fa-solid fa-copyright"></i> Nano Vet 2015
</div>
@endsection>