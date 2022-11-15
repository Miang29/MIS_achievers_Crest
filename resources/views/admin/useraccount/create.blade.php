@extends('layouts.admin')

@section('title', 'User Account')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{ route('user-account') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
    <div class="card mx-auto border border-white">
        <h3 class="card-header  gbg-1 font-weight-bold text-white">CREATE ACCOUNT</h3>

        <div class="card-body d-flex">
            <div class="form-group mx-auto w-75">

                <div class="col-12  ">
                    <div class="row d-flex">
                        <div class=" col col-4 col-md-9 col-lg-6 mx-auto">
                            <span class="h7 important  font-weight-bold text-1">First Name </span>
                            <input class="form-control my-2 " type="text" name="firstname[]" />

                            <span class="h7 important  font-weight-bold text-1 ">Middle Name </span>
                            <input class="form-control my-2" type="text" name="middlename[]" />
                        </div>

                        <div class="col-6">
                            <span class="h7 important font-weight-bold text-1">Last Name </span>
                            <input class="form-control my-2" type="text" name="lastname[]" />

                            <span class="h7 important  font-weight-bold text-1">Suffix</span>
                            <input class="form-control my-2" type="text" name="suffix[]" />
                        </div>
                    </div>

                    <div class="row d-flex">
                        <div class="col col-12 col-md-9 col-lg-6 mx-auto">
                            <span class="h7 important  font-weight-bold text-1">Username </span>
                            <input class="form-control my-2" type="text" name="username[]" />
                        </div>

                        <div class="col col-12 col-md-9 col-lg-6 mx-auto">
                        <span class="h7 important  font-weight-bold text-1">User Type </span>
                            <div class="input-group mb-3">
                                <select class="custom-select  text-1" id="inputGroupSelect01">
                                    <option selected name="usertype"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col col-12 col-md-9 col-lg-6 mx-auto">

                            <span class="h7 important  font-weight-bold text-1">Password </span>
                            <div class="input-group floating-label-group">
                                <input class="form-control floating-label-input" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" placeholder=" " readonly />
                                <button type="button" class="btn floating-eye-pass border-lights" id="toggle-show-password" aria-label="Show Password" data-target="#password">
                                    <i class="fas fa-eye d-none" id="show"></i>
                                    <i class="fas fa-eye-slash" id="hide"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex">
        <div class="col-12 col-lg-6 mx-auto text-center ">
            <button class="btn btn-outline-info mx-auto btn-sm  w-25 "><a href="#"></a><i class="fa-solid fa-floppy-disk mr-2"></i>Save</button>
        </div>

    </div>




    @endsection