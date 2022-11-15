@extends('layouts.user')

@section('title', 'Home')
@section('content')

<h1 class="mt-5 text-1 text-center font-weight-bold"><i class="fa-solid fa-paw mr-3"></i>Our Services<i class="fa-solid fa-paw ml-3"></i></h1>
<div class="col-12">


    <div class="row">

        <div class=" col-12 col-lg-6 w-lg-100 w-md-100 w-xs-100   text-center ">
            <h4 class="mt-5 ml-4 text-1" style=" font-size: 2.5rem; ">What we offer?</h4>
            <p class="mt-3  mx-auto w-50"> Nano Veterinary Clinic offers services inluding vaccination, consulation, grooming, boarding, medicines and more. To help your pets healthier and live longer.
            </p>
        </div>

        <div class=" col-12 col-lg-6 w-xs-100 w-lg-100  mt-5  text-center ">
            <div class="embed-responsive embed-responsive-21by9">
                <video class="embed-responsive-item" controls autoplay muted>
                    <source src="{{ asset('uploads/settings/pet-video.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class=" col-6 col-md-4 col-lg-4 my-5 ">
                <div class="card bg-1 ml-auto w-100 w-lg-75">
                    <i class="fa-solid fa-user-doctor mt-5 h-25 text-white"></i>
                    <h3 class="card-title text-white text-center ">Consultation</h3>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 my-5">
                <div class="card bg-1 mx-auto w-100 w-lg-75">
                    <i class="fa-solid fa-house-chimney mt-5 h-25 text-white"></i>
                    <h3 class="card-title text-white text-center">Home Service</h3>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg- my-5">
                <div class="card bg-1 w-100 w-lg-75">
                    <i class="fa-solid fa-shield-dog mt-5 h-25 text-white"></i>
                    <h3 class="card-title text-white text-center">Pet Boarding</h3>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 my-5">
                <div class="card bg-1 ml-auto w-100 w-lg-75">
                    <i class="fa-solid fa-scissors mt-5 h-25 text-white"></i>
                    <h3 class="card-title text-white text-center ">Pet Grooming</h3>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 my-5">
                <div class="card bg-1 mx-auto w-100 w-lg-75">
                    <i class="fa-solid fa-syringe mt-5 h-25 text-white"></i>
                    <h3 class="card-title text-white text-center">Vaccination</h3>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 my-5">
                <div class="card bg-1 mr-auto w-100 w-lg-75">
                    <i class="fa-solid fa-kit-medical mt-5 h-25 text-white"></i>
                    <h8 class="card-text text-white text-center font-weight-bold">Medicine, Vitamins, <br>Treats and Accessories</h8>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('post-css')
<style>
    .card {
        height: 15rem;
        width: 15rem;
        border-radius: 1rem;
        transition: 0.25s;
    }

    .card:hover,
    .card:active {
        transform: translateY(-1rem);
        box-shadow: 0 1rem 1rem #00000080;
    }
</style>
@endsection