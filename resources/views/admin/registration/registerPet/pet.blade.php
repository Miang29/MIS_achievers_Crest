@extends('layouts.admin')

@section('title', 'registerPet')

@section('content')
<h5 class="card-title text-center text-1 font-weight-bold my-3 text-title">Pet Registration</h5>

<div class="col-12 col-md-6 col-lg-3  my-3">
    <div class="card custom-card ">
        <div class="card-body custom-input">
        <input type="text" class="form-control my-2"  id="InputName" aria-describedby="FirstHelp" placeholder="Pet Name">
       <input type="text" class="form-control my-2" id="InputAddress" placeholder="Breed" >
       <input type="text" class="form-control my-2" id="InputTeleno" placeholder="Color/s">
       <input type="text" class="form-control my-2" id="InputMobno" placeholder="Species">
       <input type="date" class="form-control my-2" id="InputMobno" placeholder="Birthdate">
       <input type="text" class="form-control my-2" id="InputMobno" placeholder="Sex">
            <div class="form-check  ">
                <input class="form-check-input " type="radio" name="exampleRadios" id="Radios1" value="option2">
                <label class="form-check-label  " for="Radios1">Tame</label>
                </div>
                <div class="form-check ">
                <input class="form-check-input " type="radio" name="exampleRadios" id="Radios2" value="option2">
                <label class="form-check-label" for="Radios2">Wild</label>
            </div>


        </div>
        <a class=" btn bg-1 btn-sm text-center text-white" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Submit</a>
           <a class=" btn btn-danger btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Cancel</a>
    </div>
</div>
@endsection