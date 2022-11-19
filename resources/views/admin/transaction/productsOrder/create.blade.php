@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')
<div class="container-fluid m-0">
    <h3 class="text-center text-lg-left mx-0 mx-lg-5 my-3">
        <a href="{{route ('transaction.products-order') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Order List</a>
    </h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto ">
                <h3 class="card-header font-weight-bold text-white gbg-2">Products Order</h3>

                <div class="card-body row">
                    <div class="form-group  col-4 ml-auto">
                        <label class="important font-weight-bold text-1" for="refno">Reference No</label>
                        <input class="form-control " type="text" name="refno" value="{{old('refno')}} " />
                    </div>

                    <div class="form-group  col-4 mr-auto">
                        <label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
                        <select id="select" class="form-control">
                            <option>Select mode of payment</option>
                            <option>Cash</option>
                            <option>Paymaya</option>
                            <option>Gcash</option>
                            <option>Credit Card</option>
                        </select>
                    </div>
                </div>

                <div class="row my-3 ml-3">
                    <div class="card mr-auto ml-3 border-bottom w-50">
                        <div class="form-group col-12 ">

                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <label class="important font-weight-bold text-1" for="itemname">Product Name</label>
                                    <div class="input-group mb-3">
                                        <select class="custom-select  text-1" id="inputGroupSelect01">
                                            <option selected name="itemname" value="{{old('itemname')}}"></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 mx-auto">
                                    <label class="important font-weight-bold text-1" for="itemno">Product No</label>
                                    <input class="form-control" type="text" name="itemno" value="{{old('itemno')}} " readonly />
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-6 mx-auto ">
                                    <label class="important font-weight-bold text-1" for="itemtype">Category Type</label>
                                    <input class="form-control" type="text" name="itemtype" value="{{old('itemtype')}} " readonly />
                                </div>

                                <div class="col-6 mx-auto w-25">
                                    <label class="important font-weight-bold text-1" for="price">Price</label>
                                    <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly />
                                </div>
                            </div>

                            <div class="row d-flex">
                                <div class="col-6 mx-auto w-25">
                                    <label class="important font-weight-bold text-1" for="qty">Quantity</label>
                                    <input class="form-control" type="number" name="qty" value="{{old('qty')}} " />
                                </div>

                                <div class="col-6 mx-auto w-25">
                                    <label class="important font-weight-bold text-1" for="total">Total Price</label>
                                    <input class="form-control" type="text" name="total" value="{{old('total')}} " />
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="card-footer d-flex">
                    <div class="col-12 my-2 mx-auto text-center flex-row">
                        <button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
                        <button class="btn btn-outline-danger btn-sm w-25"><a href="#"></a>Cancel</button>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>


@endsection