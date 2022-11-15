@extends('layouts.admin')

@section('title', 'Report')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h2 class="font-weight-bold text-1">Reports</h2>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
                <label class="font-weight-bold mr-3 text-1">Filter from</label>
                <input type="date" />
            </div>
            <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
                <label class="font-weight-bold mr-3  text-1">To</label>
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
                <button class="btn btn-outline-primary btn-sm ml-3 my-2 "><a href="#"></a><i class="fas fa-address-card mr-2"></i>Profile</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a><i class="fa-solid fa-calendar mr-2"></i>Appointment</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a><i class="fa-solid fa-warehouse mr-2"></i>Inventory</button>
                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a><i class="fas fa-user-alt mr-2"></i>Users</button>

                <div class="dropdown">
                    <button class="btn btn-outline-primary my-2 ml-3 btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-money-check-dollar mr-2"></i> Transaction
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><i class="fas fa-money-check-dollar mr-1 "></i>Product Order</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-shield-cat mr-1"></i>Services Transaction</a>
                    </div>
                </div>   

                <button class="btn btn-outline-primary btn-sm ml-3 my-2  "><a href="#"></a><i class="fa-solid fa-chart-simple mr-2"></i>Services</button>

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