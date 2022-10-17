@extends('layouts.admin')

@section('css')
<style>
    
    .custom-input {
        padding:5px;
        margin-left:10px; 
        margin-right:10px; 
        margin-bottom:4rem;
       
    }
    .custom-card{
        width:550px; 
        position: absolute;
        height:600px;
        padding:1px;
        
    }
    .btn{
        margin-left:200px; 
        margin-right:200px; 
        margin-bottom:10px; 
        border-radius:20px;
    }
    .custom-col{
        margin-top: 1rem;
    }
    .custom-col2{
        padding-bottom:1px;
        margin-left : 38rem;
       
     
    
    }
   
</style>
@endsection

@section('title', 'Home')

@section('content')

<div class="container">
  <div class="row row-cols-2">
    <div class="col custom-col">

    <div class="card custom-card">
        
       <h5 class="card-title text-center text-info font-weight-bold">Consultation</h5>
    <div class="card-body custom-input">
       <input type="text" class="form-control"  id="Clientame" aria-describedby="FirstHelp" placeholder="Client Name">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="Petname" placeholder="Pet Name" >
           </div>
           <div class="card-body custom-input">
       <input type="date" class="form-control" id="Date" placeholder="Date">
           </div>
           <div class="card-body custom-input" >
       <input type="time" class="form-control" id="Time" placeholder="Time">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="Temp" placeholder="Wt./Temperature">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="History" placeholder="Clinical History">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="Findings" placeholder="Findings">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="Treatment" placeholder="Treatment">
           </div>
           <div class="card-body custom-input">
       <input type="text" class="form-control" id="Procedure" placeholder="Procedure">
           </div>
           <div class="card-body custom-input">
       <input type="number" class="form-control" id="Cost" placeholder="Cost">
           </div>
       
           <a class=" btn btn-info  text-center" href="#" > Add</a>
           <a class=" btn btn-danger  text-center" href="#" > Cancel</a>
    </div>



    <div class="col custom-col2">
    <div class="card custom-card ">
        
        <h5 class="card-title text-center text-info font-weight-bold">Database</h5>
        
     </div>
     </div>
 
  </div>
</div>
    
@endsection