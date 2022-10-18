@extends('layouts.admin')

@section('css')
<style>
.custom-card{
margin-left:11rem; 
padding-top: 1rem; 
margin-top:2rem; 
height:550px;
margin-bottom:3rem;
}

.button{
    margin-left:400px; 
    margin-right:400px; 
    margin-bottom:45px; 
    border-radius:20px;
}
.card-title{
    margin-top:2rem;
    font-size:1.8rem;
}

</style>
@endsection

@section('title', 'Home')

@section('content')

<div >
     <h5 class="card-title text-center text-info font-weight-bold">User Account</h5>
 <div class="card custom-card w-75 ">
   
   
        <div class="card-body card-input" >
      
   
        
        </div>
        <a class=" button btn-info btn-sm text-center  font-weight-bold" href="" > Submit</a>
    </div>
@endsection