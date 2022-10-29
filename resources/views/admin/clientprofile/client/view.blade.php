@extends('layouts.admin')

@section('title', 'clientprofile')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('client-profile')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i></a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

<div class="row" id="form-area">
    <div class="col-12">
        <div class="card my-3 mx-auto">
            <h5 class="card-header text-center text-white bg-1">View Client Information</h5>
            <div class="card-body d-flex">
                <div class="form-group mx-auto w-50">
                    <label class="h6" for="petowner">Pet Owner<span class="text-danger"></span></label>
                    <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}"readonly />

                    <label class="h6" for="address">Address<span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="address" value="{{old('address')}}" readonly />

                    <label class="h6" for="email">Email<span class="text-danger"></span></label>
                    <input class="form-control" type="email" name="email" value="{{old('email')}}"  readonly/>

                    <label class="h6" for="telephone">Telephone No<span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="telephone" value="{{old('telephone')}} " readonly/>

                    <label class="h6" for="mobile">Mobile No<span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" readonly />

                    <label class="h6" for="mobile">Type<span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" readonly />
                </div>
            </div>
        </div>
    </div>

    @endsection