@extends('layouts.admin')

@section('title', 'Reservation')

@section('content')
<div class="container-fluid m-0">
    <h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('reservation')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i>Reservation</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <form class="row">
        <div class="col-12">
            <div class="card mx-auto">
                <h5 class="card-header text-center">Client Registration</h5>
                <div class="card-body d-flex">
                    <div class="form-group mx-auto w-50">
                        <label class="h6" for="petowner">Pet Owner<span class="text-danger">*</span></label>
                        <input class="form-control " type="text" name="petowner" value="{{old('petowner')}}"/>

                        <label class="h6" for="address">Address<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="address" value="{{old('address')}}"/>

                        <label class="h6" for="email">Email<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{old('email')}}"/>

                        <label class="h6" for="telephone">Telephone No<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="telephone" value="{{old('telephone')}}"/>

                        <label class="h6" for="mobile">Mobile No<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}"/>	 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 my-3">
            <div class="card mx-auto" style="width: 50rem; height:auto;">
                
            </div>
        </div>

        <div class="col-6 my-3">
            <div class="card mx-auto" style="width: 25rem; height:auto;">
                <h5 class="card-header text-center">Pet Registration</h5>
                <div class="card-body">

                </div>
            </div>
        </div>
    </form>
</div>
@endsection