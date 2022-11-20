@extends('layouts.admin')

@section('title', 'View Service Transaction')

@section('content')
<div class="container-fluid m-0">
    <h3 class="text-center text-lg-left mx-0 mx-lg-5 my-4 ">
        <a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a>
    </h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <h2 class="font-weight-bold text-1 text-center">View Services Transaction</h2>

    <div class="row" id="form-area">
        <div class="col-8 mx-auto my-5 ">

            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- PET NAME  --}}
                    <button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $services['petname']}}"></button>
                    <span class="h2 m-auto text-truncate">{{ $services["petname"]}}</span>
                </div>

                {{-- REFERENCE NO --}}
                <div class="mt-5 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Reference No"><i class="fa-solid fa-hashtag mr-2 fa-lg"></i>Reference No</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['reference'] }}</span>
                </div>

                {{-- MODE OF PAYMENT --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Mode of payment"><i class="fa-solid fa-credit-card mr-2 fa-lg"></i>Mode of Payment</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['mode'] }}</span>
                </div>

                {{-- SERVICE TYPE --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Service Type"><i class="fa-solid fa-hand-holding-medical mr-2 fa-lg"></i>Service Type</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['type'] }}</span>
                </div>

                {{-- COST --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Cost"><i class="fa-solid fa-tag mr-2 fa-lg"></i>Cost</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['price'] }}</span>
                </div>

                {{-- ADDITIONAL COST --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Additional Cost"><i class="fa-solid fa-tag  mr-2 fa-lg"></i>Additional Cost</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['additional'] }}</span>
                </div>

                {{-- DATE --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Date"><i class="fa-solid fa-calendar-days  mr-2 fa-lg"></i>Date</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['date'] }}</span>
                </div>


                {{-- TIME --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Time"><i class="fa-solid fa-clock mr-2 fa-lg"></i>Time</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['time'] }}</span>
                </div>

                {{-- WEIGHT --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Weight"><i class="fa-solid fa-weight-scale mr-2 fa-lg"></i>Weight</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['weight'] }}</span>
                </div>


                {{-- TEMPARATURE --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Temperature"><i class="fa-solid fa-temperature-three-quarters"></i><i class="fa-solid fa-temperature-three-quarters mr-2 fa-lg"></i>Temperature</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['temperature'] }}</span>
                </div>


                {{-- CLINICAL HISTORY --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Clinical History"><i class="fa-solid fa-clock-rotate-left mr-2 fa-lg"></i>Clinical History</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['history'] }}</span>
                </div>


                {{-- TREATMENT --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="treatment"><i class="fa-solid fa-prescription-bottle-medical mr-2 fa-lg"></i>Treatment</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['treatment'] }}</span>
                </div>


                {{-- TOTAL COST --}}
                <div class="mt-3 border-secondary border-bottom w-lg-75 mx-auto">
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="Total Cost"><i class="fa-solid fa-dollar mr-2 fa-lg"></i>Total Cost</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $services['total'] }}</span>
                </div>















            </div>


        </div>
    </div>


</div>
@endsection