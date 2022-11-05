@extends('layouts.admin')

@section('title', 'appointment')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('appointment')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Appointment</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">

            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1"></h5>

                <div class="col col-12 col-md-9 col-lg-6">
                    <div class="card-body d-flex mt-1 ">
                        <div class="form-group mx-auto w-100">

                            <label class="h6 important" for="petowner">Pet Owner</label>
                            <input class="form-control" type="text" name="petowner" value="{{old('petowner')}} "readonly/>

                            <label class="h6 important" for="email">Email</label>
                            <input class="form-control" type="email" name="email" value="{{old('email')}} "readonly/>

                            <label class="h6 important" for="petname">Pet Name</label>
                            <input class="form-control" type="text" name="petname" value="{{old('petname')}} " readonly/>

                            <label class="h6 important" for="date">Date</label>
                            <input class="form-control" type="date" name="date" value="{{old('date')}}" min="{{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y-m-d') }}" readonly/>

                            <label class="h6 important" for="time">Time</label>
                            <input class="form-control" type="time" name="time" value="{{old('time')}} " readonly/>

                        </div>
                    </div>
                </div>
                
                <div class="col-12 my-2 d-flex flex-row">
                    <button class="btn btn-outline-info ml-auto mr-4 w-25"><a href="#"></a>Book</button>
                    <button class="btn btn-outline-danger ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection