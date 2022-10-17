@extends('layouts.admin')

@section('css')
@endsection

@section('title', 'Home')

@section('content')

<div >
    
    <div class="card" style="width: 25rem; margin-left:27rem; padding-top: 1rem; margin-top:2rem; height:500px;">
       <h5 class="card-title text-center text-info font-weight-bold">Pet Registration</h5>
      
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px; margin-bottom:10px" >
       <input type="text" class="form-control"  id="InputName" aria-describedby="FirstHelp" placeholder="Pet Name">
           </div>
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
       <input type="text" class="form-control" id="InputAddress" placeholder="Breed" >
           </div>
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px; margin-bottom:10px">
       <input type="text" class="form-control" id="InputTeleno" placeholder="Color/s">
           </div>
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
       <input type="text" class="form-control" id="InputMobno" placeholder="Species">
           </div>
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
       <input type="date" class="form-control" id="InputMobno" placeholder="Birthdate">
           </div>
           <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
       <input type="text" class="form-control" id="InputMobno" placeholder="Sex">
           </div>
   
           <div class="form-check" style="margin-left:15px;">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1"> Tame</label>
           </div>
   
           <div class="form-check"style="margin-left:15px;" >
               <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
               <label class="form-check-label" for="exampleRadios2">Wild</label>
           </div>
           
   
           <a class=" btn btn-info btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Submit</a>
           <a class=" btn btn-danger btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Cancel</a>
       
           
       
       </div>
   </div>
@endsection