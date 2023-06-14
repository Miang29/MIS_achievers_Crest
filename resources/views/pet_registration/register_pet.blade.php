@extends('layouts.user')

@section('title', 'Pet Registration')

@section('content')
<div class="container-fluid px-2 px-lg-6 h-100">
	<form method="POST" action="{{ route('register.submit',[$user->id])}}" class="card mt-5 mx-auto mb-5 col-lg-12 col-md-12 col-12 bg-light form" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<h3 class="font-weight-bold text-center my-3">Pets Registration</h3>
        <div class="row" id="form-area">

    	<div class="col-12 col-md-12">
			<div class="input-group mb-3 col-lg-12">
				<div class="input-group-prepend">
					<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Client Name</label>
				</div>
				<select class="custom-select" id="inputGroupSelect01" name="pet_owner">
					<option selected value="{{ $user->id}}">{{ $user->getName() }}</option>
				</select>
				<small class="text-danger small">{{ $errors->first('pet_owner') }}</small>
			</div>
		</div>
        {{-- PET REGISTRATION FORM --}}
			<div class="col-lg-6 col-md-8 col-12 my-2 mx-auto">
				<div class="card mx-auto">
					<div class="card-body">
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
											<label class="important font-weight-bold" for="pet_name[]">Pet Name</label>
											<input class="form-control" type="text" name="pet_name[]" value="{{ old('pet_name[]') }}" />
											<small class="text-danger small">{{ $errors->first('pet_name.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="breed">Breed</label>
											<input class="form-control" type="text" name="breed[]" value="{{ old('breed[]') }}" />
											<small class="text-danger small">{{ $errors->first('breed.*') }}</small>
										</div>
										<div class="col-12 col-md-9 col-lg-12 mx-auto mt-3">
											<label class="important font-weight-bold" for="colors">Colors</label>
											<select class="select-choices" name="colors[0][]" placeholder="Select Pet color" multiple notInstantiated>
												@foreach($color as $c)
												<option value="{{$c->id}}">{{$c->name}}</option>
												@endforeach
											</select>
											<small class="text-danger small">{{ $errors->first('colors') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="birthdate[]">Birthdate</label>
											<input class="form-control" type="date" name="birthdate[]" value="{{ old('brithdate[]') }}" />
											<small class="text-danger small">{{ $errors->first('birthdate.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="species">Species</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="species[]" value="{{ old('species[]') }}">
													<option selected value="">Choose species..</option>
													<option value="cat">Cat</option>
													<option value="dog">Dog</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('species.*') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="gender[]">Gender</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="gender[]" value="{{ old('gender[]') }}">
													<option selected value="">Choose gender..</option>
													<option value="female">Female</option>
													<option value="male">Male</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('gender.*') }}</small>
										</div>

										<div class="col-12 col-md-12 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="types[]">Types</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="types[]" value="{{ old('types[]') }}">
													<option selected value="">Choose types..</option>
													<option value="tame">Tame</option>
													<option value="wild">Wild</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('types.*') }}</small>
										</div>
										
										{{-- traits --}}
										<div class="col-12 col-md-12 col-lg-12 mx-auto">
											<label class="important font-weight-bold" for="traits[]">Unique Traits/Feature</label>
											<textarea class="form-control my-2 not-resizable" name="traits[]" rows="3">{{ old("traits.0") }}</textarea>
											<small class="text-danger small">{{ $errors->first('traits.0') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="pet_status[]">Pet Status</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="pet_status[]" value="{{ old('pet_status[]') }}">
													<option selected value="">Choose pet status..</option>
													<option value="alive">Alive</option>
													<option value="deceased">Deceased</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('pet_status.*') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="important font-weight-bold" for="lifespan[]">Expected Life Span</label>
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
			<div class="col-lg-12 d-flex card-footer">
				<button class="btn btn-outline-info ml-auto mr-1 w-25 mb-5" type="submit" data-action="submit"  data-type="submit">Save</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('pets.registration',[$user->id]) }}');" class="btn btn-outline-danger mr-auto mr-1 w-25 mb-5">Cancel</a>
			</div>
		</div>
	</form>

</div>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}"/>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/util/select.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
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
				<h5 class="card-header position-relative text-1"><span class="position-absolute" style="top: 0.115rem; right: 0.3rem; cursor: pointer;" onclick="$(this).parent().parent().parent().remove();"><i class="fas fa-multiply"></i></span></h5>
				<div class="card-body col-lg-12">
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
											<label class="font-weight-bold important" for="pet_name[]">Pet Name</label>
											<input class="form-control" type="text" name="pet_name[]"/>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="breed[]">Breed</label>
											<input class="form-control" type="text" name="breed[]" value="{{ old('breed[]') }}" />
										</div>

										{{-- COLORS --}}
										<div class="col-12 col-md-9 col-lg-12 mx-auto">
											<label class="font-weight-bold important" for="colors[]">Colors</label>
											<select class="select-choices" name="colors[${__iterator++}][]" placeholder="Select Pet color" multiple notInstantiated>
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
											<label class="font-weight-bold important" for="birthdate[]">Birthdate</label>
											<input class="form-control" type="date" name="birthdate[]"/>
											<small class="text-danger small">{{ $errors->first('birthdate') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="species[]">Species</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="species[]">
													<option selected value="">Choose species..</option>
													<option value="cat">Cat</option>
													<option value="dog">Dog</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="gender[]">Gender</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="gender[]">
													<option selected value="">Choose gender..</option>
													<option value="female">Female</option>
													<option value="male">Male</option>
												</select>
											</div>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="types[]">Types</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="types[]">
													<option selected value="">Choose types..</option>
													<option value="tame">Tame</option>
													<option value="wild">Wild</option>
												</select>
											</div>
										</div>

										{{-- traits --}}
										<div class="col-12 col-md-12 col-lg-12 mx-auto">
											<label class="important font-weight-bold" for="traits[]">Unique Traits/Feature</label>
											<textarea class="form-control my-2 not-resizable" name="traits[]" rows="3">{{ old("prescription.0") }}</textarea>
											<small class="text-danger small">{{ $errors->first('traits') }}</small>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="pet_status[]">Pet Status</label>
											<div class="input-group mb-3 ">
												<select class="custom-select" id="inputGroupSelect01" name="pet_status[]" value="{{ old('pet_status[]') }}">
													<option selected value="">Choose pet status..</option>
													<option value="alive">Alive</option>
													<option value="deceased">Deceased</option>
												</select>
											</div>
											<small class="text-danger small">{{ $errors->first('pet_status') }}</small>
										</div>

										<div class="col-12 col-md-9 col-lg-6 mx-auto">
											<label class="font-weight-bold important" for="lifespan[]">Expected Life Span</label>
											<input class="form-control" type="text" name="lifespan[]" value="{{ old('lifespan[]') }}" />
											<small class="text-danger small">{{ $errors->first('lifespan') }}</small>
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