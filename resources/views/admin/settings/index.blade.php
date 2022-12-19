@extends('layouts.admin')

@section('title', 'Settings')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="col-12 col-lg text-center text-lg-left">
		<h3 class="text-1">SETTINGS</h3>
	</div>

	<form method="POST" action="{{ route('settings.update') }}" class="row" id="form-area" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="col-12 col-lg-12 col-md-12">
			<div class="card my-3 mx-auto">
				<h3 class="card-header font-weight-bold text-white gbg-1">Website Related</h3>

				<div class="card-body ">
					<div class="form-group ">

						<div class="row ">
							<div class="col-12 col-md-6 col-lg-6">
								{{-- IMAGE INPUT --}}
								<div class="image-input-scope" id="web-logo-scope" data-settings="#image-input-settings" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
									{{-- FILE IMAGE --}}
									<div class="form-group text-center image-input collapse show avatar_holder" id="web-logo-image-input-wrapper">
										<div class="row border rounded border-secondary-light py-2 mx-1">
											<div class="col-12 col-md-6 text-md-right">
												<div class="hover-cam mx-auto avatar rounded overflow-hidden">
													<img src="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}" class="hover-zoom img-fluid avatar" id="web-logo-container" alt="Website Logo" data-default-src="{{ asset('uploads/settings/default.png') }}">
													<span class="icon text-center image-input-float" id="web-logo" tabindex="0">
														<i class="fas fa-camera text-white hover-icon-2x"></i>
													</span>
												</div>
												<input type="file" name="web-logo" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#web-logo-container" data-target-name-container="#web-logo-name" >
												<h6 id="web-logo-name" class="text-truncate w-50 mx-auto text-center" data-default-name="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}">{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}</h6>
											</div>

											<div class="col-12 col-md-6 text-md-left">
												<label class="form-label font-weight-bold" for="web-logo">Website Logo</label><br>
												<small class="text-muted pb-0 mb-0">
													<b>FORMATS ALLOWED:</b>
													<br>JPEG, JPG, PNG, WEBP
												</small><br>
												<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
												<button class="btn btn-secondary" type="button" id="reset-logo">Remove Logo</button><br>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6 col-lg-6 ">
								<label class="h7  text-1 important font-weight-bold " for="webname">Website Name</label>
								<input class="form-control " type="text" name="web-name" value="{{ App\Settings::getValue('web-name') }}">
								<small class="text-danger small mx-auto">{{ $errors->first('web-name') }}</small><br>

								<label class="h6 important text-1 font-weight-bold " for="webdescription">Website Description</label>
								<textarea class="form-control not-resizable" name="web-desc" rows="6">{{ App\Settings::getValue('web-desc') }}</textarea>
								<small class="text-danger small mx-auto">{{ $errors->first('web-desc') }}</small>
							</div>
						</div>

						<br>

						<div class="card-body mt-1 border-top border-secondary">
							<h4 class="text-1 font-weight-bold text-center">Reaching Out</h4>
							
							<div class="row">
								<div class="form-group mx-auto col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="number">Mobile Number</label>
									<input class="form-control" type="text" name="mobile-no" value="{{ App\Settings::getValue('mobile-no') }}" />
									<small class="text-danger small mx-auto">{{ $errors->first('mobile-no') }}</small>
								</div>

								<div class="form-group mx-auto col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="email">Email Address</label>
									<input class="form-control" type="email" name="email" value="{{ App\Settings::getValue('email') }}"/>
									<small class="text-danger small mx-auto">{{ $errors->first('email') }}</small>
								</div>

								<div class="form-group mx-auto col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="address">Veterinary Clinic Address</label>
									<textarea class="form-control not-resizable" name="address" rows="2">{{ App\Settings::getValue('address') }}</textarea>
									<small class="text-danger small mx-auto">{{ $errors->first('address') }}</small>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="card-footer d-flex">
					<div class="col-12 col-lg-6 col-md-6 mx-auto  text-center ">
						<button type="submit" data-type="submit" class="btn btn-outline-info my-2 btn-sm w-25">Save</button>
					</div>
				</div>
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
		$("#reset-logo").on('click', (e) => {
			$.post("{{ route('settings.remove-logo') }}", {
				_token: $(`meta[name="csrf"]`).attr('content')
			}).done((response) => {
				console.log(response);
				if (response.success) {
					Swal.fire({
						title: `${response.message}`,
						position: `top`,
						showConfirmButton: false,
						toast: true,
						timer: 5000,
						background: `#28a745`,
						customClass: {
							title: `text-white`,
							content: `text-white`,
							popup: `px-3`
						},
					});

					$("#web-logo-container").attr('src', `${response.image}`);
				}
				else {
					Swal.fire({
						title: `${response.message}`,
						position: `top`,
						showConfirmButton: false,
						toast: true,
						timer: 5000,
						background: `#dc3545`,
						customClass: {
							title: `text-white`,
							content: `text-white`,
							popup: `px-3`
						},
					});
				}
			});
		});
	});
</script>
@endsection

@section('meta')
<meta name="csrf" content="{{ csrf_token() }}">
@endsection