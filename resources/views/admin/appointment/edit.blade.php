@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<form method="POST" action="{{ route('update-appointments', [$appointments->id]) }}" class="container-fluid m-0" enctype="multipart/form-data">
{{ csrf_field() }}
    <h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">
   
    <div class="col-12 mx-auto">
        <div class="card my-3 mx-auto">
            <h2 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</h2>
           
            <div class=" col-12 col-md-9 col-lg-6 mx-auto">
                <div class="card-body d-flex mt-1 ">
                    <div class="col-lg-12 mx-auto ">
                        {{-- OWNER --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Pet Owner</label>
                            <input class="form-control border-secondary" type="text" name="pet_owner" value="{{ $appointments->pet_owner }}" />
                            <small class="text-danger small">{{ $errors->first('pet_owner') }}</small>
                        </div>

                        {{-- PET --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Pet Name</label>
                            <input class="form-control border-secondary" type="text" name="pet_name" value="{{ $appointments->pet_name }}" />
                            <small class="text-danger small">{{ $errors->first('pet_name') }}</small>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Email</label>
                            <input class="form-control border-secondary" type="email" name="email" value="{{ $appointments->email }}" />
                            <small class="text-danger small">{{ $errors->first('email') }}</small>
                        </div>

                        {{-- DATE --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Date</label>
                            <input class="form-control border-secondary" type="date" name="date" value="{{ $appointments->date }} " min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" />
                            <small class="text-danger small">{{ $errors->first('date') }}</small>
                        </div>

                        {{-- TIME --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Time</label>
                            <input class="form-control border-secondary" type="time" name="time" value="{{ $appointments->time }} " min="{{ Carbon\Carbon::createFromFormat('H:i', '08:00')->format('H:i') }}" max="{{ Carbon\Carbon::createFromFormat('H:i', '19:00')->format('H:i') }} " />
                            <small class="text-danger small">{{ $errors->first('time') }}</small>
                        </div>


                        {{-- SERVICE-TYPE --}}
                        <div class="form-group">
                            <label class="h6 font-weight-bold text-1 important" for="petowner">Service Type</label>
                            <div class="input-group-prepend">
                                <select class="custom-select border-secondary" id="inputGroupSelect01" name="service_type" value="{{ $appointments->service_type }}">
                                    <option selected name="service_type">Consultation</option>
                                    <option selected name="service_type">Vaccination</option>
                                    <option selected name="service_type"></option>

                                </select>
                            </div>
                            <small class="text-danger small">{{ $errors->first('service_type') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex">
                <div class="col-lg-4 col-md-4 col-8 mx-auto text-center">
                    <button type="submit" class="btn btn-outline-info  btn-sm  w-25  mb-3" data-type="submit">Save</button>
                    <a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.index') }}');" class="btn btn-outline-danger btn-sm w-25 mb-3">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
    @endsection