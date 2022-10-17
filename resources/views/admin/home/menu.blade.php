@extends('layouts.admin')

@section('css')
@endsection

@section('title', 'Home')

@section('content')

<div class="d-flex flex-column min-vh-100 bg-white">
        <div class="content d-flex flex-column flex-grow-1 my-5 my-lg-10 align-items-center" id="content">
          <h1 class="title text-info font-weight-bold text-uppercase">Dashboard</h1>
      <div class="row ">
            <div class="col-sm-6 mb-3">
              <div class="card border-primary bg-info">
                 <div class="card-body text-center">
                    <h5 class="card-title text-white">Patients</h5>
                    <p class="card-text font-weight-bold">0</p>
                 </div>
             </div>
           </div>

           <div class="col-sm-6 mb-3">
              <div class="card border-primary">
                 <div class="card-body bg-success text-center">
                   <h5 class="card-title text-white">Vaccinated Pets</h5>
                   <p class="card-text font-weight-bold">0</p>
                </div>
            </div>
        </div>

        
        <div class="col-sm-6 mb-3">
              <div class="card border-primary">
                 <div class="card-body bg-warning text-center ">
                   <h5 class="card-title text-white">Stocks</h5>
                   <p class="card-text font-weight-bold">0</p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 mb-3 ">
              <div class="card border-primary">
                 <div class="card-body bg-primary text-center ">
                   <h5 class="card-title text-white">Users</h5>
                   <p class="card-text font-weight-bold ">0</p>
                </div>
            </div>
        </div>
</div>

    




        </div>
</div>

@endsection