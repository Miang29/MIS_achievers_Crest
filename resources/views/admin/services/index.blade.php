@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h2 class="font-weight-bold text-1">Services Category List</h2>
        </div>

        <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
            <a href="{{route('services.create')}}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add Category</a>
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
                    <th scope="col" class="hr-thick text-1">Services Category Name</th>
                    <th scope="col" class="hr-thick text-1">No. of Service Variation</th>
                   
                </tr>
            </thead>
   
            <tbody>
                <tr>
                    <td>Professional Services</td>
                    <td> 7</td>
                    <td></td>
                    <td></td>
                      
                    <td>
                    <div class="dropdown">
                            <button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                            <a href="{{route ('services.show')}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Category</a>
                            <a href="{{route ('services.edit')}}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Category</a>
                            <a href="" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
                            </div>
                    </td>
                </tr>
            </tbody>

           

        </table>
        </div>
    </div>
</div>


@endsection