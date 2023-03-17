@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route ('transaction.products-order') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Order List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	<div class="row">
		<div class="col-12">
			<form class="card my-3 mx-auto" method="POST" action="{{ route('transaction.submit.order') }}" 		enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<h3 class="card-header font-weight-bold text-white gbg-2"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Products Order</h3>

				<div class="card-body">
					<div class="row">
						<div class="form-group col-lg-6 col-md-4 col-6 ml-auto">
							<label class="important font-weight-bold text-1" for="reference_no">Reference No</label>
							<input class="form-control " type="number" name="reference_no" value="{{old('reference_no')}} " />
							<small class="text-danger small">{{ $errors->first('reference_no') }}</small>
						</div>

					<div class="form-group col-lg-6 col-md-4 col-6 mr-auto">
						<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
						 <select id="select" name="mode_of_payment" class="form-control">
							<option selected value="">Select mode of payment</option>
							<option value="cash">Cash</option>
							<option value="paymaya">Paymaya</option>
							<option value="gcash">Gcash</option>
						</select>
						<small class="text-danger small">{{ $errors->first('mode_of_payment') }}</small>
					</div>
				</div>

					{{-- FORM AREA --}}
					<div class="row" id="form-area">
						<div class="col-12 col-lg-12 position-relative my-2" id="orig">
							<div class="card">
								<div class="card-body form-group col-12">
									<div class="row">
										{{-- PRODUCT NAME --}}
										<div class="col-lg-6 col-md-6 col-6">
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

										{{-- PRICE --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="price[]">Price</label>
											<input class="form-control bg-light" type="number" name="price[]" value="{{old('price.0')}}" readonly />
										</div>

										{{-- QUANTITY --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="quantity[]">Quantity</label>
											<input class="form-control" type="number" name="quantity[]" value="{{old('quantity.0')}}" min="1" />
										</div>

										{{-- TOTAL --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="total[]">Sub Total</label>
											<input class="form-control bg-light" type="number" name="total[]" value="{{old('total.0')}}" readonly />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					{{-- TOTAL AMOUNT --}}
					<div class="input-group mb-3 col-lg-4 col-md-6 col-6 ml-auto ">
						<div class="input-group-prepend">
							<span class="input-group-text font-weight-bold" id="total_amt">Total Amount</span>
						</div>
						<input type="text" class="form-control bg-light" aria-label="currency" name="total_amt" aria-describedby="currency" readonly>
					</div>
				</div>

				<div class="card-footer d-flex flex-column">
					<div class="form-group col-lg-6 col-12 col-md-8 mx-auto">
						<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addTrans">
							<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Product Field</span>
						</button>
					</div>

					<div class="col-12 my-2 mx-auto text-center flex-row">
						<button type="submit" class="btn btn-outline-info btn-sm w-25" data-action="submit" data-type="submit">Save</button>
						<a class="btn btn-outline-danger btn-sm w-25">Cancel</a>
					</div>
				</div>
			</form>
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

		// Updating prices
		$(document).on('change', `[name="product_name[]"]`, (e) => {
			let obj = $(e.target);
			let price = obj.find("option:selected").attr('data-price');

			obj.closest('.row').find(`[name="price[]"]`).val(price);
		});

		// Updating total
		$(document).on('change', `[name="product_name[]"], [name="quantity[]"]`, (e) => {
			setTimeout(() => {
				let obj = $(e.target).closest(".row");
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

		// Sets an value
		$(`[name="quantity[]"]`).val(1);

		// Triggers the update
		$(`[name="product_name[]"]`).trigger('change');
	});
</script>
@endsection