@extends('layouts.admin')

@section('title', 'Create Other Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	<form class="card mx-auto" method="POST" action="{{ route('submit.other.transaction')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3 class="font-weight-bold text-dark text-center mt-5">Create Home Service Transaction</h3>

		<div class="col-12 col-md-12 col-lg-12 mx-auto">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text bg-white" for="inputGroupSelect01">Client Name</label>
				</div>

				<select class="custom-select" id="inputGroupSelect01" name="client_name">
				{{-- 	@foreach($owner as $u)
					<option value="{{ $u->id }}">{{$u->getName()}}</option>
					@endforeach --}}
				</select>
				<small class="text-danger small">{{ $errors->first('client_name') }}</small>
			</div>
		</div>

		<div class="col-12 col-md-12 col-lg-12 mx-auto">
			<div class="col-12 col-md-12 col-lg-12 mx-auto">
				{{-- ARRAY FORM --}}
				<div class="card-body" >
					<div class="row "id="form-area-homeservice"  >
				 		<div class="col-12 col-md-12 col-lg-6 border border-secondary homeservice position-relative" id="orig-homeservice">
				 			{{-- PET INFORMATION --}}
						<h5 class="font-weight-bold mt-3">Pet Information</h5>
							<div class="card col-lg-12 col-md-12 col-12 mb-3">
								<div class="row">
									<div class="col-12 col-md-12 col-lg-12 mt-3">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<label class="input-group-text bg-white" for="inputGroupSelect01">Pet Name</label>
											</div>
											<select class="custom-select" id="inputGroupSelect01" name="pet_name">
													{{-- @foreach($owner as $u)
													<optgroup label="{{$u->getName()}}">
														@foreach($u->petsInformations as $p)
														<option selected  value="{{$p->id}}">{{$p->pet_name}}</option>
														@endforeach
													</optgroup>
													@endforeach --}}
											</select>
										</div>
										<small class="text-danger small">{{ $errors->first('pet_name') }}</small>
									</div>
									<div class="col-12 col-md-12 col-lg-6 mb-3">
										<label class="important my-2" for="breed[]">Breed</label>
										<input class="form-control" type="text" name="breed" value="{{ old('breed') }}" />
										<small class="text-danger small">{{ $errors->first('breed.*') }}</small>
									</div>
									<div class="col-12 col-md-12 col-lg-6 mb-3">
										<label class="important my-2" for="birthdate[]">Birthdate</label>
										<input class="form-control" type="date" name="birthdate[]" value="{{ old('birthdate[]') }}" />
										<small class="text-danger small">{{ $errors->first('birthdate.*') }}</small>
									</div>
								</div>
							</div>

							{{-- SERVICE TYPE --}}
							<h5 class="font-weight-bold mt-3">Services</h5>
							<div class="col-lg-12 col-md-12 col-12 mt-3 mx-auto ">
								<label class="important" for="variation_id[]">Service Name</label>
								<div class="input-group mb-3">
									<select class="custom-select text-1" name="variation_id[]"id="inputGroupSelect01">
									@foreach($services as $s)
									<option value="{{$s->id}}">{{$s->service_name}}</option>
									@endforeach
									</select>
								</div>
							</div>

							<div class="card col-lg-12 col-md-12 col-12 my-2">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-12 mt-3 mx-auto ">
										<label class="important" for="variation_id[]">Service Variations</label>
										<div class="input-group mb-3">
											<select class="custom-select text-1" name="variation_id[]"id="inputGroupSelect01">
											@foreach($services as $s)
												@foreach($s->variations as $v)
												<option selected name="style" data-price="{{$v->price}}" value="{{$v->id}}">{{ $v->variation_name }}</option>
												@endforeach
											@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>

							{{-- PRICES --}}
							<div class="card col-lg-12 col-md-12 col-12 my-2">
								<div class="row">
									{{-- PRICE --}}
									<div class="col-12 col-lg-6 col-md-4 mx-auto mb-3">
										<label for="price[]" class="form-label important">Price</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="price[]" class="form-control" readonly>
												</div>
											</div>
										</div>
									</div>

									{{-- ADDITIONAL COST --}}
									<div class="col-12 col-lg-6 col-md-4 mx-auto mb-3">
										<label class="important" for="additional_cost[]">Additional Cost</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="additional_cost[]" class="form-control">
												</div>
											</div>
										</div>
									</div>

									{{-- TOTAL --}}
									<div class="col-12 col-lg-12 col-md-4 mx-auto mb-3">
										<label class="important" for="subtotal[]">Sub Total</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>
											
											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="subtotal[]" class="form-control" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
				 		</div>
				 	</div>
					{{-- ADD --}}
					<div class="form-group col-lg-12 col-md-12 col-12 mt-3 mx-auto">
						<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addhomeservice">
							<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Transaction</span>
						</button>
					</div>

					{{-- PAYMENT METHOD --}}
					<h5 class="font-weight-bold mt-3">Payment Method</h5>
					<div class=" card col-lg-12 col-12 col-md-12">

						<div class="row">
							{{-- REFERENCE NO --}}
							<div class="form-group col-12 col-lg-6 col-md-12 mx-auto">
								<label class="important font-weight-bold text-1" for="reference_no">Reference No</label>
								<input class="form-control" type="text" name="reference_no" />
								<small class="text-danger small">{{ $errors->first('reference_no') }}</small>
							</div>

							{{-- MODE OF PAYMENT --}}
							<div class="form-group col-12 col-lg-6 col-md-12">
								<label class="important font-weight-bold text-1" for="mode_of_payment">Mode of Payment</label>
								<select id="select" class="form-control" name="mode_of_payment">
									<option value="">Select mode of payment</option>
									<option value="cash">Cash</option>
									<option value="paymaya">Paymaya</option>
									<option value="gcash">Gcash</option>
								</select>
								<small class="text-danger small">{{ $errors->first('mode_of_payment') }}
							</div>
						</div>
						{{-- USE MODAL UPON UPDATING QR CODE INFO --}}
						<div class="row">
							<div class="col-lg-4 col-12 col-md-12 mb-3 border border-secondary mx-auto" style=" background: linear-gradient(to bottom, #00cc99 0%, #00cc99 100%);">
								<div class="position-absolute border rounded input m-0 mt-2" style="top: -1rem; right: -1rem;">
									<a href="#" class="btn btn-md bg-white border-light"><i class="fa-solid fa-pen text-black"></i></a>
									
								</div>

								<h6 class="font-weight-bold mt-3 text-center text-dark">Pay using maya QR code</h6>
								<img src="{{ asset('uploads/settings/maya_qr.jpg') }}" class="card ml-5">
								<h6 class="font-weight-bold mt-2 text-center text-dark">09267785567</h6>
								<h6 class="font-weight-bold mt-1 text-center text-dark">Juan D.</h6>
							</div>

							<div class="col-lg-4 col-12 col-md-12 mb-3 border border-secondary mx-auto" style=" background: linear-gradient(to bottom, #0000ff 0%, #0066ff 100%);">
								<div class="position-absolute border rounded input m-0 mt-2" style="top: -1rem; right: -1rem;">
									<a href="#" class="btn btn-md bg-white border-light"><i class="fa-solid fa-pen text-black"></i></a>
								</div>
								<h6 class="font-weight-bold mt-3 text-center text-white">Pay using gcash QR code</h6>
								<img src="{{ asset('uploads/settings/gcash_qr.jpg') }}" class="card ml-5">
								<h6 class="font-weight-bold text-center text-dark">09260073317</h6>
								<h6 class="font-weight-bold text-center text-dark">Juan D.</h6>
							</div>
						</div>
					</div>

					{{-- TOTAL --}}
					<h5 class="font-weight-bold mt-3 text-dark">Total</h5>
					<div class=" card col-lg-12 col-12 col-md-12 changes">
						<div class="row my-3">
							{{-- TOTAL --}}
							<div class="col-12 col-lg-4 col-md-12 mx-auto">
								<label class="important  font-weight-bold text-1" for="total_amt">Total</label>
								<div class="input-group flex-nowrap">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									
									<div class="input-group-append flex-fill">
										<div class="input-group">
											<input type="number" data-type="currency" name="total_amt" class="form-control" readonly>
										</div>
									</div>
								</div>
							</div>

							{{-- AMOUNT --}}
							<div class="col-12 col-lg-4 col-md-12 mx-auto">
								<label class="important  font-weight-bold text-1" for="amount">Amount</label>
								<div class="input-group flex-nowrap">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									
									<div class="input-group-append flex-fill">
										<div class="input-group">
											<input type="number" data-type="currency" name="amount" class="form-control">
										</div>
									</div>
								</div>
							</div>

							{{-- Change --}}
							<div class="col-12 col-lg-4 col-md-12 mx-auto">
								<label class="important  font-weight-bold text-1" for="change">Change</label>
								<div class="input-group flex-nowrap">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									
									<div class="input-group-append flex-fill">
										<div class="input-group">
											<input type="number" data-type="currency" name="change" class="form-control" readonly>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				 </div>
			</div>
		</div>
		<div class="card-footer d-flex flex-column">
			<div class="col-4 my-2 mx-auto text-center">
				<button type="submit" class="btn btn-outline-info btn-sm w-25" data-action="submit" data-type="submit">Enter</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('transaction.service') }}');" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addhomeservice', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig-homeservice");
			let container = $("#form-area-homeservice");
			let formCopy = form.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -1.125rem;">
				<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
				`);

			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			container.append(formCopy);
		
			triggerAllListeners();
		});

			// Updates the price of the card
			$(document).on('change', '[name="variation_id[]"]', (e) => {
				let obj = $(e.target);
				let price = obj.find(":selected").attr("data-price");
				let target = $(obj.closest(".homeservice").find(`[name="price[]"]`)[0]);

				target.val(price)
					.trigger('change');
			});


			// Updates the total of the card
			$(document).on('change', `[name="price[]"], [name="additional_cost[]"]`, (e) => {
				let root = $(e.target).closest(".homeservice");
				let price = parseFloat($(root.find(`[name="price[]"]`)[0]).val());
				let additional = parseFloat($(root.find(`[name="additional_cost[]"]`)[0]).val());
				let total = $(root.find(`[name="subtotal[]"]`)[0]);

				price = isNaN(price) ? 0.0 : price;
				additional = isNaN(additional) ? 0.0 : additional;

				total.val((price + additional).toFixed(2))
					.trigger('change');
			});

			// Update the grand total
			$(document).on('change', `[name="subtotal[]"]`, (e) => {
				let total = $(`[name="subtotal[]"]`);
				let grandTotal = $(`[name="total_amt"]`);
				let gt = 0;

				for (let i of total)
					gt += parseFloat($(i).val());

				grandTotal.val(gt.toFixed(2));
			});

			// Update the Change
			$(document).on('change',`[name="total_amt"], [name="amount"]`, (e) => {
				let root = $(e.target).closest(".changes");
				let totalAmount = parseFloat($(root.find(`[name="total_amt"]`)[0]).val());
				let amount = parseFloat($(root.find(`[name="amount"]`)[0]).val());
				let change = $(root.find(`[name=change]`)[0]);

				totalAmount = isNaN(totalAmount) ? 0.0 : totalAmount;
				amount = isNaN(amount) ? 0.0 : amount;

				change.val((amount - totalAmount).toFixed(2))
					.trigger('change');
			});


			triggerAllListeners();
		});

	function triggerAllListeners() {
			$('[name="variation_id[]"], [name="price[]"]').trigger('change');
		
		}
</script>
@endsection