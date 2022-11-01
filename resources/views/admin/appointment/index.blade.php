@extends('layouts.admin')

@section('title', 'appointment')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h2 class="font-weight-bold text-1">Appointment List</h2>
        </div>

        <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
            <a href="{{route('create-appointment')}}" class="btn btn-info bg-1"><i class="fas fa-plus-circle mr-2"></i>Add Apointment</a>
        </div>

        <div class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto h-100 card">
        <div class=" card-body h-100 px-0 pt-0 ">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="hr-thick text-1">Pet Owner</th>
                    <th scope="col" class="hr-thick text-1">Pet Name</th>
                    <th scope="col" class="hr-thick text-1">Date</th>
                    <th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                      
                    <td>
                    <div class="col-12 my-1 d-flex flex-row">
                    <button class="btn btn-outline-info btn-sm ml-auto  w-25"><a href="#"></a>Edit</button>
                    <button class="btn btn-outline-danger btn-sm ml-1  w-25"><a href="#"></a>Delete</button>
                </div>
                    </td>
                </tr>
            </tbody>

        </table>
        </div>
    </div>
</div>


@endsection