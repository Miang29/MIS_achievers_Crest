@extends('layouts.admin')

@section('title', 'Pet Profile')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <h3 class="mt-3"><a href="{{route('pet-information.pet.show',[$clientId] )}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="col-12 my-2 mx-auto">
        <form class="card mx-auto" method="POST" action="{{ route('update-pet', [$clientId, $pet->id]) }}" id="form-area" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h5 class="card-header text-center text-white bg-1"> Edit Pet Information</h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto">
                        {{-- IMAGE INPUT --}}
                        <div class="image-input-scope" id="pet-image-scope_0" data-settings="#image-input-settings_0" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
                            {{-- FILE IMAGE --}}
                            <div class="form-group text-center image-input collapse show avatar_holder" id="pet-image-image-input-wrapper_0">
                                <div class="row border rounded border-secondary-light py-2 mx-1">
                                    <div class="col-12 col-md-6 text-md-right">
                                        <div class="hover-cam mx-auto avatar rounded overflow-hidden">
                                            <img src="{{ $pet->getImage() }}" class="hover-zoom img-fluid avatar getImage" id="pet-image-container_0" alt="Pet Image" data-default-src="{{ asset('uploads/settings/default.png') }}">
                                            <span class="icon text-center image-input-float" id="pet-image_0" tabindex="0" data-target="#pet-image-container_0">
                                                <i class="fas fa-camera text-white hover-icon-2x"></i>
                                            </span>
                                        </div>
                                        <input type="file" name="pet_image" class="d-none getImage" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#pet-image-container_0" data-target-name-container="#pet-image-name_0">
                                    </div>

                                    <div class="col-12 col-md-6 text-md-left">
                                        <label class="form-label font-weight-bold" for="pet_image">Pet Image</label><br>
                                        <small class="text-muted pb-0 mb-0">
                                            <b>FORMATS ALLOWED:</b>
                                            <br>JPEG, JPG, PNG, WEBP
                                        </small><br>
                                        <small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
                                        <button class="btn btn-secondary reset-image" type="button" data-reset-id="0">Remove Image</button><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mx-auto">
                        <div class="form-group ">
                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1 important" for="pet_name">Pet Name</label>
                                <input class="form-control" type="text" name="pet_name" value="{{ $pet->pet_name }}" />
                                <small class="text-danger small">{{ $errors->first('pet_name') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1  important" for="breed">Breed</label>
                                <input class="form-control" type="text" name="breed" value="{{ $pet->breed }}" />
                                <small class="text-danger small">{{ $errors->first('breed') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1 important" for="colors">Colors</label>
                                <select value="{{ $pet->colors }}" name="colors[]" id="choices-multiple-remove-button" placeholder="Select Pet color" multiple>
                                    <option value="#FFFFFF">White</option>
                                    <option value="#000000)">Black</option>
                                    <option value="#C1C1C1">Ash Gray</option>
                                    <option value="#FFFDD0">Cream</option>
                                    <option value="#D2691E">Cinnamon</option>
                                    <option value="#E5AA70">Fawn</option>
                                    <option value="#964B00">Brown</option>
                                </select>
                                <small class="text-danger small">{{ $errors->first('colors') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1  important" for="birthdate">Birthdate</label>
                                <input class="form-control" type="date" name="birthdate" value="{{ $pet->birthdate }}" />
                                <small class="text-danger small">{{ $errors->first('birthdate') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1  important" for="species">Species</label>
                                <div class="input-group mb-3 ">
                                    <select class="custom-select" id="inputGroupSelect01" name="species" value="{{ $pet->species }}">
                                        <option selected value="">Choose species..</option>
                                        <option value="cat">Cat</option>
                                        <option value="dog">Dog</option>
                                    </select>
                                </div>
                                <small class="text-danger small">{{ $errors->first('species') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h7 font-weight-bold text-1  important" for="gender">Gender</label>
                                <div class="input-group mb-3 ">
                                    <select class="custom-select" id="inputGroupSelect01" name="gender" value="{{ $pet->gender }}">
                                        <option selected value="">Choose gender..</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                </div>
                                <small class="text-danger small">{{ $errors->first('gender') }}</small>
                            </div>

                            <div class="col-12 col-md-9 col-lg-12 mx-auto">
                                <label class="h6 font-weight-bold text-1 important" for="types">Types</label>
                                <div class="input-group mb-3 ">
                                    <select class="custom-select" id="inputGroupSelect01" name="types" value="{{ $pet->types }}">
                                        <option selected value="">Choose types..</option>
                                        <option value="tame">Tame</option>
                                        <option value="wild">Wild</option>
                                    </select>
                                </div>
                                <small class="text-danger small">{{ $errors->first('types') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">
                <div class="col-lg-4 col-md-4 col-8 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-info  btn-md  w-25  mb-3" data-type="submit">Save</button>
                    <a href="{{ route('pet-information') }}" class="btn btn-outline-danger btn-md w-25 mb-3">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/select.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/image-input.js') }}"></script>
<script type="text/javascript">
    $(document).ready(() => {
        $(document).on('click', ".reset-image", (e) => {
            $(e.currentTarget).closest(".image-input").find(`#pet-image-container_${$(e.currentTarget).attr('data-reset-id')}`).attr('src', `{{ asset('uploads/settings/default.png') }}`);
        });
        instantiateSelect();
    });
</script>
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/admin.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
@endsection