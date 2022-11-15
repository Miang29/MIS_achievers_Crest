@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{ route('client-profile') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
    <div class="card mx-auto">
        <h5 class="card-header text-center text-white bg-1"> Edit Pet Information</h5>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div class="form-group text-center text-lg-left mx-auto image-input-group" >
                        <label class="h2  text-1  ml-5" for="image">Pet Image</label><br>
                        <img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
                        <br><br>
                        <input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
                        <small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="form-group ">
                        <label class="h7 text-1" for="petname">Pet Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="petname[]" />

                        <label class="h7  text-1" for="breed">Breed<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="breed[]" />

                        <label class="h7  text-1" for="color">Color/s<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="color[]" />

                        <label class="h7  text-1 my-2" for="bday">Birthdate<span class="text-danger">*</span></label>
                        <input class="form-control " type="date" name="bday[]" />

                        <label class="h7  text-1 my-2" for="species">Species<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">  
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected  name="species"></option>
                                <option value="1">Cat</option>
                                <option value="2">Dog</option>
                            </select>
                        </div>

                        <label class="h7  text-1 " for="species">Gender<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="gender[]"></option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select>
                        </div>

                        <label class="h7  text-1" for="species">Type<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="types"></option>
                                <option value="1">Tame</option>
                                <option value="2">Wild</option>
                            </select>
                        </div>
                        <div class="col-12 my-3 d-flex flex-row">
                            <button class="btn btn-outline-info ml-auto mr-1 w-50"><a href="#"></a>Save</button>
                            <button class="btn btn-outline-danger ml-auto mr-1 w-50"><a href="#"></a>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection