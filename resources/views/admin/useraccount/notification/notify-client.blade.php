@extends('layouts.admin')

@section('title', 'Notification')

@section('content')
<form method="POST" action="{{ route('notify-client.submit') }}" class="container-fluid m-0"  enctype="multipart/form-data">
	<h3 class="mt-3"><a href="{{ route('user.index') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Users List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	{{ csrf_field() }}
	<div class="col-12 col-lg-12 col-md-12 my-2 mx-auto">
		<div class="card mx-auto">
			<h3 class="card-header text-white bg-1 text-center"><i class="fa-solid fa-bell fa-lg mr-2"></i>Notification</h3>

			<div class="card-body">

				<div class="card col-lg-6 mx-auto mt-5">
					<h3 class="mt-2 mx-auto">Select Client</h3>
					
					<div class="col-12 col-lg-12 col-md-6 mt-2 border border-outline-secondary">
						@foreach($clients as $k => $c)
						<div class="form-check">
							<input class="form-check-input checkbox" name="client[]" type="checkbox" value="{{ $c->id }}" {{ in_array($c->id, old('client', array())) ? 'checked' : '' }}>
							<label class="form-check-label {{ $errors->has("client.{$k}") ? 'bg-danger text-white' : '' }}" title="{!! $errors->has("client.{$k}") ? "{$errors->first("client.{$k}")}" : '' !!}">{{ $c->getName() }} ({{ $c->email }})</label>
						</div>
						@endforeach
					</div>

					<small class="text-danger mb-2">{{ $errors->has('client.*') ? "{$errors->first('client.*')} (Hover over the item to see problem)" : $errors->first('client') }}</small>

					<div class="d-flex flex-row text-center">
						<button type="button" class="btn btn-outline-primary w-lg-25 btn-sm ml-auto mb-3" id="selectAll">Check All</button>
						<button type="button" class="btn btn-outline-primary w-lg-25 btn-sm mx-auto mb-3" id="unselectAll">Uncheck All</button>
					</div>
				</div>

				<div class="card col-lg-6 mx-auto mt-5">
					<h3 class="mt-2 mx-auto">Message</h3>
					<div class="col-12 col-lg-12 col-md-6 mx-auto mt-2 mb-3">
						<textarea class="form-control my-2 not-resizable  border border-secondary" name="message" rows="5">{{ old('message') }}</textarea>
						<small class="text-danger mb-2">{{ $errors->first('message') }}</small>
					</div>
				</div>
			</div>

			</div>
			
			<div class="card-footer d-flex">
				<div class="col-lg-6 col-md-6 col-12 mx-auto  text-center">
					<button type="submit" class="btn btn-outline-info  btn-sm  w-25  mb-3" data-type="submit">Notify</button>
					<a href="javascript:void(0);" onclick="confirmLeave('{{ route('user.index') }}');" class="btn btn-outline-danger btn-sm w-25 mb-3">Cancel</a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() => {
		$(`#selectAll`).on('click', (e) => {
			$(`input[type=checkbox][name="client[]"].checkbox`).prop('checked', true);
		});

		$(`#unselectAll`).on('click', (e) => {
			$(`input[type=checkbox][name="client[]"].checkbox`).prop('checked', false);
		});
	});
</script>
@endsection