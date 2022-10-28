@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('vaccination')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Vaccination</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="row" id="form-area">
        <div class="col-12">
            <div class="card my-3 mx-auto">
                <h5 class="card-header text-center text-white bg-1">View Pet Vaccination</h5>
                <div class="card-body d-flex">
                    <div class="form-group col-6 mx-auto w-50">

                        <label class="h6 important" for="date">Date</label>
                        <input class="form-control" type="text" name="date" value="{{old('date')}} "  readonly/>

                        <label class="h6 important" for="petowner">Pet Owner</label>
                        <input class="form-control" type="text" name="petowner" value="{{old('petowner')}} " readonly />

                        <label class="h6 important" for="petname">Pet Name</label>
                        <input class="form-control" type="text" name="petname" value="{{old('petname')}} " readonly />

                        <label class="h6 important" for="vaccine">Vaccine Type</label>
                        <input class="form-control" type="text" name="vaccine" value="{{old('vaccine')}} "  readonly/>

                    </div>

                    <div class="form-group col-6 mx-auto w-50 ">

                        <label class="h6 important" for="expiration">Expiration</label>
                        <input class="form-control" type="text" name="expiration" value="{{old('expiration')}} "  readonly/>

                        <label class="h6 important my-1" for="veterinarian">Veterenarian</label>
                        <input class="form-control  my-2 " type="text" name="veterinarian" value="{{old('veterinarian')}} "  readonly/>


                        <label class="h6 important my-1" for="amount">Amount</label>
                        <input class="form-control  my-2" type="text" name="amount" value="{{old('amount')}}" readonly />

                        <div class="form-group form-check mt-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label " for="exampleCheck1">Print Vaccination</label>
                        </div>
                    </div>

                </div>
               
            </div>
        </div>
    </div>

    @endsection