@extends('layouts.user')

@section('title', 'Schedule Date')

@section('content')
<form method="POST" class="card dark-shadow my-3 mt-5 mb-5 mx-auto w-md-50 w-100 w-lg-75" enctype="multipart/form-data">
    <h2 class="card-header col-lg-12 col-md-8 col-12 text-center gbg-1"></h2>
    {{ csrf_field() }}

    <div class="card-body">
        <div class="card border-light col-lg-8 col-md-12 col-12 mx-auto mb-3 mt-3">
            <div class="row">
               <label class="ml-3 mt-3">Please select an available services.</label>
               <div class="col-12 col-lg-12 col-md-8 mx-auto">
                <select class="custom-select" name="category_name">
                    <option class="font-weight-bold" value="">Services</option>
                    <option value=""></option>
                </select>
            </div>

            <div class="col-12 col-lg-12 col-md-8  mt-3 mb-3 mx-auto">
                <label class="">Please select an available date.</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
                    </div>
                    <input type="date" class="form-control" aria-label="date" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer d-flex">
    <a href="{{ route('create-appointment')}}" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-50 w-md-50 mx-auto">Next<i class="ml-2 fa-solid fa-arrow-right fa-lg"></i></a>
</div>
</form>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection