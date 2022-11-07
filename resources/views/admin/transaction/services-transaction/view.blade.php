@extends('layouts.admin')

@section('title', 'transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1"></h5>


                <div class="card-body d-flex mt-1 border-bottom border-secondary">
                    <div class="form-group  col-6 mx-auto">

                        <label class="h6 important" for="refno">Reference No</label>
                        <input class="form-control" type="text" name="refno" value="{{old('refno')}} "readonly />

                    </div>
                </div>

                <div class="card-body d-flex border-bottom border-secondary">
                    <div class="form-group col-6 mx-auto w-50">

                        <label class="h6 important" for="servicetype">Services Type</label>
                        <input class="form-control" type="text" name="servicetype" value="{{old('servicetype')}} " readonly />
                       

                        <label class="h6 important" for="price">Price</label>
                        <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly />

                        <label class="h6 important" for="total">Total Price</label>
                        <input class="form-control" type="text" name="total" value="{{old('total')}} " readonly />
                    </div>
                </div>

                <div class="col-12 my-2 d-flex flex-row">
                    <button class="btn btn-outline-info btn-sm ml-auto mr-4 w-25"><a href="#"></a>Save</button>
                    <button class="btn btn-outline-danger btn-sm ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection