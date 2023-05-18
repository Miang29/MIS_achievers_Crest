@extends('layouts.admin')

@section('title', 'Message Reply')

@section('content')
<div class="container-fluid m-0 mt-3 mb-5">
	
	<div class="row" id="form-area">
		<form method="POST" action="{{ route('submit.response',[$id])}}" class="card mt-5 mx-auto" enctype="multipart/form-data">
			{{ csrf_field() }}
			<h3 class="card-header font-weight-bold text-white text-center bg-1">Message Response</h3>
			<div class="card-body mx-auto">
				<div class="card col-lg-12">
					<div class="row">
						{{-- Message --}}
			            <div class="col-12 col-lg-12 col-md-6 mx-auto mb-3">
			            	<h5>{{ $contacts->client_name }}</h5>
			                <textarea class="form-control bg-white" readonly name="reason" rows="3" aria-describedby="basic-addon1">{{ $contacts->message }}</textarea>
			            </div>

						{{-- REPLY --}}
						<div class="col-12 col-lg-12 col-md-6 mx-auto">
							<h5>{{ $user->getName() }}</h5>
							<textarea class="form-control my-2 not-resizable  border border-secondary" name="reply" rows="3"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="card-footer  d-flex flex-row">
				<button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit" data-action="submit">Reply</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('settings.index') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-25 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
			</div>
	   </form>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection