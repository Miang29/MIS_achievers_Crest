@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('boarding')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet Boarding</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1">Pet Boarding</h5>
                <div class="card-body d-flex">
                    <div class="form-group col-6 mx-auto w-50">

                        <label class="h6" for="petowner">Pet Owner<span class="text-danger"></span></label>
                        <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}" readonly />

                        <label class="h6" for="petname">Pet Name<span class="text-danger"></span></label>
                        <input class="form-control" type="text" name="petname" value="{{old('petname')}}" readonly />

                        <h5 class="text-center text-1 font-weight-bold ">Departure</h5>
                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="text" name="date" value="{{Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y') }}" readonly />

                        <label class="h6 important" for="time">Time In</label>
                        <input class="form-control" type="text" name="time" value="{{old('time')}} " readonly />


                        <h5 class="text-center text-1 font-weight-bold my-2">Return</h5>
                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="text" name="date" value="{{Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y') }}" readonly />

                        <label class="h6 important" for="time">Time Out</label>
                        <input class="form-control" type="text" name="time" value="{{old('time')}} " readonly />

                    </div>


                </div>
               
            </div>
        </div>
    </div>

    @endsection