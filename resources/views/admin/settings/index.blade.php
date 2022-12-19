@extends('layouts.admin')

@section('title', 'Settings')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="col-12 col-lg text-center text-lg-left">
        <h3 class="text-1">SETTINGS</h3>
    </div>

    <form method="POST" action="{{ route ('submit') }}" class="row" id="form-area" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card my-3 mx-auto">
                <h3 class="card-header font-weight-bold text-white gbg-1">Website Related</h3>

                <div class="card-body ">
                    <div class="form-group ">

                        <div class="row ">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card border-secondary w-100 ">
                                    <div class="col-12 col-lg-6 mx-auto "><br>
                                        <div class="form-group text-center text-lg-left image-input-group">
                                            <img src="{{ App\Settings::getFile('web-logo') }}" name="web-logo" class="img-fluid cursor-pointer border " style="border-width: 0.25rem!important; max-height: 10rem;" alt="Pet Image">
                                            <br><br>
                                            <input type="file" class="hidden" accept=".jpg,.jpeg,.png"><br>
                                            <small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 ">
                                <label class="h7  text-1 important font-weight-bold " for="webname">Website Name</label>
                                <input class="form-control " type="text" name="web-name" value="{{ App\Settings::getValue('web-name') }}">
                                <small class="text-danger small mx-auto">{{ $errors->first('web-name') }}</small><br>

                                <label class="h6 important text-1 font-weight-bold " for="webdescription">Website Description</label>
                                <textarea class="form-control not-resizable" name="web-desc" rows="6">{{ App\Settings::getValue('web-desc') }}</textarea>
                                <small class="text-danger small mx-auto">{{ $errors->first('web-desc') }}</small>
                            </div>
                        </div>

                        <br>

                        <div class="card-body d-flex mt-1  border-top border-secondary">
                            <div class="form-group mx-auto col-12 col-lg-6 col-md-6">
                                <h4 class="text-1 font-weight-bold text-center">Reaching Out</h4>
                                <br>
                                <label class="h6 important" for="address">Veterinary Clinic Address</label>
                                <textarea class="form-control not-resizable" name="address" rows="2">{{ App\Settings::getValue('address') }}</textarea>
                                <small class="text-danger small mx-auto">{{ $errors->first('address') }}</small>
                                <br>
                                <label class="h6 important" for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{ App\Settings::getValue('email') }}"/>
                                <small class="text-danger small mx-auto">{{ $errors->first('email') }}</small>
                                <br>
                                <label class="h6 important" for="number">Mobile Number</label>
                                <input class="form-control" type="text" name="number" value="{{ App\Settings::getValue('mobile-no') }}" />
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer d-flex">
                    <div class="col-12 col-lg-6 col-md-6 mx-auto  text-center ">
                        <button type="submit" data-type="submit" class="btn btn-outline-info my-2 btn-sm w-25">Save</button>
                        <a href="#" class="btn btn-outline-danger my-2 btn-sm  w-25">Cancel</a>
                    </div>

                </div>

            </div>


        </div>

    </form>
</div>





@endsection