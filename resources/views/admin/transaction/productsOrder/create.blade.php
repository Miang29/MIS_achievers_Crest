@extends('layouts.admin')

@section('title', 'transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('products-order')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto ">
                <h3 class="card-header font-weight-bold text-white gbg-1">Products Order</h3>

                <div class="card-body d-flex">
                    <div class="form-group  col-4 ml-auto">
                        <label class="h6 important font-weight-bold text-1" for="refno">Reference No</label>
                        <input class="form-control " type="text" name="refno" value="{{old('refno')}} " />
                    </div>
                </div>

                <div class="card-body d-flex border-bottom border-secondary">
                    <div class="form-group col-8 mx-auto ">

                        <div class="row d-flex ">
                            <div class="col-6 mx-auto">
                                <label class="h6 important font-weight-bold text-1" for="itemname">Item Name</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select  text-1" id="inputGroupSelect01">
                                        <option selected name="itemname" value="{{old('itemname')}}"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mx-auto">
                                <label class="h6 important font-weight-bold text-1" for="itemno">Item No</label>
                                <input class="form-control" type="text" name="itemno" value="{{old('itemno')}} " readonly />
                            </div>

                        </div>


                        <div class="row d-flex">
                            
                            <div class="col-6 mx-auto ">
                                <label class="h6 important font-weight-bold text-1" for="itemtype">Item Type</label>
                                <input class="form-control" type="text" name="itemtype" value="{{old('itemtype')}} " readonly />
                            </div>

                            <div class="col-6 mx-auto w-25">
                                <label class="h6 important font-weight-bold text-1" for="price">Price</label>
                                <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly />
                            </div>
                        </div>

                        <div class="row d-flex">
                            <div class="col-6 mx-auto w-25">
                                <label class="h6 important font-weight-bold text-1" for="qty">Quantity</label>
                                <input class="form-control" type="number" name="qty" value="{{old('qty')}} " />
                            </div>

                            <div class="col-6 mx-auto w-25">
                                <label class="h6 important font-weight-bold text-1" for="total">Total Price</label>
                                <input class="form-control" type="text" name="total" value="{{old('total')}} " />
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body d-flex">
                    <div class="form-group  col-6 mx-auto w-50">
                        <button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" onclick="addForm(this, '#form-area');">
                            <span class="m-auto font-weight-bold text-1 "><i class="fa-solid fa-circle-plus mr-2"></i>Add Item Field</span>
                        </button>
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