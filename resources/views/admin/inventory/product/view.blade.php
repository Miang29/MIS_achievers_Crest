@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('category.view')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">

            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white gbg-1"> View Product</h5>

                <div class="card-body d-flex">
                    <div class="col-6 mx-auto">
                        <div class="d-flex mt-1 ">
                            <div class="form-group mx-auto w-100">

                                <label class="h6 important font-weight-bold text-1" for="productname">Product Name</label>
                                <input class="form-control" type="text" name="productname" value="{{old('productname')}} " readonly />

                                <div class="row">
                                    <div class="col-4">
                                        <label class="h6 important  font-weight-bold text-1" for="stocks">Stocks</label>
                                        <input class="form-control " type="number" name="stocks" value="{{old('stocks')}} " readonly />
                                    </div>

                                    <div class="col-4">
                                        <label class="h6 important  font-weight-bold text-1">Price</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₱</span>
                                            </div>
                                            <input type="number" class="form-control" value min="0.00" step=".01" readonly />
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label class="h6 important  font-weight-bold text-1" for="status">Status</label><br>
                                        <input class="form-control" type="text" name="status" value="{{old('status')}} " readonly /><br>


                                    </div>
                                </div>
                                <label class="h6 important  font-weight-bold text-1" for="categoryname">Category Name</label>
                                <input class="form-control" type="text" name="categoryname" value="{{old('categoryname')}} " readonly /><br>

                                <label class="h6 important  font-weight-bold text-1" for="description">Description</label>
                                <textarea class="form-control not-resizable" name="description" rows="3" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection