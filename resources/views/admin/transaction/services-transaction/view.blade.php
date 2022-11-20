@extends('layouts.admin')

@section('title', 'View Service Transaction')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <h2 class="font-weight-bold text-1 text-center">View Services Transaction</h2>

    <div class="row" id="form-area">
        <div class="col-8 mx-auto my-5 ">

            <div class="card card-body position-relative shadow p-3 mb-5 border-primary w-lg-100 w-xs-100 w-md-100">
                <div class="position-absolute border-secondary bg-1 text-white text-center d-flex w-75 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                    {{-- PET OWNER  --}}
                    <button class="btn" data-toggle="tooltip" data-placement="left" title=""></button>
                    <span class="h2 m-auto text-truncate"></span>
                </div>

                <label class="h6 important font-weight-bold text-1" for="refno">Reference No</label>
                <input class="form-control" type="text" name="refno" value="{{old('refno')}} " readonly /><br>

                <label class="h6 important  font-weight-bold text-1" for="type">Services Type</label>
                <input class="form-control" type="text" name="type" value="{{old('type')}} " readonly /><br>

                <div class="row d-flex">
                    <div class="col-6  mx-auto ">
                        <label class="h6 important  font-weight-bold text-1" for="price">Price</label>
                        <input class="form-control" type="text" name="price" value="{{old('price')}} " readonly /><br>
                    </div>
                    <div class="col-6  mx-auto ">
                        <label class="h6 important  font-weight-bold text-1" for="total">Total Price</label>
                        <input class="form-control" type="text" name="total" value="{{old('total')}} " readonly /><br>
                    </div>

                </div>

            </div>


        </div>
    </div>


</div>
@endsection