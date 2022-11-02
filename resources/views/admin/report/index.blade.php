@extends('layouts.admin')

@section('title', 'report')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h2 class="font-weight-bold text-1">Reports</h2>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
                <label class="font-weight-bold mr-3">Filter from</label>
                <input type="date" />
            </div>
            <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
                <label class="font-weight-bold mr-3">To</label>
                <input type="date" />
            </div>
        </div>

        <div class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto h-100 card mb-3">
        <div class="card-header">
            <div class="row">
                <button class="btn btn-outline-primary btn-sm ml-3 my-2 "><a href="#"></a>Profile</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a>Appointment</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a>Inventory</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a>Users</button>

                <div class="dropdown">
                    <button class="btn btn-outline-primary my-2 ml-3 btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Transaction
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Product Order</a>
                        <a class="dropdown-item" href="#">Services</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-outline-primary my-2 ml-3 btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Consultation</a>
                        <a class="dropdown-item" href="#">Vaccination</a>
                        <a class="dropdown-item" href="#">Pet Boarding</a>
                        <a class="dropdown-item" href="#">Pet Grooming</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
        </div>

        <div class="card-footer d-flex">
            <button class="btn btn-outline-primary btn-sm mx-auto  "><a href="#"></a><i class="fa-solid fa-print mr-2"></i>Print Report</button>

        </div>
    </div>

</div>



@endsection