@extends('layouts.admin')

@section('title', 'View Product Order')

@section('content')
<div class="container-fluid m-0">
    <h3 class="text-center text-lg-left mx-0 mx-lg-5 my-3">
        <a href="{{route('transaction.products-order')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Transaction List</a>
    </h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <h2 class="font-weight-bold text-1 text-center">View Product Order Transaction</h2>
    <div class="row" id="form-area">
        <div class="col-8 mx-auto my-5 ">

            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- PRODUCT NAME --}}
                    <button class="btn font-weight-bold" data-toggle="tooltip" data-placement="left" title="{{ $order['name'] }}"></button>
                    <span class="h2 m-auto text-truncate">{{ $order["name"] }}</span>
                </div>

                {{-- REFERENCE NO --}}
                <div class="mt-5 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Reference No"><i class="fa-solid fa-hashtag mr-2 fa-lg"></i>Reference No</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $order['reference'] }}</span>
                </div>

                {{-- MODE OF PAYMENT --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Mode of Payment"><i class="fa-solid fa-credit-card mr-2 fa-lg"></i>Mode of Payment</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $order['mode'] }}</span>
                </div>


                {{-- PRODUCT NO --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Product No"><i class="fa-solid fa-arrow-up-9-1 mr-2 fa-lg"></i>Product No</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $order['no'] }}</span>
                </div>


                {{-- CATEGORY TYPE --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Category Type"><i class="fa-solid fa-box mr-2 fa-lg"></i>Category Type</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $order['type'] }}</span>
                </div>


                {{-- PRICE --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Price"><i class="fa-solid fa-tag mr-2 fa-lg"></i>Price</button>
                    <span class="h5 m-auto text-wrap text-1">₱{{ $order['price'] }}.00</span>
                </div>

                {{-- QUANTITY --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Quantity"><i class="fa-solid fa-up-down mr-2 fa-lg"></i>Quantity</button>
                    <span class="h5 m-auto text-wrap text-1">{{ $order['qty'] }}</span>
                </div>

                {{-- TOTAL --}}
                <div class="mt-3 border-secondary border-bottom w-lg-50 mx-auto">
                    <button class="btn font-weight-bold mr-2" data-toggle="tooltip" data-placement="left" title="Total Price"><i class="fa-solid fa-dollar mr-2 fa-lg"></i>Total</button>
                    <span class="h5 m-auto text-wrap text-1">₱{{ $order['total'] }}.00</span>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection