@extends('layouts.admin')

@section('css')
<style>
.custom-card{
    width: 25rem; 
    margin-left:27rem; 
    padding-top: 1rem; 
    margin-top:2rem; 
    height:500px;
}
.custom-input{
    padding:1px; 
    margin-left:10px; 
    margin-right:10px; 
    margin-bottom:10px
}
</style>
@endsection

@section('title', 'Home')

@section('content')

    
    <div class="card custom-card">
       <h5 class="card-title text-center text-info font-weight-bold">Pet Registration</h5>
      
           <div class="card-body custom-input" >
       <input type="text" class="form-control my-2"  id="InputName" aria-describedby="FirstHelp" placeholder="Pet Name">
       <input type="text" class="form-control my-2" id="InputAddress" placeholder="Breed" >
       <input type="text" class="form-control my-2" id="InputTeleno" placeholder="Color/s">
       <input type="text" class="form-control my-2" id="InputMobno" placeholder="Species">
       <input type="date" class="form-control my-2" id="InputMobno" placeholder="Birthdate">
       <input type="text" class="form-control my-2" id="InputMobno" placeholder="Sex">
           <div class="form-check my-2" style="margin-left:15px;">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1"> Tame</label>
           </div>
           <div class="form-check my-2"style="margin-left:15px;" >
               <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
               <label class="form-check-label" for="exampleRadios2">Wild</label>
           </div>
       </div> 
          <a class=" btn btn-info btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Submit</a>
           <a class=" btn btn-danger btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="#" > Cancel</a>
       
   </div>
@endsection