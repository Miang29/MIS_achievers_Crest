@extends('layouts.admin')

@section('title', 'Reservation')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('reservation')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i>Reservation</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <form class="row">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center">Client Registration</h5>
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

                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 my-2 mx-auto">
            <div class="card mx-auto">
                <h5 class="card-header text-center">Pet Registration</h5>
                <div class="card-body d-flex ">

                    <div class="row">
                        <div class="col-6 col-lg-6">
                            <div class="form-group text-center text-lg-left w-100" style="max-height: 20rem;">
                                <label class="h5 " for="image">Pet Image</label><br>
                                <img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" id="image" alt="Pet Image">
                                <br><br>
                                <input type="file" name="image" class="hidden" accept=".jpg,.jpeg,.png"><br>
                                <small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
                            </div>
                        </div>

                        <div class="col-6 col-lg-6">
                            <div class="form-group ">
                                <label class="h7" for="petname">Pet Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="petname" value="{{old('petname')}}" />

                                <label class="h7" for="petname">Breed<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="petname" value="{{old('petname')}}" />

                                <label class="h7" for="petname">Color/s<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="petname" value="{{old('petname')}}" />

                                <label class="h7" for="petname">Birthdate<span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="petname" value="{{old('petname')}}" />

                                <div class="input-group mb-3 my-2">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Species</option>
                                        <option value="1">Cat</option>
                                        <option value="2">Dog</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3 my-2">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Sex</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select>
                                </div>

                                <div class="input-group mb-3 my-2">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">Tame</option>
                                        <option value="2">Wild</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>

        </div>
        
        <div class="col-6 col-lg-6 ">
            <div class="card my-3 mx-auto flex-fill" style="border-style: dashed; border-width: .25rem;">
     
                  <i class="fa-solid fa-circle-plus "> Add Pet</i>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-outline-info w-25 "><a href="#"></a>Save</button>
            <button class="btn btn-outline-danger w-25"><a href="#"></a>Cancel</button>
        </div>

    </form>
</div>
@endsection