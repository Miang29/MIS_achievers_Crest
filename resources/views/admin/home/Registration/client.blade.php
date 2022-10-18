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
    <h5 class="card-title text-center text-info font-weight-bold">Client Registration</h5>
   
        <div class="card-body custom-input" >
    <input type="name" class="form-control my-2"  id="InputName" aria-describedby="FirstHelp" placeholder="Pet Owner"> 
    <input type="text" class="form-control my-2" id="InputAddress" placeholder="Address" >
    <input type="mobile number" class="form-control my-2" id="InputTeleno" placeholder="Telephone No">
    <input type="mobile number" class="form-control my-2" id="InputMobno" placeholder="Mobile no">
        <div class="form-check " style="margin-left:15px;">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
             <label class="form-check-label" for="exampleRadios1"> New</label>
        </div>

        <div class="form-check "style="margin-left:15px;" >
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">Old</label>
        </div>

         </div>
        <a class=" btn btn-info btn-sm text-center" style="margin-left:150px; margin-right:150px; margin-bottom:10px; border-radius:20px;" href="{{route('pet')}}" > 
        <i class="fa-solid fa-arrow-right"></i> Next</a>
</div>
@endsection