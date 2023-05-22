@extends('layouts.admin')

@section('title', 'Create Other Transaction')

@section('content')
<div class="container-fluid m-0">
	<h3 class="mt-3"><a href="{{route('transaction.service')}}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Service Transaction List</a></h3>
	<hr class="hr-thick" style="border-color: #707070;">
	<form class="card mx-auto" method="POST" action="{{ route('submit.other.transaction')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<h3 class="card-header text-white gbg-1"><i class="fa-solid fa-square-plus mr-2 fa-lg"></i>Other Transaction</h3>

		{{-- REFERENCE NO --}}
		<div class="col-lg-12 col-12 col-md-12 mt-3 row">
			<div class="form-group col-6 col-lg-6 col-md-4 ml-auto">
				<label class="important font-weight-bold text-1" for="reference_no">Reference No</label>
				<input class="form-control" type="text" name="reference_no"/>
				<small class="text-danger small">{{ $errors->first('reference_no') }}</small>
			</div>

			{{-- MODE OF PAYMENT --}}
			<div class="form-group col-6 col-lg-6 col-md-4 mr-auto">
				<label class="important font-weight-bold text-1" for="select">Mode of Payment</label>
				<select id="select" class="form-control" name="mode_of_payment">
					<option value="">Select mode of payment</option>
					<option value="cash">Cash</option>
					<option value="paymaya">Paymaya</option>
					<option value="gcash">Gcash</option>
				</select>
				<small class="text-danger small">{{ $errors->first('mode_of_payment') }}
			</div>
		</div>

		<div class="card-body col-lg-12 col-12 col-md-12 mx-auto" id="form-area-other">
			<div class="other position-relative border border-secondary col-lg-12 col012 col-md-12 mb-3" id="orig-other">
				<div class="row">
					{{-- PET NAME  --}}
					<div class="col-lg-4 col-md-6 col-6 mt-3">
						<label class="important font-weight-bold text-1" for="pet_name[]">Pet Name</label>
						<div class="input-group mb-3">
							<select class="custom-select text-1" name="pet_name[]" id="inputGroupSelect01">
							@foreach($owner as $u)
							<optgroup label="{{$u->getName()}}">
								@foreach($u->petsInformations as $p)
								<option selected  value="{{$p->id}}">{{$p->pet_name}}</option>
								@endforeach
							</optgroup>
							@endforeach
							</select>
						</div>
					</div>

					{{-- SERVICES  --}}
					<div class="col-lg-4 col-md-6 col-6 mt-3">
						<label class="important font-weight-bold text-1" for="style">Services</label>
						<div class="input-group mb-3">
							<select class="custom-select text-1" name="variation_id[]" id="inputGroupSelect01">
								@foreach($services as $s)
								<optgroup label="{{$s->service_name}}">
									@foreach($s->variations as $v)
									<option selected name="style" data-price="{{$v->price}}" value="{{$v->id}}">{{ "{$s->service_name} - {$v->variation_name}" }}</option>
									@endforeach
								</optgroup>
								@endforeach
							</select>
						</div>
					</div>

					{{-- Price --}}
					<div class="col-lg-4 col-md-6 col-6 mt-3 ">
						<label class="important font-weight-bold text-1" for="price[]">Price</label>
						<input type="number" class="form-control" name="price[]" aria-label="currency" aria-describedby="basic-addon1" readonly>
					</div>

				</div>
			</div>
		</div>

		{{-- TOTAL AMOUNT --}}
		<div class="col-12 col-lg-4 col-md-4 ml-auto mb-3">
			<label class="important  font-weight-bold text-1" for="total_amt">Total Amount</label>
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


		<div class="card-footer d-flex flex-column">
			 <div class="form-group col-6 mx-auto">
				<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .25rem;" id="addother">
					<span class="m-auto font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Pet</span>
				</button>
			</div> 

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
		$(document).on('click', '#addother', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#orig-other");
			let container = $("#form-area-other");
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
				console.log(price);
				let target = $(obj.closest(".other").find(`[name="price[]"]`)[0]);

				target.val(price)
					.trigger('change');
			});

			// Update the grand total
			$(document).on('change', `[name="price[]"]`, (e) => {
				let total = $(`[name="price[]"]`);
				let grandTotal = $(`[name="total_amt"]`);
				let gt = 0;

				for (let i of total)
					gt += parseFloat($(i).val());

				grandTotal.val(gt.toFixed(2));
			});

			triggerAllListeners();
		});

	function triggerAllListeners() {
			$('[name="variation_id[]"], [name="price[]"]').trigger('change');
		
		}
</script>
@endsection