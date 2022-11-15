@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('services.index')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services Category List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<div class="card my-3 mx-auto">
				<h3 class="card-header  text-white gbg-1">CREATE SERVICE CATEGORY</h3>

				<form class="card-body">
					{{ csrf_field() }}

					<div class="form-group">
				</form>

				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50"><a href="#"></a>Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection