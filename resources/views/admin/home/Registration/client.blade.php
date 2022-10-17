@extends('layouts.admin')

@section('css')
@endsection

@section('title', 'Home')

@section('content')

<div >
    
 <div class="card" style="width: 25rem; margin-left:28rem; padding-top: 1rem; margin-top:5rem; height:auto;">
    <h5 class="card-title text-center text-info font-weight-bold">Client Registration</h5>
   
        <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px; margin-bottom:10px" >
    <input type="name" class="form-control"  id="InputName" aria-describedby="FirstHelp" placeholder="Pet Owner">
        </div>
        <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
    <input type="text" class="form-control" id="InputAddress" placeholder="Address" >
        </div>
        <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px; margin-bottom:10px">
    <input type="mobile number" class="form-control" id="InputTeleno" placeholder="Telephone No">
        </div>
        <div class="card-body" style="padding:1px; margin-left:10px; margin-right:10px;margin-bottom:10px">
    <input type="mobile number" class="form-control" id="InputMobno" placeholder="Mobile no">
        </div>

        <div class="form-check " style="margin-left:15px;">
             <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
             <label class="form-check-label" for="exampleRadios1"> New</label>
        </div>

        <div class="form-check "style="margin-left:15px;" >
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">Old</label>
        </div>
        
        <a class=" btn btn-info btn-sm text-center" style="margin-left:100px; margin-right:100px; margin-bottom:10px; border-radius:20px;" href="{{route('pet')}}" > Next</a>
    
    </div>
</div>
@endsection