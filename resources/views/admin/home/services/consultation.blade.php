@extends('layouts.admin')

@section('css')
<style>
    .custom-card{
        width:550px; 
        position: absolute;
        height:540px;
        margin-right : rem;
   
    }
    .custom-col2{
      
        margin-left : 38rem;
    }
   
</style>
@endsection

@section('title', 'Home')

@section('content')
<div class="d-flex flex-column min-vh-100 bg-white ">
        <div class="content d-flex flex-column flex-grow-1 my-5 my-lg-10 align-items-center" id="content">
          <h1 class="title text-info font-weight-bold text-uppercase">Consultation</h1>
    
<div class="container">
  <div class="row row-cols-2">
    <div class="col custom-col">

    <div class="card custom-card">
         <div class="card-body">

       <input type="text" class="form-control my-2"  id="Clientame" aria-describedby="FirstHelp" placeholder="Client Name"> 
       <input type="text" class="form-control my-2" id="Petname" placeholder="Pet Name" >  
       <input type="date" class="form-control my-2" id="Date" placeholder="Date">  
       <input type="time" class="form-control my-2" id="Time" placeholder="Time">  
       <input type="text" class="form-control my-2" id="Temp" placeholder="Wt./Temperature">   
       <input type="text" class="form-control my-2" id="History" placeholder="Clinical History">   
       <input type="text" class="form-control my-2" id="Findings" placeholder="Findings">     
       <input type="text" class="form-control my-2" id="Treatment" placeholder="Treatment">   
       <input type="text" class="form-control my-2" id="Procedure" placeholder="Procedure">    
       <input type="number" class="form-control my-2" id="Cost" placeholder="Cost">    

          <div class="Button" >
            <a class=" btn btn-info btn-md   text-center my-2" href="#" style="margin-left: 170px;"><i class="fa-solid fa-circle-plus"></i> Add</a>
            <a class=" btn btn-danger btn-md text-center my-2" href="#"><i class="fa-solid fa-ban"></i> Cancel</a> 
          </div>
    </div>
    </div>

    <div class="col custom-col2">
    <div class="card custom-card ">
        
        <h5 class="card-title text-center  text-info font-weight-bold">List</h5>
        
     </div>
     </div>
 
  </div>
</div>
    
@endsection