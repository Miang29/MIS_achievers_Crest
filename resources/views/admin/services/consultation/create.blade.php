@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="h5 h2-lg text-center text-lg-left mx-0 mx-lg-5 my-4 "><a href="{{route('consultation')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Consultation</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">
			<div class="card my-3 mx-auto">
				<h5 class="card-header text-center text-white bg-1">Client's Pet Consultation</h5>
				<div class="card-body d-flex">
					<div class="form-group col-6 mx-auto w-50">

						<label class="h6" for="petowner">Pet Owner<span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<select class="custom-select  text-1" id="inputGroupSelect01">
								<option selected name="petowner" value="{{old('petowner')}}"></option>
							</select>
						</div>

						<label class="h6" for="petname">Pet Name<span class="text-danger">*</span></label>
						<div class="input-group mb-3">
							<select class="custom-select  text-1" id="inputGroupSelect01">
								<option selected name="petname" value="{{old('petname')}}"></option>
							</select>
						</div>
							
						<label class="h6" for="address">Address<span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="address" value="{{old('address')}}" readonly />

						<label class="h6" for="telephone">Date<span class="text-danger">*</span></label>
						<input class="form-control" type="date" name="date" value="{{old('date')}} " />

						<label class="h6" for="temparature">Wt. Temparature<span class="text-danger">*</span></label>
						<input class="form-control" type="text" name="temparature" value="{{old('temparature')}}" />

						<label class="h6" for="findings">Findings<span class="text-danger"></span></label>
						<input class="form-control my-1" type="text" name="findings" value="{{old('findings')}}" />
					</div>

					<div class="form-group col-6 mx-auto w-50 ">

						<label class="h6" for="treatment">Treatment<span class="text-danger"></span></label>
						<input class="form-control  my-1" type="text" name="treatment" value="{{old('treatment')}}" />

						<label class="h6" for="procedure">Procedure<span class="text-danger"></span></label>
						<input class="form-control  my-1" type="text" name="procedure" value="{{old('procedure')}} " />

						<label class="h6" for="amount">Amount<span class="text-danger">*</span></label>
						<input class="form-control  my-1" type="text" name="amount" value="{{old('amount')}}" />

						<label class="h6" for="remarks">Remarks<span class="text-danger">*</span></label>
						<textarea class="form-control  my-1" type="text" name="remarks" value="{{old('remarks')}}" rows="4"></textarea>


						<button class="btn btn-info font-weight-bold text-white mt-4  w-100"><a href="#"></a>View Clinical History</button>

					</div>

				</div>
				<div class="col-12 my-2 d-flex flex-row">
					<button class="btn btn-outline-info ml-auto mr-4 w-25"><a href="#"></a>Save</button>
					<button class="btn btn-outline-danger ml-1 mr-auto w-25"><a href="#"></a>Cancel</button>
				</div>
			</div>
		</div>
	</div>

	@endsection