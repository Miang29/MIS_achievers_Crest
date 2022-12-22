@extends('layouts.user')

@section('title', 'Appointment')

@section('content')


<form method="POST" action="{{route ('submit-appointments')}}" class="card dark-shadow w-50 my-3 mt-5 mx-auto w-lg-50 w-md-50" enctype="multipart/form-data">
    <h2 class="card-header font-weight-bold  text-center text-white gbg-2"><i class="fa-solid fa-paw mr-3"></i>Create Appointment<i class="fa-solid fa-paw ml-3"></i></h2>
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">

            <div class="col-12 col-lg-6 form-group mx-auto position-relative d-none d-lg-block">
                <img src="{{ asset('uploads/settings/pet-care.jpg') }}" class="img img-fluid mx-auto my-2 w-100  position-overflow" alt="Nano machines son">
            </div>

            <div class="col-12 col-lg-8 mx-auto">
                {{-- OWNER --}}
                <div class="form-group">
                    <input class="form-control border-secondary" type="text" name="pet_owner" value="{{old('petowner')}}" placeholder="Pet Owner" />
                    <small class="text-danger small">{{ $errors->first('pet_owner') }}</small>
                </div>

                {{-- PET --}}
                <div class="form-group">
                    <input class="form-control border-secondary" type="text" name="pet_name" value="{{old('petname')}}" placeholder="Pet Name" />
                    <small class="text-danger small">{{ $errors->first('pet_name') }}</small>
                </div>

                {{-- EMAIL --}}
                <div class="form-group">
                    <input class="form-control border-secondary" type="email" name="email" value="{{old('email')}} " placeholder="Email" />
                    <small class="text-danger small">{{ $errors->first('email') }}</small>
                </div>

                {{-- DATE --}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-secondary">Date</span>
                        </div>
                        <input class="form-control border-secondary border-left-0" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
                    </div>
                    <small class="text-danger small">{{ $errors->first('date') }}</small>
                </div>

                {{-- TIME --}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-white border-secondary">Time</div>
                        </div>
                        <input class="form-control border-secondary border-left-0" type="time" name="time" min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
                    </div>
                    <small class="text-danger small">{{ $errors->first('time') }}</small>
                </div>

                {{-- SERVICE-TYPE --}}
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-secondary border-right-0">Service Type</span>
                        <select class="custom-select border-secondary border-left-0" id="inputGroupSelect01" name="service_type">
                            <option selected name="service_type"></option>
                            <option selected name="service_type">Consultation</option>
                        </select>
                    </div>
                    <small class="text-danger small">{{ $errors->first('service_type') }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer  d-flex flex-row">
        <button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit">Book</button>
        <a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointment') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-25 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
    </div>
</form>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection