@extends('layouts.admin')

@section('title', 'Registration')

@section('content')
<h5 class="card-title text-center text-1 font-weight-bold my-5 text-title">Client Registration</h5>

<div class="col-12 col-md-6 col-lg-3  my-3">
    <div class="card custom-card ">
        <div class="card-body custom-input">
            <input type="name" class="form-control my-2" id="InputName" aria-describedby="FirstHelp" placeholder="Pet Owner">
            <input type="text" class="form-control my-2" id="InputAddress" placeholder="Address">
            <input type="mobile number" class="form-control my-2" id="InputTeleno" placeholder="Telephone No">
            <input type="mobile number" class="form-control my-2" id="InputMobno" placeholder="Mobile no">
            <div class="form-check " style="margin-left:15px;">
                <input class="form-check-input" type="radio" name="exampleRadios" id="Radios1" value="option1" checked>
                <label class="form-check-label" for="Radios1"> New</label>
            </div>

            <div class="form-check " style="margin-left:15px;">
                <input class="form-check-input" type="radio" name="exampleRadios" id="Radios2" value="option2">
                <label class="form-check-label" for="Radios2">Old</label>
            </div>

        </div>
        <a class=" btn bg-1 btn-sm text-center text-white" style="margin-left:150px; margin-right:150px; margin-bottom:10px; border-radius:20px;" href="{{route('pet')}}">
            <i class="fa-solid fa-arrow-right"></i> Next</a>
    </div>
</div>
@endsection