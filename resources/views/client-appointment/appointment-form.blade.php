@extends('layouts.user')

@section('title', 'Appointment')

@section('content')
<form method="POST" class="card dark-shadow my-3 mt-5 mb-5 mx-auto w-md-50 w-100 w-lg-75" enctype="multipart/form-data">
    <h2 class="card-header font-weight-bold col-lg-12 col-md-8 col-12 text-center text-white gbg-1"></h2>
    {{ csrf_field() }}
    <label class="h2 mt-4 mx-auto">Appointment Information</label>
    <div class="card-body">
        <div class="card border-light shadow-sm col-lg-8 col-md-12 col-12 mt-4 mx-auto">
            <div class="col-lg-12 mt-3">
                <div class="row">
                    {{--- TIME --}}
                    <div class="col-lg-12 col-md-8 col-12 mr-auto mb-2 ">
                        <label>Please select an available time.</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="fa-solid fa-clock"></i></label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected value="">Choose...</option>
                                <option value="1">8:00 AM - 10:00 PM</option>
                                <option value="2">10:00 AM - 12:00 PM</option>
                                <option value="3">1:00 PM - 3:00 PM</option>
                                <option value="4">3:00 PM - 5:00 PM</option>
                                <option value="5">5:00 PM - 7:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 mx-auto">
                        <input class="form-control bg-light" placeholder="Name" type="text" value="{{ auth()->user()->getName() }}" readonly />
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-12 col-md-9 col-lg-6 mx-auto">
                        <input class="form-control" placeholder="Pet Name" type="text" name="pet_name" value="{{ old('pet_name') }}" />
                        <small class="text-danger small">{{ $errors->first('pet_name.*') }}</small>
                    </div>

                    <div class="col-12 col-md-9 col-lg-6 mx-auto">
                        <input class="form-control" placeholder="Breed" type="text" name="breed" value="{{ old('breed') }}" />
                        <small class="text-danger small">{{ $errors->first('pet_name.*') }}</small>
                    </div>

                    <div class="form-group col-12 col-md-12 col-lg-12 mx-auto mt-3">
                        <textarea class="form-control my-2 not-resizable" placeholder="Your message" name="message" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer col-12 col-lg-12 mx-auto text-center flex-row">
        <a href="{{ route('schedule-date')}}" class="btn btn-outline-custom btn-sm w-lg-25"><i class="fa-solid fa-arrow-left fa-lg mr-2"></i>Back</a>
        <button type="submit" class="btn btn-outline-custom btn-sm w-lg-25" data-type="submit">Make Appointment</button>
    </div>
</form>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection