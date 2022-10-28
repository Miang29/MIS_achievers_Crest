@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('boarding')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet Boarding</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1">Edit Pet Boarding</h5>
                <div class="card-body d-flex">
                    <div class="form-group col-6 mx-auto w-50">

                        <label class="h6 important" for="petowner">Pet Owner</label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="petowner" value="{{old('petowner')}}"></option>
                            </select>
                        </div>

                        <label class="h6  important" for="petname">Pet Name</label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="petname" value="{{old('petname')}}"></option>
                            </select>
                        </div>

                        <h5 class="text-center text-1 font-weight-bold ">Departure</h5>
                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="date" name="date" value="{{old('date')}} " min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}"/>

                        <label class="h6 important" for="time">Time In</label>
                        <input class="form-control" type="time" name="time" value="{{old('time')}} " />

                        
                        <h5 class="text-center text-1 font-weight-bold my-2">Return</h5>
                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="date" name="date" value="{{old('date')}}" min="{{Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />

                        <label class="h6 important" for="time">Time Out</label>
                        <input class="form-control" type="time" name="time" value="{{old('time')}} " />

                    </div>


                </div>
                <div class="col-12 my-2 d-flex flex-row">
                    <button class="btn btn-outline-info ml-auto mr-4 w-25"><a href="#"></a>Save</button>
                    <button class="btn btn-outline-danger ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @endsection