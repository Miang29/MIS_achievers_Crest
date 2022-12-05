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
                <h2 class="card-header text-white gbg-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Client Information</h2>
                <div class="card-body d-flex">
                    <div class="form-group mx-auto w-75">
                        <div class="col-12 ">

                            <div class="row ">
                                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                    <label class="h6 font-weight-bold text-1 important my-2" for="petowner">Pet Owner</label>
                                    <input class="form-control " type="text" name="petowner" value="{{$client ["name"] }}" />
                                </div>

                                <div class="col-lg-6 col-md-8 col-12">
                                    <label class="h6 font-weight-bold text-1  important my-2" for="address">Address</label>
                                    <textarea class="form-control not-resizable" name="address" rows="3" value="{{$client ["address"] }}"> </textarea>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                    <label class="h6 font-weight-bold text-1 my-2" for="telephone">Telephone No</label>
                                    <input class="form-control" type="text" name="telephone" value="{{$client ["telephone"] }}" />
                                </div>

                                <div class="col-lg-6 col-md-8 col-12">
                                    <label class="h6 font-weight-bold text-1  important my-2" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{$client ["email"] }}" />
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                    <label class="h6 font-weight-bold text-1  my-2" for="mobile">Mobile No</label>
                                    <input class="form-control" type="text" name="mobile" value="{{$client ["mobile"] }}" />
                                </div>

                                <div class="col-lg-6 col-md-8 col-12 ">
                                    <label class="h6 font-weight-bold text-1 important  my-2" for="type">Type</label>
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
                <div class="card-footer d-flex flex-row">
                    <div class="col-12 col-lg-4 col-md-12 mx-auto ">
                        <button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
                        <a href="#" class="btn btn-outline-danger btn-sm w-25 ">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection