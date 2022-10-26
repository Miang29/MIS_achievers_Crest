@extends('layouts.admin')

@section('title', 'Reservation')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{route('reservation')}}" class="text-decoration-none text-dark"><i class="fas fa-chevron-left mr-2"></i>Reservation</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
				<div class="card mx-auto">
					<h5 class="card-header text-center">View Pet Informatation</h5>
					
					<div class="card-body d-flex">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="form-group text-center text-lg-left w-100 image-input-group" style="max-height: 20rem;">
									<label class="h5" for="image">Pet Image</label><br>
									<img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
									<br><br>
									<input type="file" name="image[]" class="hidden" accept=".jpg,.jpeg,.png"><br>
									<small class="text-muted"><b>FORMATS ALLOWED:</b> JPEG, JPG, PNG</small>
								</div>
							</div>

							<div class="col-12 col-lg-6">
								<div class="form-group ">
									<label class="h7" for="petname">Pet Name<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="petname[]"/>

									<label class="h7" for="breed">Breed<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="breed[]"/>

									<label class="h7" for="color">Color/s<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="color[]"/>

									<label class="h7" for="bday">Birthdate<span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="bday[]"/>

									<div class="input-group mb-3 my-2">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected>Species</option>
											<option value="1">Cat</option>
											<option value="2">Dog</option>
										</select>
									</div>

									<div class="input-group mb-3 my-2">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected>Sex</option>
											<option value="1">Female</option>
											<option value="2">Male</option>
										</select>
									</div>

									<div class="input-group mb-3 my-2">
										<select class="custom-select" id="inputGroupSelect01">
											<option selected>Choose...</option>
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

@endsection