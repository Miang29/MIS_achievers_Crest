@extends('layouts.admin')

@section('title', 'Pet History')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <h3 class="mt-3"><a href="{{route('pet-information.pet.show', [$id])}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet List Information</a></h3>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="col-12 my-2 mx-auto">
        <form method="POST" action="#" class="card mx-auto" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="card-header text-center text-white bg-1">Nano Veterinary Medical History</h2>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-12 col-md-8 form-group mx-auto">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Pet Owner</span>
                            </div>
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 col-md-8 form-group mx-auto">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Mobile No</span>
                            </div>
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                    </div>

                    <div class="col-lg-8 col-12 col-md-8 form-group mr-auto">
                        <div class="input-group input-group-sm mb-5 ml-5">
                            <div class="input-group-prepend">
                                <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Address</span>
                            </div>
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                    </div>
                </div>
                {{-- PET INFORMATION --}}
                <div class="card mx-auto position-relative shadow p-5 mb-5 w-lg-100 w-100 w-md-100">
                    <div class="position-absolute bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                        <button class="btn" data-toggle="tooltip" data-placement="left" title="Pet Information"></button>
                        <span class="h2 m-auto text-truncate">Pet Information</span>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Birthdate</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Gender</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Color/s</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Breed</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Species</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 col-md-8 form-group">
                            <div class="input-group input-group-sm mb-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border border-white bg-white font-weight-bold" id="inputGroup-sizing-sm">Type</span>
                                </div>
                                <input type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary bg-white" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- CLINICAL HISTORY --}}
                <div class="card mx-auto position-relative shadow p-5 mb-5 w-lg-100 w-100 w-md-100">
                    <div class="position-absolute bg-1 text-white text-center d-flex w-75 w-md-50 w-lg-50 text-wrap" style="top: -1.8rem; left:1.5rem; min-height:4rem; max-height: 4rem; border-radius:0.5rem;">
                        <button class="btn" data-toggle="tooltip" data-placement="left" title="Pet Information"></button>
                        <span class="h2 m-auto text-truncate">HISTORY</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection