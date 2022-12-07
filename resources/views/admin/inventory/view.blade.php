@extends('layouts.admin')

@section('title', 'Product')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
    <div class="row">
        <div class="col-12 col-lg text-center text-lg-left">
            <h4 class=" h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('category')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Category List</a></h4>
        </div>


        <div class="col-12 col-md-6 col-lg-12 my-2 text-center text-md-left text-lg-right">
            <a href="{{route('product.create', [$id])}}" class="btn btn-info bg-1  btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Add products</a>
        </div>

        <div class=" col-12 col-md-6 col-lg-12 my-2 text-center text-lg-right">
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
            <table class="table table-striped text-center">
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
                    @forelse ($products as $k => $p)
                    <tr>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p['stocks'] }}</td>
                        <td>₱{{ number_format($p['price'], 2) }}</td>
                        
                        <td>
                            @if ($p['status'])
                            <i class="fas fa-circle text-success mr-2"></i>Active
                            @else
                            <i class="fas fa-circle text-danger mr-2"></i>Inactive
                            @endif
                        </td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
                                    Action
                                </button>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                                    <a href="{{route ('product.view', [$id, $k])}}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Product</a>
                                    <a href="{{route('product.edit', [$id, $k])}}" class="dropdown-item"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Product</a>
                                    <a href="javascript:void(0);" onclick="confirmLeave('{{ route('product.delete', [$id, $k]) }}', undefined, 'Are you sure you want to remove this item?');" class="dropdown-item"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
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