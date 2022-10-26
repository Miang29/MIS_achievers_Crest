@extends('layouts.admin')

@section('title', 'Reservation')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('reservation')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i>Reservation</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

<div class="row" id="form-area">
    <div class="col-12">
        <div class="card my-3 mx-auto">
            <h5 class="card-header text-center">Edit Client Information</h5>
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

                    <div class="input-group mb-3 my-2">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Old</option>
                            <option value="2">New</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 my-3 d-flex flex-row">
                            <button class="btn btn-outline-info w-25" ><a href="#"></a>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection