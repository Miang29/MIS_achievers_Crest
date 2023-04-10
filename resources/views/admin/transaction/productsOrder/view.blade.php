@extends('layouts.admin')

@section('title', 'Product Order')

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
                 <div class="col-lg-6 col-md-4 col-6 mx-auto">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Reference No</span>
                      </div>
                      <input type="text" class="form-control bg-white" readonly value="{{ $order->reference_no}}" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-lg-6 col-md-4 col-6 mx-auto">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-light font-weight-bold" id="basic-addon1">Mode of Payment</span>
                      </div>
                      <input type="text" class="form-control bg-white" readonly value="{{ $order->mode_of_payment}}" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            
            <div class="card-body">
              <div class="row">
                @foreach($order->productsOrderItems as $poi)
                <div class="col-12 col-lg-6 d-flex">
                    <div class="row mx-1 border rounded p-3 shadow flex-fill position-relative">
                      <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-box-open fa-lg text-1"></i></span>
                                </div>
                                    <input type="text" class="form-control bg-white" readonly value="{{ $poi->product_name }}"  aria-describedby="basic-addon1">
                            </div>
                             
                             <div class="dropdown-divider"></div>

                             <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg text-1"></i></span>
                                </div>
                                    <input type="text" class="form-control bg-white" readonly value="₱{{ $poi->price }}.00"  aria-describedby="basic-addon1">
                            </div>

                             <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-plus-minus fa-lg text-1 mr-2"></i></span>
                                </div>
                                    <input type="text" class="form-control bg-white" readonly value="{{ $poi->quantity }}"  aria-describedby="basic-addon1">
                            </div>

                             <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-equals fa-lg text-1 mr-1"></i></span>
                                </div>
                                    <input type="text" class="form-control bg-white" readonly value="₱{{ $poi->total }}.00"  aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div> 
                 @endforeach 
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection
