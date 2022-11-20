@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="my-3"><a href="{{ route('service_variation.index', [1, 1]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services Variation List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">
			<div class="card my-3 mx-auto">
				<h3 class="card-header  text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>EDIT SERVICE VARIATION ({{ $variation["service_name"] }})</h3>

				<form class="card-body" action="#" method="POST" enctype="multipart/form-data" class="form">
					{{ csrf_field() }}

					<div class="row">
						<div class="col-12 row" id="varContainer">
							{{-- DATA ITERATION (Printing old values) --}}
							<div class="card col-12 col-md-4 mx-auto p-3 border-0 position-relative">
								<div class="card-body border rounded border-width-medium border-color-1">
									<div class="form-group">
										<label for="variation" class="form-label important">Variation</label>
										<input type="text" name="variation" class="form-control" value="{{ $variation["variation_name"] }}">
									</div>

									<div class="form-group">
										<label for="price" class="form-label important">Price</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="price" class="form-control" min="0.00" max="4294967295.00" step="0.25" value="{{ number_format($variation["price"], 2) }}">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary quantity-increment"><i class="fas fa-plus"></i></button>
														<button type="button" class="btn btn-secondary quantity-decrement"><i class="fas fa-minus"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" name="remarks[]">Remarks</label>
										<textarea name="remarks[]" id="" rows="5" class="form-control not-resizable">{{ $variation["remarks"] }}</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<div class="card-footer d-flex">
					<div class="col-4 mx-auto text-center">
						<button class="btn btn-outline-info btn-sm w-50" type="submit">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('css')
<style type="text/css">
	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	/* Firefox */
	input[type=number][data-type=currency] {
		-moz-appearance: textfield;
	}
</style>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(() => {
		// Increment and Decrement price
		$(document).on('click', '.quantity-decrement:not(.disabled)', (e, elm) => {
			$(e.currentTarget).parent().parent().find('[name="price[]"]').trigger('change', ['-', elm]);
		}).on('mousedown', '.quantity-decrement:not(.disabled)', (e) => {
			let obj = $(e.currentTarget);
			let id = setInterval(() => {obj.trigger('click', [obj])}, 100);
			obj.attr('data-id', id);
		}).on('mouseup mouseleave', '.quantity-decrement:not(.disabled)', (e) => {
			let obj = $(e.currentTarget);
			let id = parseInt(obj.attr('data-id'));
			clearInterval(id);
			obj.removeAttr('data-id');
		});

		$(document).on('click', '.quantity-increment:not(.disabled)', (e, elm) => {
			$(e.currentTarget).parent().parent().find('[name="price[]"]').trigger('change', ['+', elm]);
		}).on('mousedown', '.quantity-increment:not(.disabled)', (e) => {
			let obj = $(e.currentTarget);
			let id = setInterval(() => {obj.trigger('click', [obj])}, 100);
			obj.attr('data-id', id);
		}).on('mouseup mouseleave', '.quantity-increment:not(.disabled)',  (e) => {
			let obj = $(e.currentTarget);
			let id = parseInt(obj.attr('data-id'));
			clearInterval(id);
			obj.removeAttr('data-id');
		});

		$(document).on('change', '[name="price[]"]', (e, operation, elm) => {
			let obj = $(e.currentTarget);
			let val = parseFloat(obj.val());

			if (val < 4294967295.0 && operation == '+') {
				val += 0.25;
				obj.val(val);
			}
			else if (val > 0.0 && operation == '-') {
				val -= 0.25;
				obj.val(val);
			}

			// Increment
			if (val >= 4294967295) {
				$(obj.parent().find('.quantity-increment')).addClass('disabled');
				obj.val(4294967295.0);
				
				if (typeof elm != 'undefined') {
					let id = parseInt(elm.attr('data-id'));
					clearInterval(id);
				}
			}
			else
				$(obj.parent().find('.quantity-increment')).removeClass('disabled');

			// Decrement
			if (val <= 0) {
				$(obj.parent().find('.quantity-decrement')).addClass('disabled');
				obj.val(0);

				if (typeof elm != 'undefined') {
					let id = parseInt(elm.attr('data-id'));
					clearInterval(id);
				}
			}
			else
				$(obj.parent().find('.quantity-decrement')).removeClass('disabled');
		}).trigger('change');
	});
</script>
@endsection