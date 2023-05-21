@extends('layouts.user')

@section('title', 'Contact Us')

@section('content')


{{-- ============================================= CONTACT US ============================================= --}}
<div class="contact bg-white mt-2 min-vh-100">
    {{-- Title --}}
    <div class="col-12 d-flex">
        <h3 class="contact-title mx-auto "><i class="fa-solid fa-phone mr-2"></i>Contact Us</h3><br>
    </div>

    {{-- Content --}}
    <div class="col-12 w-75 mx-auto   w-md-75 w-lg-75  w-xs-100 ">
        <form class="card my-3 mx-auto w-100  border border-secondary" method="POST" Action="{{ route('submit.message') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h5 class="card-header text-center bg-white text-1 font-weight-bold  border border-secondary">We would like to hear from you.</h5>
            <div class="card-body d-flex  border border-secondary">
                <div class="form-group mx-auto  w-xs-100">
                    <div class="col-12">
                        <div class="row ">
                            <div class="order-1 order-lg-0 col-12 col-lg-6">

                                <div class="form-group">
                                    <input class="form-control my-2 border border-secondary " type="text" name="name" value="{{old('name')}}" placeholder="Name" />
                                    <small class="text-danger small">{{ $errors->first('name') }}</small>
                                </div>

                                <div class="form-group">
                                    <input class="form-control my-2  border border-secondary" type="email" name="email" value="{{old('email')}}" placeholder="Email" />
                                    <small class="text-danger small">{{ $errors->first('email') }}</small>
                                </div>

                                <div class="form-group">
                                    <input class="form-control my-2  border border-secondary" type="text" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No" />
                                    <small class="text-danger small">{{ $errors->first('mobile') }}</small>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control my-2 not-resizable  border border-secondary" name="message" rows="3" placeholder="Message"></textarea>
                                    <small class="text-danger small">{{ $errors->first('message') }}</small>
                                </div>
                            </div>

                            <div class="order-0 order-lg-1 col-12 col-lg-6 mx-auto text-center"><br>
                                <img src="{{ asset('uploads/settings/banner.png') }}" class="img img-fluid mx-auto my-2 w-50" alt="Nano machines son">
                                <h3 class="mt-auto font-weight-bold mx-auto text-custom-1  ">VETERINARY CLINIC</h3>
                                <p class="text-1 mx-auto font-weight-bold">for more details and inquiries:</p>
                                <p class="text-1 mx-auto font-italic"><i class="fa-solid fa-envelope mr-2"></i>nanovetclinic2015@gmail.com</p>
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
            <div class="card-footer">

                <div class="d-flex">
                    <button class="btn btn-outline-primary btn-sm w-25  mr-2 ml-auto" type="submit" data-type="submit" data-action="submit">Send</button>
                    <a href="javascript:void(0);" onclick="confirmLeave('{{ route('home') }}');" class="btn btn-outline-danger btn-sm w-25 mr-auto">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>
<div class="card-footer col-lg-12 text-center cite" style="background-color:#021f53; color:white;">
    Copyright <i class="fa-solid fa-copyright"></i> Nano Vet 2015
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection