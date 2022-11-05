@extends('layouts.admin')

@section('title', 'clientprofile')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('client-profile')}}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i></a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<form class="form">
		<div class="row" id="form-area">
			<div class="col-12 ">
				<div class="card my-3 mx-auto  ">
					<h5 class="card-header text-center bg-1 text-white">Client Profile</h5>
					<div class="card-body d-flex ">
						<div class="form-group mx-auto w-50">
							<label class="h6 font-weight-bold text-1" for="petowner">Pet Owner<span class="text-danger">*</span></label>
							<input class="form-control " type="text" name="petowner" value="{{old('petowner')}}" />

							<label class="h6 font-weight-bold text-1" for="address">Address<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="address" value="{{old('address')}}" />

							<label class="h6 font-weight-bold text-1" for="email">Email<span class="text-danger">*</span></label>
							<input class="form-control" type="email" name="email" value="{{old('email')}}" />

							<label class="h6 font-weight-bold text-1" for="telephone">Telephone No<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="telephone" value="{{old('telephone')}}" />

							<label class="h6 font-weight-bold text-1" for="mobile">Mobile No<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="mobile" value="{{old('mobile')}}" />

							<label class="h6 font-weight-bold text-1" for="type">Type<span class="text-danger">*</span></label>
							<div class="input-group mb-3 my-2">
								<select class="custom-select" id="inputGroupSelect01">
									<option selected name="type"></option>
									<option value="1">Old</option>
									<option value="2">New</option>
								</select>
							</div>

						</div>
					</div>
				</div>
			</div>

			{{-- PET REGISTRATION FORM --}}
			<div class="col-6 my-2 mx-auto">
				<div class="card mx-auto">
					<h5 class="card-header text-center bg-1 text-white">Pet Profile</h5>
					
					<div class="card-body d-flex">
						<div class="row">
							<div class="col-6 col-lg-6">
								<div class="form-group text-center text-lg-left w-100 image-input-group" style="max-height: 20rem;">
									<label class="h2 ml-5" for="image">Pet Image</label><br>
									<img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
									<br><br>
									<input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
									<small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
								</div>
							</div>

							<div class="col-6 col-lg-6">
								<div class="form-group ">
									<label class="h6 font-weight-bold text-1" for="petname">Pet Name<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="petname[]"/>

									<label class="h6 font-weight-bold text-1" for="breed">Breed<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="breed[]"/>

									<label class="h6 font-weight-bold text-1" for="color">Color/s<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="color[]"/>

									<label class="h6 font-weight-bold text-1" for="bday">Birthdate<span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="bday[]"/>

									<label class="h6 font-weight-bold text-1" for="species">Species<span class="text-danger">*</span></label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="species[]"></option>
											<option value="1">Cat</option>
											<option value="2">Dog</option>
										</select>
									</div>

									<label class="h7 font-weight-bold text-1" for="gender">Gender<span class="text-danger">*</span></label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="gender[]"></option>
											<option value="1">Female</option>
											<option value="2">Male</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1" for="types">Types<span class="text-danger">*</span></label>
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
		
		<div class="row card-footer">
			<div class="col-12 my-3 d-flex flex-row">
				<button class="btn btn-outline-info ml-auto mr-1 w-25"><a href="#"></a>Save</button>
				<button class="btn btn-outline-danger ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
			</div>
		</div>
	</form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	const addForm = (listener, targetR) => {
		let obj = $(listener);
		let target = $(targetR);

		const form = $(`
		<div class="col-6 my-2 mx-auto">
			<div class="card mx-auto">
				<h5 class="card-header text-center position-relative bg-1 text-white">Pet Registration<span class="position-absolute" style="top: 0.125rem; right: 0.5rem; cursor: pointer;" onclick="$(this).parent().parent().parent().remove();"><i class="fas fa-multiply"></i></span></h5>
				
				<div class="card-body d-flex">
					<div class="row">
						<div class="col-6 col-lg-6">
							<div class="form-group text-center text-lg-left w-100 image-input-group" style="max-height: 20rem;">
								<label class="h5 " for="image">Pet Image</label><br>
								<img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
								<br><br>
								<input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
								<small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
							</div>
						</div>

						<div class="col-6 col-lg-6">
							<div class="form-group ">
								<label class="h6 font-weight-bold text-1" for="petname">Pet Name<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="petname[]"/>

								<label class="h6 font-weight-bold text-1" for="breed">Breed<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="breed[]"/>

								<label class="h6 font-weight-bold text-1" for="color">Color/s<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="color[]"/>

								<label class="h6 font-weight-bold text-1" for="bday">Birthdate<span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="bday[]"/>

								<label class="h6 font-weight-bold text-1" for="species">Species<span class="text-danger">*</span></label>
									<div class="input-group mb-3">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="species[]"></option>
											<option value="1">Cat</option>
											<option value="2">Dog</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1" for="gender">Gender<span class="text-danger">*</span></label>
									<div class="input-group mb-3 ">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected name="gender[]"></option>
											<option value="1">Female</option>
											<option value="2">Male</option>
										</select>
									</div>

									<label class="h6 font-weight-bold text-1" for="types">Types<span class="text-danger">*</span></label>
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
		</div>`);

		target.append($(form))
			.append(obj.parent());

		form.find('img').on('error', fallbackImageOnErrorReplace);
	};
</script>
@endsection