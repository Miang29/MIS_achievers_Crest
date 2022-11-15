@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('products-order')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto ">
                <h3 class="card-header text-center font-weight-bold text-white gbg-1">View Product Order</h3>

                <div class="card-body d-flex ">
                    <div class="form-group col-8 mx-auto">

                        <div class="row d-flex ">
                            <div class="col-6 mx-auto"><br>
                                <label class="h6 important font-weight-bold text-1" for="refno">Reference No</label>
                                <input class="form-control " type="text" name="refno" value="{{old('refno')}} " readonly/><br>
                            </div>

                            <div class="col-6 mx-auto"><br>
                                <label class="h6 important font-weight-bold text-1" for="itemname">Item Name</label>
                                <input class="form-control " type="text" name="itemname" value="{{old('itemname')}} " readonly/>
                            </div>
                        </div>

                        <div class="row d-flex ">

                            <div class="col-6 mx-auto">
                                <label class="h6 important font-weight-bold text-1" for="itemno">Item No</label>
                                <input class="form-control" type="text" name="itemno" value="{{old('itemno')}} " readonly />
                            </div>

                            <div class="col-6 mx-auto ">
                                <label class="h6 important font-weight-bold text-1" for="itemtype">Item Type</label>
                                <input class="form-control" type="text" name="itemtype" value="{{old('itemtype')}} " readonly />
                            </div>
                        </div>


                        <div class="row d-flex">
                            <div class="col-4 mx-auto w-25"><br>
                                <label class="h6 important font-weight-bold text-1" for="price">Price</label>
                                <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly />
                            </div>

                            <div class="col-4 mx-auto w-25"><br>
                                <label class="h6 important font-weight-bold text-1" for="qty">Quantity</label>
                                <input class="form-control" type="number" name="qty" value="{{old('qty')}} "readonly />
                            </div>

                            <div class="col-4 mx-auto w-25"><br>
                                <label class="h6 important font-weight-bold text-1" for="total">Total Price</label>
                                <input class="form-control" type="text" name="total" value="{{old('total')}} " readonly/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection