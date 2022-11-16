@extends('layouts.user')

@section('title', 'Home')

@section('content')
{{-- ---------------------------HOME--------------------------------- --}}
<div class="row mt-5 min-vh-100" id="home">
    <div class="col-12 col-lg-6 mt-5 text-center my-5">
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
                    <a href="{{route ('appointment')}}" class="btn btn-outline-custom mx-auto"><i class="fa-solid fa-arrow-right mr-2"></i>Book Appointment</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 position-relative d-none d-lg-block">
            <div class="circle"> </div>
            <div class="home-banner">
                <img src="{{ asset('uploads/settings/vet.jpg') }}" />
            </div>
        </div>  
</div>  

{{-- --------------------------------------ABOUT------------------------------------------ --}}
<div class="about mt-5 h-100 bg-custom min-vh-100" id="about">
    {{-- Title --}}
        <div class="col-12 d-flex border-bottom border-secondary  ">
            <h3 class="title mx-auto text-white"><i class="fa-solid fa-circle-info mr-2"></i>About Us</h3><br>
        </div>

    {{-- Content --}}
    <div class="row w-100 mb-2 ">
            <div class=" col-12 col-lg-6 w-md-100 mt-5 text-center position-relative d-none d-lg-block ">
                <div class="card w-50 h-75 mx-auto">
                    <div class="w-100 overflow-hidden mx-auto h-75">
                        <img src="{{ asset('uploads/settings/doc.jpg') }}" class="img img-fluid m-auto " style="object-position: center; transform: translateY(-15%);">
                    </div>
                        <h5 class="card-title mt-2 ">Silverio E. Nano, D.V.M </h5>
                        <h4 class="card-text">Veterinarian</h4>
                        <p class="card-text font-italic">since 2006</p>
                </div>
            </div>

            <div class=" col-12 col-md-12 col-lg-6  mt-5 d-flex text-center h-100" style="border-left: solid white;">
                <p class="card-text font-italic text-white mr-auto mt-3 ">Dr. Silverio E. Nano specializes in the area of Dog and Cat. He is interested in Clinical/Surgical procedures. The Nano Veterinary Clinic was built last September 2015. Our Veterinary Clinic was located in Glendale Village, Brgy. Dolores, Taytay Rizal. If you have concerns for your pets health you can look for Doc. Nano and his staffs. We would love to accomodate you and your pets, and answers all your questions and inquiries.<br><br>
                    <h7 class="font-weight-bold">Our Patients:</h7><br>
                    <h9><i class="fa-solid fa-dog mr-2"></i>Dog</h9> <br>
                    <h9><i class="fa-solid fa-cat mr-2"></i>Cat</h9>
                </p>
            </div>
    </div>
</div>


{{-- ---------------------------------------Contact Us------------------------------------------ --}}
<div class="contact bg-white mt-5 min-vh-100" id="contact">
    {{-- Title --}}
    <div class="col-12 d-flex border-bottom border-secondary">
        <h3 class="contact-title mx-auto "><i class="fa-solid fa-phone mr-2"></i>Contact Us</h3><br>
    </div>

    {{-- Content --}}
    <div class="col-12 w-75 my-5 mx-auto   w-md-75 w-lg-75  w-xs-100 ">
        <div class="card my-3 mx-auto w-100  border border-secondary">
            <h5 class="card-header text-center bg-white text-1 font-weight-bold  border border-secondary">We would like to hear from you.</h5>
            <div class="card-body d-flex  border border-secondary">
                <div class="form-group mx-auto  w-xs-100">
                    <div class="col-12">
                        <div class="row ">
                            <div class="order-1 order-lg-0 col-12 col-lg-6">
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

                            <div class="order-0 order-lg-1 col-12 col-lg-6 mx-auto text-center"><br>
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

@section('post-script')
<script type="text/javascript">
    $(document).ready(() => {
        var scrollSpy = setTimeout(() => {
            $('[data-spy=scroll]').each((k, v) => {
                $(v).scrollspy('refresh');
                console.info('Refreshed scroll');
            });
        }, 1500);
    });
</script>
@endsection