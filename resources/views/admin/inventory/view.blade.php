@extends('layouts.admin')

@section('title', 'Product')

@section('content')


<div class="container-fluid m-0">
    <div class="row">
       <h2 class="mt-5"><a href="javascript:void(0);" onclick="confirmLeave('{{route('inventory')}}');" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Inventory List</a></h2>
        <div class="col-12 col-md-6 col-lg mt-5 text-center text-md-left text-lg-right">
            <a href="{{route('product.create', [$id])}}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add New Products</a>
        </div>
        <div class="ccol-12 col-md-6 col-lg-6 mt-5 text-center text-lg-right ml-auto">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-thick" style="border-color: #707070;">

    <div class="col-12 col-lg text-center text-lg-left">
        <h2 class="font-weight-bold text-1">Product List</h2>
    </div>


    <div class="overflow-x-auto h-100 card">
        <div class=" card-body h-100 px-0 pt-0 ">
            <table class="table table-striped text-center" >
                <thead>
                    <tr>
                        <th scope="col" class="hr-thick text-1">Product Name</th>
                        <th scope="col" class="hr-thick text-1">Stocks</th>
                        <th scope="col" class="hr-thick text-1">Price</th>
                        <th scope="col" class="hr-thick text-1">Status</th>
                        <th scope="col" class="hr-thick text-1"></th>
                    </tr>
                </thead>


                <tbody>
                    @forelse ($products as $p)
                    <tr>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->stocks }}</td>
                        <td>₱{{ number_format($p->price, 2) }}</td>

                        <td>
                            @if($p->status == "active")
                            <i class="fas fa-circle text-success mr-2"></i>Active
                            @elseif ($p->status == "inactive")
                            <i class="fas fa-circle text-danger mr-2"></i>Inactive                           
                            @endif
                        </td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
                                    Action
                                </button>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                                    <a href="{{route ('product.view', [$id, $p->id])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Product</a>
                                    <a href="{{route('product.edit', [$id, $p->id])}}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Product</a>
                                    <a href="javascript:void(0);" onclick="confirmLeave('{{ route('product.delete', [$id, $p]) }}', undefined, 'Are you sure you want to archive this item?');" class="dropdown-item"><i class="fa-solid fa-box-archive mr-2"></i>Archive</a>
                                    <a href="{{ route('product.add.stock', [$id, $p->id]) }}" class="dropdown-item"><i class="fa-solid fa-plus mr-2"></i>Add Stocks</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Nothing to show~</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection