@extends('layouts.admin')

@section('title', 'Settings')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="col-12 col-lg text-center text-lg-left">
        <h2 class="font-weight-bold text-1">Settings</h2>
    </div>

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h3 class="card-header font-weight-bold text-white gbg-1">Website Related</h3>

                <div class="card-body ">
                    <div class="form-group ">

                        <div class="row ">
                            <div class="col-6 col-lg-6">
                                <div class="card border-secondary w-100 ">
                                    <div class="col-12 col-lg-6 mx-auto "><br>
                                        <div class="form-group text-center text-lg-left image-input-group">
                                            <img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border " style="border-width: 0.25rem!important; max-height: 10rem;" alt="Pet Image">
                                            <br><br>
                                            <input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
                                            <small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-6 ">
                                <label class="h7  text-1 important font-weight-bold " for="webname">Website Name</label>
                                <input class="form-control " type="text" name="webname[]" /><br>

                                <label class="h6 important text-1 font-weight-bold " for="webdescription">Website Description</label>
                                <textarea class="form-control not-resizable" name="webdescription" rows="6"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="card-body d-flex mt-1  border-top border-secondary">
                            <div class="form-group mx-auto col-6">
                                <h4 class="text-1 font-weight-bold text-center">Reaching Out</h4>
                                <br>
                                <label class="h6 important" for="address">Veterinary Clinic Address</label>
                                <textarea class="form-control not-resizable" name="address" rows="2"></textarea>
                                <br>
                                <label class="h6 important" for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}} " />
                                <br>
                                <label class="h6 important" for="number">Mobile Number</label>
                                <input class="form-control" type="text" name="number" value="{{old('number')}} " />
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer d-flex">
                       <div class="col-6 mx-auto  text-center ">
                            <button class="btn btn-outline-info my-2 btn-sm w-25"><a href="#"></a>Save</button>
                            <button class="btn btn-outline-danger my-2 btn-sm  w-25"><a href="#"></a>Cancel</button>
                        </div>

                </div>

            </div>


        </div>

    </div>
</div>





@endsection