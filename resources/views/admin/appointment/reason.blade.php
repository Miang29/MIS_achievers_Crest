@extends('layouts.admin')

@section('title', 'Reject Appointment')

@section('content')
<div class="container-fluid m-0 mt-5">
	
	<div class="row" id="form-area">
		<div class="col-12 col-lg-8 col-md-12 mx-auto mt-5">
			<form method="POST" action="{{ route('reject.appointment',[$id]) }}" class="card mt-5" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="card-body d-flex">

					<div class="col-12 col-lg-12 col-md-6 mx-auto">
						<label class="my-2 text-1" for="reason">Please specify your reason for canceling the appointment.</label>
						<textarea class="form-control my-2 not-resizable  border border-secondary" name="reason" rows="5"></textarea>
					</div>
			       
				</div>

				<div class="card-footer  d-flex flex-row">
					<button type="submit" class="btn btn-outline-custom ml-auto btn-sm w-lg-25 w-25" data-type="submit" data-action="submit">Enter</button>
					<a href="javascript:void(0);" onclick="confirmLeave('{{ route('appointments.index') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-25 mr-auto w-25" style="border-radius:1rem;">Cancel</a>
				</div>
		   </form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection