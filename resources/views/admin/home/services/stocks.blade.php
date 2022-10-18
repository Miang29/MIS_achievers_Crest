@extends('layouts.admin')

@section('css')
<style>
    .custom-card{
        width:550px; 
        position: absolute;
        height:320px;
        margin-right : 1rem;
        
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
<div class="d-flex flex-column min-vh-100 bg-white ">
        <div class="content d-flex flex-column flex-grow-1 my-5 my-lg-10 align-items-center" id="content">
          <h1 class="title text-info font-weight-bold text-uppercase">Stocks</h1>
    
<div class="container">
  <div class="row row-cols-2">
    <div class="col custom-col">

    <div class="card custom-card">
         <div class="card-body ">
       <input type="number" class="form-control my-2"  id="No"  placeholder="Item No"> 
       <input type="text" class="form-control my-2" id="ItemName" placeholder="Item Name" >  
       <input type="text" class="form-control my-2" id="Type" placeholder="Item Type"> 
       <input type="number" class="form-control my-2" id="Quantity" placeholder="Quantity">  
       <input type="number" class="form-control my-2" id="Price" placeholder="Price">   

          <div class="Button" >
            <a class=" btn btn-info btn-sm   text-center my-2" href="#" style="margin-left: 50px"><i class="fa-solid fa-plus"></i> New Stock</a>
            <a class=" btn btn-info btn-sm   text-center my-2" href="#" ><i class="fa-solid fa-circle-plus"></i> Add </a>
            <a class=" btn btn-info btn-sm   text-center my-2" href="#" ><i class="fa-solid fa-floppy-disk"></i> Save </a>
            <a class=" btn btn-info btn-sm   text-center my-2" href="#" ><i class="fa-solid fa-pen-to-square"></i> Update </a>
            <a class=" btn btn-danger btn-sm text-center my-2" href="#"><i class="fa-solid fa-ban"></i> Cancel</a> 
          </div>
    </div>
    </div>

    <div class="col custom-col2">
    <div class="card custom-card ">
        
        <h5 class="card-title text-center  text-info font-weight-bold">DG</h5>
        
     </div>
     </div>
 
  </div>
</div>
    
@endsection