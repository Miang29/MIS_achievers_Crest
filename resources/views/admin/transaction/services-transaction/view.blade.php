@extends('layouts.admin')

@section('title', 'View Service Transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <h2 class="font-weight-bold text-1 text-center">View Services Transaction</h2>

    <div class="row" id="form-area">
        <div class="col-8 mx-auto my-5 ">

            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- PET NAME  --}}
                    <button class="btn" data-toggle="tooltip" data-placement="left" title="{{ $services ['petname']}}"></button>
                    <span class="h2 m-auto text-truncate">{{ $services ["petname"]}}</span>
                </div>

                    {{-- REFERENCE NO --}}
                    <div class="mt-5 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Reference No"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['reference'] }}</span>
                    </div>

                    {{-- MODE OF PAYMENT --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Mode of payment"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['mode'] }}</span>
                    </div>

                    {{-- SERVICE TYPE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Service Type"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['type'] }}</span>
                    </div>

                    {{-- COST --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Cost"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['price'] }}</span>
                    </div>

                    {{-- ADDITIONAL COST --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Additional Cost"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['additional'] }}</span>
                    </div>

                    {{-- DATE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Date"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['date'] }}</span>
                    </div>


                    {{-- TIME --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Time"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['time'] }}</span>
                    </div>

                    {{-- WEIGHT --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Weight"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['weight'] }}</span>
                    </div>

                    
                    {{-- TEMPARATURE --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Temparature"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['temparature'] }}</span>
                    </div>

                    
                    {{-- CLINICAL HISTORY --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Clinical History"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['history'] }}</span>
                    </div>

                    
                    {{-- TREATMENT --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="treatment"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['treatment'] }}</span>
                    </div>

                    
                    {{-- TOTAL COST --}}
                    <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                        <button class="btn mr-2" data-toggle="tooltip" data-placement="left" title="Total Cost"></button>
                        <span class="h5 m-auto text-wrap text-1">{{ $services['total'] }}</span>
                    </div>













                

            </div>


        </div>
    </div>


</div>
@endsection