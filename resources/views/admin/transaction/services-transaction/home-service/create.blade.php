@extends('layouts.admin')

@section('title', 'Home Service Transaction')

@section('content')
<div class="container-fluid m-0">
<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>

	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row">
		<div class="col-12 col-lg-12 col-md-12">
			<div class="card my-3 mx-auto">
				<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>CREATE TRANSACTION</h3>

					{{-- REFERENCE NO --}}
				<div class="card-body row">
					<div class="form-group col-6 col-lg-4 col-md-4 ml-auto">
						<label class="important font-weight-bold text-1" for="refno">Reference No</label>
						<input class="form-control" type="text" name="refno" value="{{old('refno')}} " />
					</div>

					 {{-- MODE OF PAYMENT --}}
					<div class="form-group col-6 col-lg-4 col-md-4 mr-auto">
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
										<label for="cost[]" class="form-label important text-1 font-weight-bold">Cost</label>
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

									{{-- TOTAL COST --}}
									<div class="col-12 col-lg-4 col-md-4 mx-auto ">
										<label class="important  font-weight-bold text-1" for="total[]">Total Cost</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>
											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="total[]" class="form-control">
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
@endsection