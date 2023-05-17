@extends('layouts.admin')

@section('title', 'Appointment')

@section('content')
<form method="POST" action="{{ route('update.appointments', [$appointment->id]) }}" class="container-fluid m-0" enctype="multipart/form-data">
{{ csrf_field() }}
    <h3 class="mt-3"><a href="{{route('appointments.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment List</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">
   
    <div class="col-12 col-lg-12 col-md-12 mx-auto">
        <div class="card my-3 mx-auto">
            <h2 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit Appointment</h2>

                <div class="card border-light col-lg-8 col-md-12 col-12 mx-auto mb-3 mt-3">
                    <div class="row">
                        {{-- Service Type --}}
                            <label class="ml-3 mt-3">Please select a service type.</label>
                        <div class="col-12 col-lg-12 col-md-8 mx-auto">
                            <select  class="custom-select" name="service_id">
                                @foreach ($services as $s)
                                <option value="{{$s->id}}">{{$s->service_name}}</option>
                                @endforeach
                                <option {{ old('service_id') ? '' : 'selected' }} disabled>--- SELECT SERVICE ---</option>
                            </select>
                        </div>
                        <small class="text-danger small ml-2">{{ $errors->first('service_id') }}</small>

                        {{--- Reserved AT --}}
                        <div class="col-12 col-lg-12 col-md-8  mt-3 mx-auto">
                            <label class="">Please select an available date.</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
                                </div>
                                <input type="date" class="form-control" name ="reserved_at" min="{{ \Carbon\Carbon::now()->timezone("Asia/Manila")->format("Y-m-d") }}" aria-label="date" aria-describedby="basic-addon1">
                            </div>
                        </div>
                         <small class="text-danger small ml-3 mb-2">{{ $errors->first('reserved_at') }}</small>

                        {{--- Appointment time --}}
                        <div class="col-lg-12 col-md-8 col-12 mr-auto">
                            <label>Please select an available time.</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
                                </div>
                                <select class="custom-select" name="appointment_time" aria-label="Please select an available time">
                                    @foreach ($appointmentTime as $k => $v)
                                    <option value="{{ $k + 1 }}" {{ old('appointment_time') == ($k + 1) ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                    <option {{ old('appointment_time') ? '' : 'selected'}} disabled>--- SELECT TIME ---</option>
                                </select>
                            </div>
                        </div>
                        <small class="text-danger small ml-3 mb-2">{{ $errors->first('appointment_time') }}</small>

                        {{-- Client Name --}}
                        <div class="col-lg-12 col-md-8 col-12 mr-auto">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-user"></i></label>
                                </div>
                                <select class="custom-select" name="user_id">                       
                                    <option selected  value="{{$appointment->user->id}}">{{ $appointment->user->getName() }}</option>
                                </select>
                            </div>
                        </div>


                        {{-- Client Name --}}
                        <div class="col-lg-12 col-md-8 col-12 mr-auto">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-user"></i></label>
                                </div>
                                <select class="custom-select" name="pet_information_id">                       
                                    <option selected  value="{{$appointment->petsInformations->id}}">{{ $appointment->petsInformations->pet_name }}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer d-flex">
                    <div class="col-lg-4 col-md-4 col-8 mx-auto text-center">
                        <button type="submit" class="btn btn-outline-info  btn-sm  w-25  mb-3" data-type="submit" data-action="update" >Update</button>
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