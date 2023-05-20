@extends('layouts.admin')

@section('title', 'Show Messages')

@section('content')
<div class="container-fluid m-0">
    <h3 class="mt-3"><a href="{{route('settings.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Settings</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">
    <div class="card mx-auto">
         <h5 class="card-header gbg-1"></h5>
        <div class=" card col-lg-6 col-md-4 col-6 mx-auto my-3 border rounded p-3 shadow">

            {{-- Client Name --}} 
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold text-1" id="basic-addon1"><i class="fa-solid fa-user fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $contacts->client_name }}" aria-describedby="basic-addon1">
            </div>
            <div class="dropdown-divider"></div>

            {{-- EMAIL --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-envelope fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $contacts->email}}" aria-describedby="basic-addon1">
            </div> 
            
            {{-- Mobile No --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-phone fa-lg text-1"></i></span>
                </div>
                <input type="text" class="form-control bg-white" readonly value="{{ $contacts->mobile_no }}" aria-describedby="basic-addon1">
            </div> 

            {{-- Message --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-message fa-lg text-1"></i></span>
                </div>
                <textarea class="form-control bg-white" readonly name="reason" rows="5" aria-describedby="basic-addon1">{{ $contacts->message }}</textarea>
            </div>

            {{-- STATUS --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text bg-light font-weight-bold" id="basic-addon1"><i class="fa-solid fa-circle-half-stroke fa-lg text-1 mr-1"></i></span>
                </div>
                @if ($contacts->status == 0)
                    <input type="text" class="form-control bg-white text-warning" readonly value="Pending" aria-describedby="basic-addon1">
                    @elseif ($contacts->status == 1)
                    <input type="text" class="form-control bg-white text-success" readonly value="Message Viewed" aria-describedby="basic-addon1">
                    @elseif ($contacts->status == 2)
                    <input type="text" class="form-control bg-white text-danger" readonly value="Message Ignored" aria-describedby="basic-addon1">
                    @else
                    <input type="text" class="form-control bg-white" readonly value="Unknown" aria-describedby="basic-addon1">
                @endif
            </div> 
        </div>
        <div class="card-footer  d-flex flex-row">
            <a href="{{ route('view.message',[$id]) }}" class="btn btn-outline-custom btn-sm ml-1 w-lg-25 mx-auto w-25" data-action ="submit" style="border-radius:1rem;">Enter</a>
        </div>
    </div>
</div>
@endsection