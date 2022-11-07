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
                <div class="form-group mx-auto w-75">
                    <div class="col-12  ">

                        <div class="row ">
                            <div class="col-4"><br>
                                <label class="h6 font-weight-bold text-1 important" for="petowner">Pet Owner</label>
                                <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}" readonly/>
                            </div>

                            <div class="col-8">
                                <label class="h6 font-weight-bold text-1  important" for="address">Address</label>
                                <textarea class="form-control not-resizable" name="address" rows="3" readonly> </textarea><br>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-4 ">
                                <label class="h6 font-weight-bold text-1" for="telephone">Telephone No</label>
                                <input class="form-control" type="text" name="telephone" value="{{old('telephone')}}" readonly/>
                            </div>

                            <div class="col-8">
                                <label class="h6 font-weight-bold text-1  important" for="email">Email</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}" readonly/><br>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-4 ">
                                <label class="h6 font-weight-bold text-1" for="mobile">Mobile No</label>
                                <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" readonly/>
                            </div>

                            <div class="col-8 ">
                                <label class="h6 font-weight-bold text-1  important" for="type">Type</label>
                                <input class="form-control" type="text" name="type" value="{{old('type')}}" readonly/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection