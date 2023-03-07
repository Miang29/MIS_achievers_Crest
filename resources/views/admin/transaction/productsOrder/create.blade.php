@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route ('transaction.products-order') }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Product Order List</a></h3>

	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row">
		<div class="col-12">
			<div class="card my-3 mx-auto ">
				<h3 class="card-header font-weight-bold text-white gbg-2"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Products Order</h3>

				<div class="card-body">
					<div class="row">
						<div class="form-group col-lg-6 col-md-4 col-6 ml-auto">
							<label class="important font-weight-bold text-1" for="refno">Reference No</label>
							<input class="form-control " type="text" name="refno" value="{{old('refno')}} " />
						</div>

						<div class="form-group col-lg-6 col-md-4 col-6 mr-auto">
							<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
							<select id="select" class="form-control">
								<option value="">Select mode of payment</option>
								<option>Cash</option>
								<option>Paymaya</option>
								<option>Gcash</option>
							</select>
						</div>
					</div>

					{{-- FORM AREA --}}
					<div class="row" id="form-area">
						<div class="col-12 col-lg-12 position-relative my-2" id="orig">
							<div class="card">
								<div class="card-body form-group col-12">
									<div class="row">
										{{-- PRODUCT NO. --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="itemno">No.</label>
											<input class="form-control bg-light" type="text" name="itemno" value="{{old('itemno')}}" readonly />
										</div>

										{{-- PRODUCT NAME --}}
										<div class="col-lg-4 col-md-6 col-6">
											<label class="important font-weight-bold text-1" for="itemname">Product Name</label>
											<div class="input-group mb-3">
												<select class="custom-select text-1" id="inputGroupSelect01">
													<option selected name="itemname" value="{{old('itemname')}}"></option>
												</select>
											</div>
										</div>

										{{-- PRICE --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="price">Price</label>
											<input class="form-control bg-light" type="text" name="price" value="{{old('price')}}" readonly />
										</div>
										{{-- QUANTITY --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="qty">Quantity</label>
											<input class="form-control" type="number" name="qty" value="{{old('qty')}}" />
										</div>
										{{-- TOTAL --}}
										<div class="col-lg-2 col-md-4 col-4">
											<label class="important font-weight-bold text-1" for="price">Total</label>
											<input class="form-control bg-light" type="text" name="total" value="{{old('total')}}" readonly />
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
							<span class="input-group-text font-weight-bold" id="price">Total Amount</span>
						</div>
						<input type="text" class="form-control bg-light" aria-label="total_price" aria-describedby="price" readonly>
					</div>
				</div>

				<div class="card-footer d-flex flex-column">
					<div class="form-group col-lg-6 col-12 col-md-8 mx-auto">
						<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addTrans">
							<span class="m-auto  font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Product Field</span>
						</button>
					</div>

					<div class="col-12 my-2 mx-auto text-center flex-row">
						<button class="btn btn-outline-info btn-sm w-25"><a href="#"></a>Save</button>
						<button class="btn btn-outline-danger btn-sm w-25"><a href="#"></a>Cancel</button>
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