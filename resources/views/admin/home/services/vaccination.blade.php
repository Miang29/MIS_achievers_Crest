@extends('layouts.admin')

@section('css')
<style>
.custom-card{
width: 25rem; 
margin-left:20rem; 
padding-top: 1rem; 
margin-top:2rem; 
height:550px;
margin-bottom:3rem;
}

. card-input{
    margin-top:2px;
    margin-left:10px; 
    margin-right:10px;
    margin-bottom:10px;
}
.button{
    margin-left:250px; 
    margin-right:250px; 
    margin-bottom:45px; 
    border-radius:20px;
}

</style>
@endsection

@section('title', 'Home')

@section('content')

<div >
    
 <div class="card custom-card w-50 ">
    <h5 class="card-title text-center text-info font-weight-bold">Vaccination Appointment</h5>
   
        <div class="card-body card-input" >
        <label for="Date"> Date</label>
    <input type="date" class="form-control"  id="Date" aria-describedby="FirstHelp" placeholder="Date">
    <input type="text" class="form-control my-2" id="PetOwner" placeholder="Pet Owner" >
    <input type="text" class="form-control my-2" id="PetName" placeholder="Pet Name">
        
        <h5 class="card-title text-center text-info font-weight-bold">Vaccine Information</h5>

         <label for="Expiration">Vaccine Expiration</label>
    <input type="date" class="form-control"  id="Expiration" aria-describedby="FirstHelp" placeholder="Vaccine Expiration">
    <input type="text" class="form-control my-2" id="PetOwner" placeholder="Vaccine Type" >
    <input type="text" class="form-control" id="PetName" placeholder="Veterenarian">
        </div>
   
        <a class=" button btn-info btn-sm text-center  font-weight-bold" href="" > Submit</a>
        </div>
    </div>
@endsection