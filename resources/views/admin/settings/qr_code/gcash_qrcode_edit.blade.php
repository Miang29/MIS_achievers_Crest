@extends('layouts.admin')

@section('title', 'Edit payment_method Information')

@section('content') 
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{ route('settings.index') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Settings</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	
	<form class="card mx-auto" method="POST" action="{{ route('submit.payment.method') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3 class="font-weight-bold text-center mt-5 text-primary">Edit payment_method Information</h3>
		<div class="card col-lg-10 col-md-12 col-12 my-2 mx-auto mb-5">

			<div class="col-12 col-md-12 col-lg-6 mx-auto mt-3 border border-secondary bg-primary">
				{{-- IMAGE INPUT --}}
				<div class="image-input-scope" id="payment_method-image-scope" data-settings="#image-input-settings" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
					{{-- FILE IMAGE --}}
					<div class="form-group text-center image-input collapse show avatar_holder" id="payment_method-image-input-wrapper">
						<div class="row py-2 mx-1">
							<div class="col-12 col-md-6 text-md-right">
								<div class="hover-cam mx-auto avatar rounded overflow-hidden">
									
									<img src="{{ asset('uploads/settings/default.png') }}" class="hover-zoom img-fluid avatar" id="payment_method-image-container" alt="payment_method Image" data-default-src="{{ asset('uploads/settings/default.png') }}">
									<span class="icon text-center image-input-float" id="payment_method-image" tabindex="0" data-target="#payment_method-image-container">
										<i class="fas fa-camera text-white hover-icon-2x"></i>
									</span>
								</div>
								<input type="file" name="payment_method_image" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#payment_method-image-container" data-target-name-container="#payment_method-image-name">
							</div>

							<div class="col-12 col-md-6 text-md-left">
								<label class="form-label font-weight-bold text-white mt-2" for="payment_method-image">Gcash QR Code</label><br>
								<small class="text-white pb-0 mb-0">
									<b>FORMATS ALLOWED:</b>
									<br>JPEG, JPG, PNG, WEBP
								</small><br>
								<small class="text-white pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
								<button class="btn btn-dark reset-image" type="button" data-reset-id="0">Remove Image</button><br>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-12 col-lg-6 mx-auto my-3 border border-secondary">
				{{-- MOBILE NO --}}
				<div class="col-12 col-md-12 col-lg-12 mb-3">
					<label class="important my-2" for="mobile_no">Mobile No</label>
					<input class="form-control" type="text" name="mobile_no" value="09260073317" />
					<small class="text-danger small">{{ $errors->first('mobile_no') }}</small>
				</div>
				{{-- NAME --}}
				<div class="col-12 col-md-12 col-lg-12 mb-3">
					<label class="important my-2" for="mobile_no">Name</label>
					<input class="form-control" type="text" name="name" value="Ma. Leonora Mendenilla" />
					<small class="text-danger small">{{ $errors->first('name') }}</small>
				</div>

				{{-- METHOD --}}
				<input type="hidden" name="payment_method" value="gcash">	

			</div>

			<div class="col-4 my-2 mx-auto text-center">
				<button type="submit" class="btn btn-outline-info btn-sm w-25" data-action="submit" data-type="submit">Save</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('gcash.edit') }}');" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
			</div>
		</div>
	</form>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/image-input.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() => {
		$(document).on('click', ".reset-image", (e) => {
			$(e.currentTarget).closest(".image-input").find(`#payment_method-image-container_${$(e.currentTarget).attr('data-reset-id')}`).attr('src', `{{ asset('uploads/settings/default.png') }}`);
		});
		instantiateSelect();
	});
</script>
@endsection