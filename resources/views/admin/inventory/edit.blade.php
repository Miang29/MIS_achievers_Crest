@extends('layouts.admin')

@section('title', 'inventory')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('category')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Category List</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">

            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white gbg-1"> Edit Category</h5>

                <div class="card-body d-flex">
                    <div class="col-6 mx-auto">
                        <div class="d-flex mt-1 ">
                            <div class="form-group mx-auto w-100">

                                <label class="h6 important" for="productname">Product Name</label>
                                <input class="form-control" type="text" name="productname" value="{{old('productname')}} " />

                                <div class="row">
                                    <div class="col-4">
                                        <label class="h6 important" for="stocks">Stocks</label>
                                        <input class="form-control " type="number" name="stocks" value="{{old('stocks')}} " />
                                    </div>

                                    <div class="col-4">
                                        <label class="h6 important">Price</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₱</span>
                                            </div>
                                            <input type="number" class="form-control" value min="0.00" step=".01" />
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label class="h6 important " for="status">Status</label><br>
                                        <select class="custom-select " name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select><br>
                                    </div>
                                </div>
                                <label class="h6 important" for="categoryname">Category Name</label>
                                <input class="form-control" type="text" name="categoryname" value="{{old('categoryname')}} "  /><br>

                                <label class="h6 important" for="description">Description</label>
                                <textarea class="form-control not-resizable" name="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex">
                    <div class="col-4 mx-auto text-center">
                        <button class="btn btn-outline-info  btn-sm w-50"><a href="#"></a>Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection