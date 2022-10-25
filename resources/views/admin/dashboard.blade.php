@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 my-3">
        <div class="total-block bg-info text-white dark-shadow invisiborder rounded">
            <i class="fa-solid fa-paw fa-5x"></i>
            <div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
                <h6 class="my-auto">Patients</h6>
                <h6 class="my-auto"></h6>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3  my-3">
        <div class="total-block bg-2 text-white dark-shadow invisiborder rounded">
        <i class="fa-solid fa-syringe fa-5x"></i>
            <div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
                <h6 class="my-auto">Vaccinated</h6>
                <h6 class="my-auto"></h6>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3  my-3">
        <div class="total-block bg-3 text-white dark-shadow invisiborder rounded">
        <i class="fa-solid fa-arrow-trend-up fa-5x"></i>
            <div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
                <h6 class="my-auto">Stocks</h6>
                <h6 class="my-auto"></h6>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3  my-3">
        <div class="total-block bg-4 text-white dark-shadow invisiborder rounded">
        <i class="fas fa-users fa-5x"></i>
            <div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
                <h6 class="my-auto">Clients</h6>
                <h6 class="my-auto"></h6>
            </div>
        </div>
    </div>
</div>
@endsection