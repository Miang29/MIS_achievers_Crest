@extends('layouts.admin')

@section('title', 'clientprofile')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('client-profile')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i></a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

<div class="row" id="form-area">
    <div class="col-12">
        <div class="card my-3 mx-auto">
            <h5 class="card-header text-center text-white bg-1">Edit Client Information</h5>
            <div class="card-body d-flex">
                <div class="form-group mx-auto w-50">
                    <label class="h6" for="petowner">Pet Owner<span class="text-danger">*</span></label>
                    <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}" />

                    <label class="h6" for="address">Address<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="address" value="{{old('address')}}" />

                    <label class="h6" for="email">Email<span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" value="{{old('email')}}" />

                    <label class="h6" for="telephone">Telephone No<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="telephone" value="{{old('telephone')}}" />

                    <label class="h6" for="mobile">Mobile No<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" />

                    <label class="h6 my-2" for="mobile">Type<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected name="type"></option>
                            <option value="1">Old</option>
                            <option value="2">New</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 my-3 d-flex flex-row">
                            <button class="btn btn-outline-info w-50 mr-1" ><a href="#"></a>Save</button>
                            <button class="btn btn-outline-danger w-50 mr-1" ><a href="#"></a>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection