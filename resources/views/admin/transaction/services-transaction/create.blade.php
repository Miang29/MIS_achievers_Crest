@extends('layouts.admin')

@section('title', 'transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('services')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1">Create Transaction </h5>


                <div class="card-body d-flex mt-1 border-bottom border-secondary">
                    <div class="form-group  col-6 mx-auto">

                        <label class="h6 important" for="refno">Reference No</label>
                        <input class="form-control" type="text" name="refno" value="{{old('refno')}} " />

                    </div>
                </div>

                <div class="card-body d-flex border-bottom border-secondary">
                    <div class="form-group col-6 mx-auto w-50">

                        <label class="h6 important" for="itemname">Services Type</label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="itemname" value="{{old('itemname')}}"></option>
                            </select>
                        </div>

                        <label class="h6 important" for="price">Price</label>
                        <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly />

                        <label class="h6 important" for="total">Total Price</label>
                        <input class="form-control" type="text" name="total" value="{{old('total')}} " />
                    </div>
                </div>

                <div class="card-body d-flex">
                    <div class="form-group  col-6 mx-auto w-50">
                        <button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" onclick="addForm(this, '#form-area');">
                            <span class="m-auto text-1"><i class="fa-solid fa-circle-plus mr-2">Add Service Field</i></span>
                        </button>
                    </div>
                </div>

                <div class="col-12 my-2 d-flex flex-row">
                    <button class="btn btn-outline-info ml-auto mr-4 w-25"><a href="#"></a>Save</button>
                    <button class="btn btn-outline-danger ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection