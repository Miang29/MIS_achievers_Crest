@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="container-fluid m-0">
    <h2 class="my-4 "><a href="{{route('category.view', [$id])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product List</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">

            <form class="card my-3 mx-auto" method="POST" Action="{{ route('save-product', [$id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-3"></i>Add New Product</h3>

                <div class="card-body d-flex">
                    <div class="col-12 col-md-12 col-lg-6 mx-auto">
                        <div class="form-group col-lg-12 col-12 col-md-6">
                            <label class="important" for="productname">Product Name</label>
                            <input class="form-control" type="text" name="product_name" value="" />
                            <small class="text-danger small">{{ $errors->first('product_name') }}</small>
                        </div>
                        <div class="row col-lg-12 col-12 col-md-6 mx-auto">
                            <div class="form-group">
                                <label class="h6 important" for="stocks">Stocks</label>
                                <input class="form-control " type="number" name="stocks" value="{{old('stocks')}} " />
                                <small class="text-danger small">{{ $errors->first('stocks') }}</small>
                            </div>

                            <div class="form-group ml-2">
                                <label class="h6 important">Price</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₱</span>
                                    </div>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') ? old('price') : 0 }}" min="0" step="1" />
                                </div>
                                <small class="text-danger small">{{ $errors->first('price') }}</small>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-12 col-md-6">
                            <label class="h6 important " for="status">Status</label><br>
                            <select class="custom-select " name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <small class="text-danger small">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="form-group col-lg-12 col-12 col-md-6">
                            <label class="h6 important" for="description">Description</label>
                            <textarea class="form-control not-resizable" name="description" rows="3"></textarea>
                            <small class="text-danger small">{{ $errors->first('description') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="col-4 mx-auto text-center">
                        <button class="btn btn-outline-info mr-1 btn-sm w-50" type="submit" data-type="submit">Save</button>
                        <a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.index') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-50 mr-auto w-50">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
@endsection