@extends('layouts.admin')

@section('title', 'Pet Information')

@section('content')
<div class="container-fluid m-0 "> 
	<h3 class="mt-3"><a href="{{route('pet-information')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Pet Information</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">

	<form method="POST" action="{{ route('submit-pet')}}" class="form" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row" id="form-area">
			<div class="col-12 col-md-12">
				<div class="input-group mb-3 col-lg-12">
					<div class="input-group-prepend">
						<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Client Name</label>
					</div>

					<select class="custom-select" id="inputGroupSelect01" name="pet_owner">
						@foreach ($users as $u)
						<option value="{{ $u->id}}">{{ $u->name }}</option>
						@endforeach
						<option {{ old('pet_owner') ? '' : 'selected' }} disabled>--- Select Client Name ---</option>
					</select>
					<small class="text-danger small">{{ $errors->first('pet_owner') }}</small>
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
								<div class="image-input-scope" id="pet-image-scope_0" data-settings="#image-input-settings_0" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
									{{-- FILE IMAGE --}}
									<div class="form-group text-center image-input collapse show avatar_holder" id="pet-image-image-input-wrapper_0">
										<div class="row border rounded border-secondary-light py-2 mx-1">
											<div class="col-12 col-md-6 text-md-right">
												<div class="hover-cam mx-auto avatar rounded overflow-hidden">
													<img src="{{ asset('uploads/settings/default.png') }}" class="hover-zoom img-fluid avatar" id="pet-image-container_0" alt="Pet Image" data-default-src="{{ asset('uploads/settings/default.png') }}">
													<span class="icon text-center image-input-float" id="pet-image_0" tabindex="0" data-target="#pet-image-container_0">
														<i class="fas fa-camera text-white hover-icon-2x"></i>
													</span>
												</div>
												<input type="file" name="pet_image[]" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#pet-image-container_0" data-target-name-container="#pet-image-name_0">
											</div>

											<div class="col-12 col-md-6 text-md-left">
												<label class="form-label font-weight-bold" for="pet-image">Pet Image</label><br>
												<small class="text-muted pb-0 mb-0">
													<b>FORMATS ALLOWED:</b>
													<br>JPEG, JPG, PNG, WEBP
												</small><br>
												<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
												<button class="btn btn-secondary reset-image" type="button" data-reset-id="0">Remove Image</button><br>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-12 col-md-12 ">
								<div class="form-group ">
									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="pet_name">Pet Name</label>
											<input class="form-control" type="text" name="pet_name[]" value="{{ old('pet_name[]') }}" />
											<small class="text-danger small">{{ $errors->first('pet_name.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="breed">Breed</label>
											<input class="form-control" type="text" name="breed[]" value="{{ old('breed[]') }}" />
											<small class="text-danger small">{{ $errors->first('breed.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-12 mx-auto">
											<label class="font-weight-bold important" for="colors">Colors</label>
											<select class="select-choices" name="colors[0][]" placeholder="Select Pet color" multiple notInstantiated>
												<option value="#FFFFFF">White</option>
												<option value="#000000">Black</option>
												<option value="#C1C1C1">Ash Gray</option>
												<option value="#FFFDD0">Cream</option>
												<option value="#D2691E">Cinnamon</option>
												<option value="#E5AA70">Fawn</option>
												<option value="#964B00">Brown</option>
											</select>
											<small class="text-danger small">{{ $errors->first('colors') }}</small>
										</div>
									</div>


									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="birthdate">Birthdate</label>
											<input class="form-control" type="date" name="birthdate[]" value="{{ old('brithdate[]') }}" />
											<small class="text-danger small">{{ $errors->first('birthdate.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="species">Species</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="species[]" value="{{ old('species[]') }}">
													<option value="cat">Cat</option>
													<option value="dog">Dog</option>
													<option {{ old('species[]') ? '' : 'selected' }} disabled>--- Select species ---</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('species.*') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="gender">Gender</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="gender[]" value="{{ old('gender[]') }}">
													<option value="female">Female</option>
													<option value="male">Male</option>
													<option {{ old('gender[]') ? '' : 'selected' }} disabled>--- Select gender ---</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('gender.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="types">Types</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="types[]" value="{{ old('types[]') }}">
													<option value="tame">Tame</option>
													<option value="wild">Wild</option>
													<option {{ old('types[]') ? '' : 'selected' }} disabled>--- Select types ---</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('types.*') }}</small>
										</div>
										{{-- traits --}}
										<div class="col-12 col-md-12 col-lg-12 mx-auto">
											<label class="important font-weight-bold" for="traits[]">Unique Traits/Feature</label>
											<textarea class="form-control my-2 not-resizable" name="traits[]" rows="3">{{ old("prescription.0") }}</textarea>
											<small class="text-danger small">{{ $errors->first('traits.0') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="gender">Pet Status</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="pet_status[]" value="{{ old('pet_status[]') }}">
													<option value="alive">Alive</option>
													<option value="deceased">Deceased</option>
													<option {{ old('pet_status[]') ? '' : 'selected' }} disabled>--- Select status ---</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('pet_status.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="lifespan">Expected Life Span</label>
											<input class="form-control" type="text" name="lifespan[]" value="{{ old('lifespan[]') }}" />
											<small class="text-danger small">{{ $errors->first('lifespan.*') }}</small>
										</div>
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
				<button type="submit" data-action="submit" class="btn btn-outline-info ml-auto mr-1 w-25 mb-5" data-type="submit">Save</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('pet-information') }}');" class="btn btn-outline-danger mr-auto mr-1 w-25 mb-5">Cancel</a>
			</div>
		</div>
	</form>
</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/image-input.js') }}"></script>
<script type="text/javascript">
	var __iterator = 1;
	const instantiateSelect = () => {
		new Choices('.select-choices[notInstantiated]', {
			removeItemButton: true,
			maxItemCount: 3,
			searchResultLimit: 7,
			renderChoiceLimit: 7
		});

		$(".select-choices[notInstantiated]").removeAttr("notInstantiated");
	}

	const addForm = (listener, targetR) => {
		let obj = $(listener);
		let target = $(targetR);

		const form = $(`
		<div class="col-lg-6 col-md-8 col-12 my-2 mx-auto"> 
			<div class="card mx-auto">
				<h3 class="card-header text-center position-relative bg-1 text-white"><i class="fa-solid fa-dog mr-2"></i>Pet Registration<i class="fa-solid fa-cat ml-2"></i><span class="position-absolute" style="top: 0.125rem; right: 0.5rem; cursor: pointer;" onclick="$(this).parent().parent().parent().remove();"><i class="fas fa-multiply"></i></span></h3>
				<div class="card-body d-flex col-lg-12">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-12">
							{{-- IMAGE INPUT --}}
							<div class="image-input-scope" id="pet-image-scope_${__iterator}" data-settings="#image-input-settings_${__iterator}" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
								{{-- FILE IMAGE --}}
								<div class="form-group text-center image-input collapse show avatar_holder" id="pet-image-image-input-wrapper_${__iterator}">
									<div class="row border rounded border-secondary-light py-2 mx-1">
										<div class="col-12 col-md-6 text-md-right">
											<div class="hover-cam mx-auto avatar rounded overflow-hidden">
												<img src="{{ asset('uploads/settings/default.png') }}" class="hover-zoom img-fluid avatar" id="pet-image-container_${__iterator}" alt="Pet Image" data-default-src="{{ asset('uploads/settings/default.png') }}">
												<span class="icon text-center image-input-float" id="pet-image_${__iterator}" tabindex="0" data-target="#pet-image-container_${__iterator}">
													<i class="fas fa-camera text-white hover-icon-2x"></i>
												</span>
											</div>
											<input type="file" name="pet_image[]" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#pet-image-container_${__iterator}" data-target-name-container="#pet-image-name_${__iterator}">
										</div>

										<div class="col-12 col-md-6 text-md-left">
											<label class="form-label font-weight-bold" for="pet-image">Pet Image</label><br>
											<small class="text-muted pb-0 mb-0">
												<b>FORMATS ALLOWED:</b>
												<br>JPEG, JPG, PNG, WEBP
											</small><br>
											<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
											<button class="btn btn-secondary reset-image" type="button" data-reset-id="${__iterator}">Remove Image</button><br>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-12 col-md-12 ">
							<div class="form-group ">
								<div class="row">
									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="font-weight-bold important" for="pet_name">Pet Name</label>
										<input class="form-control" type="text" name="pet_name[]"/>
									</div>

									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="font-weight-bold important" for="breed">Breed</label>
										<input class="form-control" type="text" name="breed[]" value="{{ old('breed[]') }}" />
									</div>

									{{-- COLORS --}}
									<div class="col-12 col-md-9 col-lg-12 mx-auto">
										<label class="font-weight-bold important" for="colors">Colors</label>
										<select class="select-choices" name="colors[${__iterator++}][]" placeholder="Select Pet color" multiple notInstantiated>
											<option value="#FFFff">White</option>
											<option value="#00000">Black</option>
											<option value="#D269C1">Ash Gray</option>
											<option value="#C1C10">Cream</option>
											<option value="#FFFDD1E">Cinnamon</option>
											<option value="#E5AA70">Fawn</option>
											<option value="#964B00">Brown</option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-9 col-lg-6 mx-auto mt-4">
										<label class="font-weight-bold important" for="birthdate">Birthdate</label>
										<input class="form-control" type="date" name="birthdate[]"/>
										<small class="text-danger small">{{ $errors->first('birthdate') }}</small>
									</div>

									<div class="col-12 col-md-9 col-lg-6 mx-auto mt-4">
										<label class="font-weight-bold important" for="species">Species</label>
										<div class="input-group mb-3 ">
											<select class="custom-select" id="inputGroupSelect01" name="species[]">
												<option value="cat">Cat</option>
												<option value="dog">Dog</option>
												<option {{ old('species[]') ? '' : 'selected' }} disabled>--- Select species ---</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="font-weight-bold important" for="gender">Gender</label>
										<div class="input-group mb-3 ">
											<select class="custom-select" id="inputGroupSelect01" name="gender[]">
												<option value="female">Female</option>
												<option value="male">Male</option>
												<option {{ old('gender[]') ? '' : 'selected' }} disabled>--- Select gender ---</option>
											</select>
										</div>
									</div>

									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="font-weight-bold important" for="types">Types</label>
										<div class="input-group mb-3 ">
											<select class="custom-select" id="inputGroupSelect01" name="types[]">
												<option value="tame">Tame</option>
												<option value="wild">Wild</option>
												<option {{ old('types[]') ? '' : 'selected' }} disabled>--- Select types ---</option>
											</select>
										</div>
									</div>
									{{-- traits --}}
									<div class="col-12 col-md-12 col-lg-12 mx-auto">
										<label class="important font-weight-bold" for="traits[]">Unique Traits/Feature</label>
										<textarea class="form-control my-2 not-resizable" name="traits[]" rows="3">{{ old("prescription.0") }}</textarea>
										<small class="text-danger small">{{ $errors->first('traits.0') }}</small>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="important font-weight-bold" for="gender">Pet Status</label>
										<div class="input-group mb-3 ">
											<select class="custom-select" id="inputGroupSelect01" name="pet_status[]" value="{{ old('pet_status[]') }}">
												<option value="alive">Alive</option>
												<option value="deceased">Deceased</option>
												<option {{ old('pet_status[]') ? '' : 'selected' }} disabled>--- Select status ---</option>
											</select>
										</div>
										<small class="text-danger small">{{ $errors->first('pet_status.*') }}</small>
									</div>

									<div class="col-12 col-md-9 col-lg-6 mx-auto">
										<label class="important font-weight-bold" for="lifespan">Expected Life Span</label>
										<input class="form-control" type="text" name="lifespan[]" value="{{ old('lifespan[]') }}" />
										<small class="text-danger small">{{ $errors->first('lifespan.*') }}</small>
									</div>
								</div>
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

		instantiateSelect();
	};
	
	$(document).ready(() => {
		$(document).on('click', ".reset-image", (e) => {
			$(e.currentTarget).closest(".image-input").find(`#pet-image-container_${$(e.currentTarget).attr('data-reset-id')}`).attr('src', `{{ asset('uploads/settings/default.png') }}`);
		});
		
		instantiateSelect();
	});
</script>
@endsection

@section('meta')
<meta name="csrf" content="{{ csrf_token() }}">
@endsection