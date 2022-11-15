@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h2 class="font-weight-bold text-1">Products Order List</h2>
        </div>

        <div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
            <a href="{{route('products.create')}}" class="btn btn-info bg-1 btn-sm w-50 my-1"><i class="fas fa-plus-circle mr-2"></i>Add transaction</a>
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
                    <th scope="col" class="hr-thick text-1">Reference No</th>
                    <th scope="col" class="hr-thick text-1">Price</th>
                    <th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                            <a href="{{route('products.view')}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View</a>
                            <a href="" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
        </div>
    </div>
</div>


@endsection