@extends('layouts.user')

@section('title', 'Home')

@section('content')

<div class="row mt-5">
    <div class="col-12 col-lg-6 mt-5 text-center my-5"><br>
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
    <div class="col-12 bg-white ">
       
    </div>
</div><br>

{{-- ABOUT --}}
<div class="about mt-5 h-100 bg-custom ">
    {{-- title --}}
    <div class="col-12 d-flex border-bottom border-secondary  ">
        <h3 class="title mx-auto text-white"><i class="fa-solid fa-circle-info mr-2"></i>About Us</h3><br>
    </div>

    {{--content --}}

    <div class="row">
        <div class=" col-12 col-lg-6 mt-5 text-center ">
            <div class="card w-50 h-75 mx-auto">
                <div class="w-100 overflow-hidden mx-auto h-75">
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


{{-- Contact Us--}}
<div class="contact bg-white ">
    {{-- title --}}
    <div class="col-12 d-flex mt-3  border-bottom border-secondary">
        <h3 class="contact-title mx-auto "><i class="fa-solid fa-phone mr-2"></i>Contact Us</h3><br>
    </div>

    {{-- content --}}
    <div class="col-12 w-75 mt-5 my-5 mx-auto ">
        <div class="card my-3 mx-auto w-100  border border-secondary">
            <h5 class="card-header text-center bg-white text-1 font-weight-bold  border border-secondary">We would like to hear from you.</h5>
            <div class="card-body d-flex  border border-secondary">
                <div class="form-group mx-auto w-75">
                    <div class="col-12 ">
                        <div class="row d-flex">
                            <div class="col-6"><br>
                                <input class="form-control my-2 border border-secondary " type="text" name="petowner" value="{{old('petowner')}}" placeholder="Name" />


                                <input class="form-control my-2  border border-secondary" type="email" name="email" value="{{old('email')}}" placeholder="Email" />

                                <input class="form-control my-2  border border-secondary" type="text" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No" />


                                <textarea class="form-control my-2 not-resizable  border border-secondary" name="message" rows="3" placeholder="Message"></textarea>

                                <div class="row d-flex">
                                    <div class=" col-6 mx-auto">
                                        <button class="btn btn-outline-custom btn-sm w-50" style="border-radius: 1rem;"><a href="#"></a>Send</button>
                                        <a href="#" class="btn btn-outline-danger btn-sm w-50 " style="border-radius: 1rem;">Cancel</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 mx-auto text-center"><br>
                                <img src="{{ asset('uploads/settings/banner.png') }}" class="img img-fluid mx-auto my-2 w-50" alt="Nano machines son">
                                <h3 class="mt-auto font-weight-bold mx-auto text-custom-1  ">VETERINARY CLINIC</h3>
                                <p class="text-1 mx-auto font-italic font-weight-bold">for more details and inquiries</p>

                                <div class="row d-flex">
                                    <div class="col-6 mx-auto ">
                                        <p class="ml-auto text-1"><i class="fa-solid fa-phone mr-2"></i>8650-1153</p>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <p class="mr-auto text-1"><i class="fa-solid fa-mobile mr-2"></i>0948-513-0788</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection