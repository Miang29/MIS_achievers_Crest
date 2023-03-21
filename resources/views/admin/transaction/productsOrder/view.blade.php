@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row border-bottom border-secondary">
        <div class="col-12 col-lg-6 text-center text-lg-left ">
            <h3 class="mt-3"><a href="{{route ('transaction.products-order') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Order List</a></h3>
        </div>

        <div class=" col-12 col-md-6 col-lg-6 my-2 text-center text-lg-right">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mx-auto mt-4">
        <h5 class="card-header gbg-1"></h5>
        
        <div class="card-body">
            <div class ="row">
                <div class="col-lg-6 col-md-4 col-6 mr-auto mb-5">
                    <label class="font-weight-bold text-1" for="reference_no">Reference No</label>
                    <input class="form-control bg-white" readonly name="reference_no" value="{{ $order->reference_no}}" />
                </div>

                <div class="col-lg-6 col-md-4 col-6 mr-auto mb-5">
                    <label class="font-weight-bold text-1" for="reference_no">Mode of Payment</label>
                    <input class="form-control bg-white" readonly name="mode_of_payment" value="{{ $order->mode_of_payment}}" />
                </div>
            </div>
            
            <div class="row">
                @foreach($order->productsOrderItems as $poi)
                <div class="col-12 col-lg-6 d-flex">
                    <div class="row my-3 mx-1 border rounded p-3 shadow flex-fill position-relative">
                        <div class="col-12 col-lg-12 d-flex flex-column text-center text-lg-left">
                           <div class="position-absolute border-secondary bg-1 text-white text-center mx-auto d-flex w-75 w-lg-100 text-wrap" style="top: -1.8rem; left:0rem; min-height:3rem; max-height: 4rem; border-radius:0.5rem;">
                                {{-- PRODUCT NAME --}}
                                <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="{{ $poi->product_name }}"></button>
                                <span class="h3 m-auto text-truncate">{{ $poi->product_name }}</span>
                            </div>
                        </div>

                        {{-- PRICE --}}
                        <div class="mt-5 border-secondary border-bottom w-lg-100 w-md-100 w-100 mx-auto">
                            <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Price"><i class="fa-solid fa-tag mr-2 fa-lg"></i>Price</button>
                            <span class="h5 m-auto text-wrap text-1">₱{{ $poi->price }}.00</span>
                        </div>

                        {{-- QUANTITY --}}
                        <div class="mt-3 border-secondary border-bottom w-lg-100 w-md-100 w-100 mx-auto">
                            <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Quantity"><i class="fa-solid fa-up-down mr-2 fa-lg"></i>Quantity</button>
                            <span class="h5 m-auto text-wrap text-1">{{ $poi->quantity }}</span>
                        </div>

                        {{-- TOTAL --}}
                        <div class="mt-3 border-secondary border-bottom w-lg-100 w-md-100 w-100 mx-auto">
                            <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Total Price"><i class="fa-solid fa-dollar mr-2 fa-lg"></i>Total</button>
                            <span class="h5 m-auto text-wrap text-1">₱{{ $poi->total }}.00</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection
