@extends('layouts.admin')

@section('title', 'Client Profile')

@section('content')
<div class="container-fluid m-0 ">
    <h3 class="text-center text-lg-left mx-0 mx-lg-5 my-3">
        <a href="{{route('client-profile')}}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Profile List</a>
    </h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h2 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Client Information</h2>
                <div class="card-body d-flex">
                    <div class="form-group mx-auto w-75">
                        <div class="col-12  ">

                            <div class="row ">
                                <div class="col-4"><br>
                                    <label class="h6 font-weight-bold text-1 important" for="petowner">Pet Owner</label>
                                    <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}" />
                                </div>

                                <div class="col-8">
                                    <label class="h6 font-weight-bold text-1  important" for="address">Address</label>
                                    <textarea class="form-control not-resizable" name="address" rows="3"></textarea><br>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-4 ">
                                    <label class="h6 font-weight-bold text-1" for="telephone">Telephone No</label>
                                    <input class="form-control" type="text" name="telephone" value="{{old('telephone')}}" />
                                </div>

                                <div class="col-8">
                                    <label class="h6 font-weight-bold text-1  important" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{old('email')}}" /><br>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-4 ">
                                    <label class="h6 font-weight-bold text-1" for="mobile">Mobile No</label>
                                    <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" />
                                </div>

                                <div class="col-8 ">
                                    <label class="h6 font-weight-bold text-1  important" for="type">Type</label>
                                    <div class="input-group ">
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <option selected name="type"></option>
                                            <option value="1">Old</option>
                                            <option value="2">New</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="col-4 mx-auto ">
                        <button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
                        <a href="#" class="btn btn-outline-danger btn-sm w-25 ">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection