@extends('layouts.admin')

@section('css')
<style>
.custom-card{
width: 25rem; 
margin-left:28rem; 
padding-top: 1rem; 
margin-top:5rem; 
height:auto;
}

. card-input{
    padding:1px; 
    margin-left:10px; 
    margin-right:10px;
    margin-bottom:10px;
}

</style>
@endsection

@section('title', 'Home')

@section('content')

<div >
    
 <div class="card custom-card">
    <h5 class="card-title text-center text-info font-weight-bold">Vaccination Appointment</h5>
   
        <div class="card-body card-input" >
        <label for="Date">Date</label>
    <input type="date" class="form-control"  id="Date" aria-describedby="FirstHelp" placeholder="Date">
        </div>
        <div class="card-body card-input">
    <input type="text" class="form-control" id="PetOwner" placeholder="Pet Owner" >
        </div>
        <div class="card-body card-input">
    <input type="text" class="form-control" id="PetName" placeholder="Pet Name">
        </div>
    
        <h5 class="card-title text-center text-info font-weight-bold">Vaccine Information</h5>
   
         <div class="card-body card-input" >
         <label for="Expiration">Vaccine Expiration</label>
    <input type="date" class="form-control"  id="Expiration" aria-describedby="FirstHelp" placeholder="Vaccine Expiration">
         </div>
         <div class="card-body card-input">
    <input type="text" class="form-control" id="PetOwner" placeholder="Vaccine Type" >
         </div>
        <div class="card-body card-input">
    <input type="text" class="form-control" id="PetName" placeholder="Veterenarian">
         </div>
       
        <a class=" btn btn-info btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="{{route('pet')}}" > Next</a>
    
    </div>
</div>
@endsection