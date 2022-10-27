@extends('layouts.admin')

@section('title', 'Reservation')

@section('content')
<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('reservation')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Reservation</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
				<div class="card mx-auto">
					<h5 class="card-header text-center text-white bg-1">View Pet Information</h5>
					
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-lg-6 d-flex">
								<div class="form-group text-center text-lg-left mx-auto image-input-group">
									<label class="h2 text-1 ml-5" for="image">Pet Image</label><br>
									<img src="{{ asset('images/UI/placeholder.jpg') }}" class="img-fluid cursor-pointer border" style="border-width: 0.25rem!important; max-height: 16.25rem;" alt="Pet Image">
									<br><br>
									<a href="" class="btn btn-info bg-1 w-100"><i class="fa-regular fa-eye mr-2"></i>View History</a>

								</div>
							</div>

							<div class="col-12 col-lg-6">
								<div class="form-group ">
									<label class="h7" for="petname">Pet Name<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="petname[]"readonly/>

									<label class="h7" for="breed">Breed<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="breed[]"readonly/>

									<label class="h7" for="color">Color/s<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="color[]"readonly/>

									<label class="h7" for="color">Birthdate<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="bday[]"readonly/>

									<label class="h7" for="color">Species<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="species[]"readonly/>

									<label class="h7" for="color">Gender<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="gender[]"readonly/>

									<label class="h7" for="color">Types<span class="text-danger"></span></label>
									<input class="form-control" type="text" name="types[]"readonly/>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection