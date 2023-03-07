@extends('layouts.admin')

@section('title', 'Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>

	<hr class="hr-thick" style="border-color: #707070;">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="consultation-tab" data-toggle="tab" href="#consultation" role="tab" aria-controls="consultation" aria-selected="true"><i class="fa-solid fa-stethoscope mr-2"></i>Consultation</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="vaccination-tab" data-toggle="tab" href="#vaccination" role="tab" aria-controls="vaccination" aria-selected="false"><i class="fa-solid fa-syringe mr-2"></i>Vaccination</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="grooming-tab" data-toggle="tab" href="#grooming" role="tab" aria-controls="grooming" aria-selected="false"><i class="fa-solid fa-scissors mr-2"></i>Grooming</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="boarding-tab" data-toggle="tab" href="#boarding" role="tab" aria-controls="boarding" aria-selected="false"><i class="fa-solid fa-house-chimney mr-2"></i>Boarding</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="consultation" role="tabpanel" aria-labelledby="consultation-tab">
			<div class="row">
				<div class="col-12 col-lg-12 col-md-12">
					<div class="card mx-auto">
						<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Consulation Transaction</h3>

						{{-- REFERENCE NO --}}
						<div class="card-body row">
							<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
								<label class="important font-weight-bold text-1" for="refno">Reference No</label>
								<input class="form-control" type="text" name="refno" value="{{old('refno')}} " />
							</div>

							{{-- MODE OF PAYMENT --}}
							<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
								<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
								<select id="select" class="form-control">
									<option>Select mode of payment</option>
									<option>Cash</option>
									<option>Paymaya</option>
									<option>Gcash</option>
									<option>Credit Card</option>
								</select>
							</div>
						</div>

						<div class="card-body border-bottom border-secondary">
							<div class="row" id="form-area">
								<div class="col-12 col-lg-6 position-relative" id="orig">
									<div class="form-group border rounded p-3 border-secondary">
										{{-- SERVICE TYPE --}}
										<label class="important  font-weight-bold text-1" for="itemname">Services Type</label>
										<div class="input-group mb-3">
											<select class="custom-select  text-1" id="inputGroupSelect01">
												<option selected name="itemname" value="{{old('itemname')}}"></option>
											</select>
										</div>

										<div class="row">
											{{-- COST --}}
											<div class="col-12 col-lg-4 col-md-4 mx-auto ">
												<label for="cost[]" class="form-label important text-1 font-weight-bold">Price</label>
												<div class="input-group flex-nowrap">
													<div class="input-group-prepend">
														<span class="input-group-text">₱</span>
													</div>
													<div class="input-group-append flex-fill">
														<div class="input-group">
															<input type="number" data-type="currency" name="cost[]" class="form-control" readonly>
														</div>
													</div>
												</div>
											</div>

											{{-- ADDITIONAL COST --}}
											<div class="col-12 col-lg-4 col-md-4 mx-auto ">
												<label class="important  font-weight-bold text-1" for="addcost[]">Additional Cost</label>
												<div class="input-group flex-nowrap">
													<div class="input-group-prepend">
														<span class="input-group-text">₱</span>
													</div>
													<div class="input-group-append flex-fill">
														<div class="input-group">
															<input type="number" data-type="currency" name="addcost[]" class="form-control">
														</div>
													</div>
												</div>
											</div>

											{{-- TOTAL --}}
											<div class="col-12 col-lg-4 col-md-4 mx-auto ">
												<label class="important  font-weight-bold text-1" for="total[]">Total</label>
												<div class="input-group flex-nowrap">
													<div class="input-group-prepend">
														<span class="input-group-text">₱</span>
													</div>
													<div class="input-group-append flex-fill">
														<div class="input-group">
															<input type="number" data-type="currency" name="total[]" class="form-control" readonly>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											{{-- DATE --}}
											<div class="col-lg-6 col-6 col-md-6">
												<label class="important font-weight-bold my-2 text-1" for="date">Date</label>
												<input class="form-control" type="date" name="date" value="{{old('date')}}" />
											</div>

											{{-- TIME --}}
											<div class="col-lg-6 col-6 col-md-6">
												<label class="important font-weight-bold my-2 text-1" for="time">Time</label>
												<input class="form-control" type="time" name="time" value="{{old('time')}}" />
											</div>
										</div>

										{{-- PET NAME  --}}
										<label class="h6 important font-weight-bold my-2 text-1" for="name">Pet Name</label>
										<div class="input-group mb-3">
											<select class="custom-select  text-1" id="inputGroupSelect01">
												<option selected name="itemname" value="{{old('itemname')}}"></option>
											</select>
										</div>

										{{-- WEIGHT --}}
										<div class="row">
											<div class="col-lg-6 col-6 col-md-6">
												<label class="important font-weight-bold my-2 text-1" for="weight">Weight</label>
												<input class="form-control" type="text" name="weight" value="{{old('weight')}}" />
											</div>

											{{-- TEMPARATURE --}}
											<div class="col-lg-6 col-6 col-md-6">
												<label class="important font-weight-bold my-2 text-1" for="temp">Temparature</label>
												<input class="form-control" type="text" name="tem" value="{{old('temp')}} " />
											</div>
										</div>

										<div class="row">
											{{-- CLINICAL HISTORY --}}
											<div class="col-12 col-lg-6 col-md-6 ml-auto">
												<label class="important font-weight-bold my-2 text-1" for="history">Clinical History</label>
												<textarea class="form-control my-2 not-resizable  border border-secondary" name="history" rows="5" placeholder=""></textarea>
											</div>

											{{-- TREATMENT --}}
											<div class="col-12 col-lg-6 col-md-6 mr-auto">
												<label class="important font-weight-bold my-2 text-1" for="treatment">Treatment</label>
												<textarea class="form-control my-2 not-resizable  border border-secondary" name="treatment" rows="5" placeholder=""></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-lg-4 col-md-4 ml-auto ">
								<label class="important  font-weight-bold text-1" for="total_price">Total Amount</label>
								<div class="input-group flex-nowrap">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									<div class="input-group-append flex-fill">
										<div class="input-group">
											<input type="number" data-type="currency" name="total_price" class="form-control" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card-footer d-flex flex-column">
							<div class="form-group col-6 mx-auto">
								<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addTrans">
									<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Service Field</span>
								</button>
							</div>

							<div class="col-4 my-2 mx-auto text-center">
								<button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
								<a href="#" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- VACCINATION --}}
		<div class="tab-pane fade" id="vaccination" role="tabpanel" aria-labelledby="vaccination-tab">
			<div class="card mx-auto">
				<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Vaccination Transaction</h3>

				{{-- REFERENCE NO --}}
				<div class="card-body row">
					<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
						<label class="important font-weight-bold text-1" for="refno">Reference No</label>
						<input class="form-control" type="text" name="refno" value="{{old('refno')}} " />
					</div>

					{{-- MODE OF PAYMENT --}}
					<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
						<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
						<select id="select" class="form-control">
							<option>Select mode of payment</option>
							<option>Cash</option>
							<option>Paymaya</option>
							<option>Gcash</option>
						</select>
					</div>
				</div>
				<div class="card-body col-lg-12" id="form-area-vaccination">
					<div class="row position-relative border border-secondary mb-3" id="orig-vaccine">

						{{-- PET NAME  --}}
						<div class="col-lg-4 col-md-6 col-6 mt-3">
							<label class="important font-weight-bold text-1" for="pet_name">Pet Name</label>
							<div class="input-group mb-3">
								<select class="custom-select text-1" id="inputGroupSelect01">
									<option selected name="pet_name" value="{{old('pet_name')}}"></option>
								</select>
							</div>
						</div>

						{{-- Vaccine Type --}}
						<div class="col-lg-4 col-md-6 col-6 mt-3">
							<label class="important font-weight-bold text-1" for="pet_name">Vaccine Type</label>
							<div class="input-group mb-3">
								<select class="custom-select text-1" id="inputGroupSelect01">
									<option selected name="vaccine_var" value="{{old('vaccine_var')}}"></option>
								</select>
							</div>
						</div>
						{{-- Expiration Date  --}}
						<div class="col-lg-2 col-md-6 col-6 mt-3">
							<label class="important font-weight-bold text-1" for="pet_name">Expiration Date</label>
							<input type="date" class="form-control" name="expire_date" aria-label="date" aria-describedby="basic-addon1">
						</div>

						{{-- Price --}}
						<div class="col-lg-2 col-md-6 col-6 mt-3">
							<label class="important font-weight-bold text-1" for="pet_name">Price</label>
							<input type="number" class="form-control" name="total_price" aria-label="total_price" aria-describedby="basic-addon1" readonly>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-4 col-md-4 ml-auto mb-5">
					<label class="important  font-weight-bold text-1" for="total_price">Total Amount</label>
					<div class="input-group flex-nowrap">
						<div class="input-group-prepend">
							<span class="input-group-text">₱</span>
						</div>
						<div class="input-group-append flex-fill">
							<div class="input-group">
								<input type="number" data-type="currency" name="total_price" class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer d-flex flex-column">
					<div class="form-group col-6 mx-auto">
						<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addVacc">
							<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Vaccination Field</span>
						</button>
					</div>

					<div class="col-4 my-2 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
						<a href="#" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
					</div>
				</div>
			</div>
		</div>

		{{-- PET GROOMING --}}
		<div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
			<div class="card mx-auto">
				<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Grooming Transaction</h3>

				{{-- REFERENCE NO --}}
				<div class="card-body row">
					<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
						<label class="important font-weight-bold text-1" for="refno">Reference No</label>
						<input class="form-control" type="text" name="refno" value="{{old('refno')}} " />
					</div>

					{{-- MODE OF PAYMENT --}}
					<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
						<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
						<select id="select" class="form-control">
							<option>Select mode of payment</option>
							<option>Cash</option>
							<option>Paymaya</option>
							<option>Gcash</option>
							<option>Credit Card</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		{{-- PET BOARDING --}}
		<div class="tab-pane fade" id="boarding" role="tabpanel" aria-labelledby="boarding-tab">
			<div class="card mx-auto">
				<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Boarding Transaction</h3>

				{{-- REFERENCE NO --}}
				<div class="card-body row">
					<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
						<label class="important font-weight-bold text-1" for="refno">Reference No</label>
						<input class="form-control" type="text" name="refno" value="{{old('refno')}} " />
					</div>

					{{-- MODE OF PAYMENT --}}
					<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
						<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
						<select id="select" class="form-control">
							<option>Select mode of payment</option>
							<option>Cash</option>
							<option>Paymaya</option>
							<option>Gcash</option>
							<option>Credit Card</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addTrans', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig");
			let container = $("#form-area");
			let formCopy = form.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -0.125rem;">
					<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
			`);

			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			container.append(formCopy);
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addVacc', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig-vaccine");
			let container = $("#form-area-vaccination");
			let formCopy = form.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -0.125rem;">
					<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
			`);

			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			container.append(formCopy);
		});
	});
</script>

@endsection