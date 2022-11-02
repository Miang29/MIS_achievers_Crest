@extends('layouts.admin')

@section('title', 'useraccount')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{ route('user-account') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
    <div class="card mx-auto">
        <h5 class="card-header text-center text-white bg-1"> Edit User Account</h5>

        <div class="card-body">
            <div class="form-group ">
                <div class="row">
                    <div class="col-6 col-lg-6 ">

                        <label class="h7 text-1" for="firstname">First Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname[]" />

                        <label class="h7  text-1" for="middlename">Middle Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="middlename[]" />

                        <label class="h7  text-1" for="lastname">Last Name<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="lastname[]" />

                        <label class="h7  text-1 " for="suffix">Suffix<span class="text-danger">*</span></label>
                        <input class="form-control " type="text" name="suffix[]" />
                    </div>
                    <div class="col-6 col-lg-6">

                        <label class="form-label important" for="password">Password</label>
                        <div class="input-group floating-label-group">
                            <input class="form-control border-secondary  floating-label-input" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" placeholder=" "  />
                            <button type="button" class="btn floating-eye-pass border-dark " id="toggle-show-password" aria-label="Show Password" data-target="#password">
                                <i class="fas fa-eye d-none" id="show"></i>
                                <i class="fas fa-eye-slash" id="hide"></i>
                            </button>
                        </div>

                        <label class="form-label important" for="password">Confirm Password</label>
                        <div class="input-group floating-label-group">
                            <input class="form-control border-secondary  floating-label-input" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" placeholder=" "  />
                            <button type="button" class="btn floating-eye-pass border-dark " id="toggle-show-password" aria-label="Show Password" data-target="#password">
                                <i class="fas fa-eye d-none" id="show"></i>
                                <i class="fas fa-eye-slash" id="hide"></i>
                            </button>
                        </div>

                        <label class="h7  text-1" for="usertype">User Type<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <select class="custom-select  text-1" id="inputGroupSelect01">
                                <option selected name="usertype"></option>

                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12 d-flex ">
                <button class="btn btn-outline-info mx-auto btn-sm  w-25 "><a href="#"></a>Save</button>
                <button class="btn btn-outline-danger btn-sm  mr-auto  w-25 "><a href="#"></a>Cancel</button>
            </div>

        </div>
    </div>
</div>


@endsection