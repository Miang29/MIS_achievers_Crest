@extends('layouts.admin')

@section('title', 'Pet Information')

@section('content')
<div class="container-fluid m-0 ">
	<h3 class="mt-3"><a href="{{route('pet-information')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet Information</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<form class="form ">
		<div class="row" id="form-area">
			<div class="col-12 col-md-12">
				<div class="row">
					<div class="input-group mb-3 col-lg-6">
						<div class="input-group-prepend">
							<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Client Name</label>
						</div>
						<select class="custom-select" id="inputGroupSelect01">
							<option selected>Choose a registered client</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>

					<div class="input-group mb-3 col-lg-6">
						<div class="input-group-prepend">
							<span class="input-group-text font-weight-bold bg-white" id="inputGroup-sizing-default">Email</span>
						</div>
						<input type="text" class="form-control bg-light" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
					</div>
				</div>
			</div>
			{{-- PET REGISTRATION FORM --}}
			<div class="col-lg-6 col-md-8 col-12 my-2 mx-auto">
				<div class="card mx-auto">
					<h3 class="card-header font-weight-bold text-center bg-1 text-white"><i class="fa-solid fa-dog mr-2"></i>Pet Registration<i class="fa-solid fa-cat ml-2"></i></h3>
					<div class="card-body d-flex">
						<div class="row">
							<div class="col-12 col-md-6 col-lg-12">
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
												<input type="file" name="web-logo" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#web-logo-container" data-target-name-container="#web-logo-name">
												<h6 id="web-logo-name" class="text-truncate w-50 mx-auto text-center" data-default-name="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}">{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}</h6>
											</div>

											<div class="col-12 col-md-6 text-md-left">
												<label class="form-label font-weight-bold" for="web-logo">Pet Image</label><br>
												<small class="text-muted pb-0 mb-0">
													<b>FORMATS ALLOWED:</b>
													<br>JPEG, JPG, PNG, WEBP
												</small><br>
												<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
												<button class="btn btn-secondary" type="button" id="reset-logo">Remove Image</button><br>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 ">
								<div class="form-group ">

									<label class="h6 font-weight-bold text-1  important" for="petname">Pet Name</label>
									<input class="form-control" type="text" name="petname[]" />

									<label class="h6 font-weight-bold text-1  important" for="breed">Breed</label>
									<input class="form-control" type="text" name="breed[]" />

									<label class="h6 font-weight-bold text-1 important" for="color">Color/s</label>
									<input class="form-control" type="text" name="color[]" />

									<label class="h6 font-weight-bold text-1  important" for="bday">Birthdate</label>
									<input class="form-control" type="date" name="bday[]" />

									<label class="h6 font-weight-bold text-1  important" for="species">Species</label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="species[]"></option>
											<option value="1">Cat</option>
											<option value="2">Dog</option>
										</select>
									</div>

									<label class="h7 font-weight-bold text-1  important" for="gender">Gender</label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="gender[]"></option>
											<option value="1">Female</option>
											<option value="2">Male</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1 important" for="types">Types</label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="types[]"></option>
											<option value="1">Tame</option>
											<option value="2">Wild</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- PET REGISTRATION FORM END --}}

			<div class="col-6 my-2 mx-auto ">
				<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" onclick="addForm(this, '#form-area');">
					<span class="m-auto"><i class="fa-solid fa-circle-plus mr-2">Add Pet</i></span>
				</button>
			</div>

		</div>

		<div class="row">
			<div class="col-12 my-3 d-flex flex-row">
				<button class="btn btn-outline-info ml-auto mr-1 w-25 mb-5">Save</button>
				<a href="{{ route('pet-information') }}" class="btn btn-outline-danger ml-1 mr-auto w-25 mb-5">Cancel</a>
			</div>
		</div>
	</form>
</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
@endsection

@section('scripts')
<script type="text/javascript">
	const addForm = (listener, targetR) => {
		let obj = $(listener);
		let target = $(targetR);

		const form = $(`
		<div class="col-lg-6 col-md-8 col-sm-12 my-2 mx-auto">
			<div class="card mx-auto">
				<h3 class="card-header text-center position-relative bg-1 text-white"><i class="fa-solid fa-dog mr-2"></i>Pet Registration<i class="fa-solid fa-cat ml-2"></i><span class="position-absolute" style="top: 0.125rem; right: 0.5rem; cursor: pointer;" onclick="$(this).parent().parent().parent().remove();"><i class="fas fa-multiply"></i></span></h3>
				
				<div class="card-body d-flex">
					<div class="row">
					<div class="col-12 col-md-6 col-lg-12">
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
												<label class="form-label font-weight-bold" for="web-logo">Pet Image</label><br>
												<small class="text-muted pb-0 mb-0">
													<b>FORMATS ALLOWED:</b>
													<br>JPEG, JPG, PNG, WEBP
												</small><br>
												<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
												<button class="btn btn-secondary" type="button" id="reset-logo">Remove Image</button><br>
											</div>
										</div>
									</div>
								</div>
							</div>

						<div class="col-12 col-lg-12 col-md-12 ">
							<div class="form-group ">
								<label class="h6 font-weight-bold text-1  important" for="petname">Pet Name</label>
								<input class="form-control" type="text" name="petname[]"/>

								<label class="h6 font-weight-bold text-1  important" for="breed">Breed</label>
								<input class="form-control" type="text" name="breed[]"/>

								<label class="h6 font-weight-bold text-1  important" for="color">Color/s</label>
								<input class="form-control" type="text" name="color[]"/>

								<label class="h6 font-weight-bold text-1  important" for="bday">Birthdate</label>
								<input class="form-control" type="date" name="bday[]"/>

								<label class="h6 font-weight-bold text-1  important" for="species">Species</label>
									<div class="input-group mb-3">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="species[]"></option>
											<option value="1">Cat</option>
											<option value="2">Dog</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1  important" for="gender">Gender</label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="gender[]">Choose gender..</option>
											<option value="1">Female</option>
											<option value="2">Male</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1  important" for="types">Types</label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="types[]">Choose types..</option>
											<option value="1">Tame</option>
											<option value="2">Wild</option>
										</select>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`);

		target.append($(form))
			.append(obj.parent());

		form.find('img').on('error', fallbackImageOnErrorReplace);
	};
</script>
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
				} else {
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