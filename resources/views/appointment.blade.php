@extends('layouts.user')

@section('title', 'Home')

@section('content')

<div class="row" id="form-area">
    <div class="col-12 mt-5 ">

        <form class="card w-50 my-3 mt-3 mx-auto">
            <h2 class="card-header font-weight-bold  text-center text-white gbg-2"><i class="fa-solid fa-paw mr-3"></i>Create Appointment<i class="fa-solid fa-paw ml-3"></i></h2>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        {{-- OWNER --}}
                        <div class="form-group">
                            <input class="form-control border-secondary" type="text" name="petowner" value="{{old('petowner')}}" placeholder="Pet Owner" />
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group">
                            <input class="form-control border-secondary" type="email" name="email" value="{{old('email')}} " placeholder="Email" />
                        </div>

                        {{-- PET --}}
                        <div class="form-group">
                            <input class="form-control border-secondary" type="text" name="petname" value="{{old('petname')}}" placeholder="Pet Name" />
                        </div>

                        {{-- DATE --}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-secondary">Date</span>
                                </div>
                                <input class="form-control border-secondary border-left-0" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
                            </div>
                        </div>

                        {{-- TIME --}}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-white border-secondary">Time</div>
                                </div>
                                <input class="form-control border-secondary border-left-0" type="time"  name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 form-group">

                    <img src="{{ asset('uploads/settings/pet-banner.png') }}" class="img img-fluid mx-auto my-2 w-100  position-overflow" alt="Nano machines son">
                    </div>


                </div>
            </div>

            <div class="card-footer d-flex flex-row">
                <button class="btn btn-outline-custom ml-auto btn-sm mr-4 w-25" type="submit">Book</button>
                <a href="#" class="btn btn-outline-danger btn-sm ml-1 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
            </div>
        </form>
    </div>


    @endsection