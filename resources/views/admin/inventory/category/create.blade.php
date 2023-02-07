@extends('layouts.admin')

@section('title', 'Category')

@section('content')
<div class="container-fluid m-0">
    <h2 class="mt-3"><a href="javascript:void(0);" onclick="confirmLeave('{{route('inventory')}}');" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Category List</a></h2>
    <hr class="hr-thick" style="border-color: #707070;">

    <form class="card my-3 mx-auto h-100" method="POST" action="{{ route('submit-category') }}"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
    <h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-cart-plus mr-2 fa-lg"></i>ADD CATEGORY</h3>
         <div class="card-body d-flex ">
            <div class="form-group mx-auto w-100 col-lg-8 colo-12 col-md-12 mt-5 ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-weight-bold" id="inputGroup-sizing-default">Category Name</span>
                    </div>
                    <input name="category_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <small class="text-danger small">{{ $errors->first('category_name') }}</small>
            </div>
        </div>
        <div class="card-footer d-flex">
			<div class="col-4 mx-auto text-center">
				<button type="submit"  class="btn btn-outline-info mr-1 btn-sm w-75 w-lg-50 w-md-75" data-type="submit">Save</button>
			</div>
		</div>
    </form>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection