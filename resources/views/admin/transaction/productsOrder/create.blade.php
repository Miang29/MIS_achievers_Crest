@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route ('transaction.products-order') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Order List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">


		<form class="card my-3 mx-auto" method="POST" action="{{ route('transaction.submit.order') }}" 		enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
			<div class="card-body">
				<h3 class="font-weight-bold text-center">Create Products Transaction</h3>
				<div class="col-12 col-md-12 col-lg-12 mx-auto border border-secondary">
					<div class="card-body">
					<h5 class="font-weight-bold mt-3">Product Order</h5>
						<div class="row" id="form-area">
				 			<div class="product col-12 col-md-12 col-lg-5 mr-4 ml-5 my-2 position-relative border border-secondary-light" id="orig">
				 				<div class="col-lg-12 col-md-12 col-12 my-3 border border-secondary-light">
					 				<div class="row">
				 						{{-- PRODUCT NAME --}}
										<div class="col-lg-12 col-md-12 col-12 mt-3">
											<label class="important font-weight-bold text-1" for="product_name[]">Product Name</label>
											<div class="input-group mb-3">
												<select class="custom-select text-1" name="product_name[]" id="inputGroupSelect01">
													@foreach ($prodCat as $pc)
													<optgroup label="{{ $pc->category_name }}">
														@foreach ($pc->products as $p)
														<option data-price="{{ $p->price }}" value="{{ $p->product_name }}">{{ $p->product_name }}</option>
														@endforeach
													</optgroup>
													@endforeach
												</select>
											</div>
										</div>
										{{-- QUANTITY --}}
										<div class="col-lg-12 col-md-12 col-12 mb-3">
											<label class="important font-weight-bold text-1" for="quantity[]">Quantity</label>
											<input class="form-control" type="number" name="quantity[]" value="{{old('quantity.0')}}" min="1" />
										</div>
									</div>
								</div>

								<div class="col-lg-12 col-md-12 col-12 my-3 border border-secondary-light">
									<div class="row my-3">
										{{-- PRICE --}}
										<div class="col-lg-12 col-md-12 col-12">
											<label class="important font-weight-bold text-1" for="price[]">Price</label>
											<input class="form-control bg-light" type="number" name="price[]" value="{{old('price.0')}}" readonly />
										</div>

										{{-- TOTAL --}}
										<div class="col-lg-12 col-md-12 col-12">
											<label class="important font-weight-bold text-1" for="total[]">Sub Total</label>
											<input class="form-control bg-light" type="number" name="total[]" value="{{old('total.0')}}" readonly />
										</div>
									</div>
								</div>
				 			</div>
				 		</div>
				 	</div>

				 	<div class="form-group col-lg-6 col-12 col-md-8 mx-auto">
						<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addTrans">
							<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Product Field</span>
						</button>
					</div>

					{{-- PAYMENT METHOD --}}
					<h5 class="font-weight-bold mt-3">Payment Method</h5>
					
					<div class=" card col-lg-12 col-12 col-md-12 my-3">
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
					</div>

					{{-- TOTAL --}}
					<h5 class="font-weight-bold mt-3 text-dark">Total</h5>
					<div class=" card col-lg-12 col-12 col-md-12 changes my-3">
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
			<div class="card-footer d-flex flex-column">
				<div class="col-12 my-2 mx-auto text-center flex-row">
					<button type="submit" class="btn btn-outline-info btn-sm w-25" data-action="submit" data-type="submit">Save</button>
					<a href="javascript:void(0);" onclick="confirmLeave('{{ route('transaction.products-order') }}');" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
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
		$(document).on('click', '#addTrans', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig");
			let container = $("#form-area");
			let formCopy = form.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -0.6rem;">
					<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
			`);

			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			container.append(formCopy);
		});

		// Updating prices
		$(document).on('change', `[name="product_name[]"]`, (e) => {
			let obj = $(e.target);
			let price = obj.find("option:selected").attr('data-price');

			obj.closest('.product').find(`[name="price[]"]`).val(price);
		});

		// Updating total
		$(document).on('change', `[name="product_name[]"], [name="quantity[]"]`, (e) => {
			setTimeout(() => {
				let obj = $(e.target).closest(".product");
				let price = obj.find(`[name="price[]"]`).val();
				let quantity = obj.find(`[name="quantity[]"]`).val();

				price = price.length > 0 ? price : undefined;
				quantity = quantity.length > 0 ? quantity : undefined;

				price = typeof price == 'string' ? parseInt(price) : price;
				quantity = typeof quantity == 'string' ? parseInt(quantity) : quantity;

				price = typeof price == 'number' ? price : 0;
				quantity = typeof quantity == 'number' ? quantity : 0;

				obj.find(`[name="total[]"]`).val(price * quantity);

				$("[name=total_amt]").trigger('change');
			}, 500);
		});
		// 
		
		// Updating final total
		$("[name=total_amt]").on("change", (e) => {
			let total = 0;
			$(`[name="total[]"]`).each((k, v) => {
				let price = $(v).val();

				price = price.length > 0 ? price : undefined;

				price = typeof price == 'string' ? parseInt(price) : price;

				price = price == NaN ? 0 : price;

				price = typeof price == 'number' ? price : 0;

				total += price;
			});

			$(e.target).val(total);
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


		// Sets an value
		$(`[name="quantity[]"]`).val(1);

		// Triggers the update
		$(`[name="product_name[]"]`).trigger('change');
	});
</script>
@endsection