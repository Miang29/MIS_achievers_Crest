@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<div class="container-fluid m-0">
	<h2 class="my-3"><a href="{{ route('service.index', [$id]) }}" class="text-decoration-none  text-1"><i class="fas fa-chevron-left mr-2"></i>Services List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<form class="form col-12 col-lg-12 col-md-12"  action="{{ route('submit-service-variation',[$id])}}" method="POST" enctype="multipart/form-data" >
			<div class="card my-3 mx-auto">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<h3 class="card-header  text-white gbg-1"><i class="fa-solid fa-square-plus mr-2"></i>CREATE SERVICE</h3>

				<div class="card-body">
					<div class="row">
						<div class="col-12 col-md-6 col-lg-12">
							<div class="input-group mb-3 col-lg-12">
								<div class="input-group-prepend">
									<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Service Name</label>
								</div>
								<select class="custom-select" name="service_name">
									@foreach ($services as $s)
									<option value="{{ $s->id }}">{{ $s->service_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-12 row" id="varContainer">
							{{-- DATA ITERATION (Printing old values) --}}
							@if (old('variation') != null && count(old('variation')) > 1)
							@for ($i = 0; $i < count(old('variation')); $i++) <div class="card col-12 col-md-4 p-3 border-0 position-relative" id="varOg">
								<div class="card-body border rounded border-width-medium border-color-1">
									<div class="form-group">
										<label for="variation[]" class="form-label important">Variation</label>
										<input type="text" name="variation[]" class="form-control" value="{{ old("variation.{$i}") }}">
										<small class="text-danger">{{ $errors->first("variation.*") }}</small>
									</div>

									<div class="form-group">
										<label for="price[]" class="form-label important">Price</label>
										<div class="input-group flex-nowrap">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>

											<div class="input-group-append flex-fill">
												<div class="input-group">
													<input type="number" data-type="currency" name="price[]" class="form-control" min="0.00" max="4294967295.00" step="0.25" value="{{ old("price.{$i}") ? old("price.{$i}") :  0 }}">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary quantity-increment"><i class="fas fa-plus"></i></button>
														<button type="button" class="btn btn-secondary quantity-decrement"><i class="fas fa-minus"></i></button>
													</div>
												</div>
											</div>
										</div>
										<small class="text-danger">{{ $errors->first('price.*') }}</small>
									</div>

									<div class="form-group">
										<label class="form-label" for="remarks[]">Remarks</label>
										<textarea name="remarks[]" id="" rows="5" class="form-control not-resizable">{{ old("remarks.*") }}</textarea>
									</div>
								</div>
						</div>
						@endfor
						@else
						<div class="card col-12 col-md-4 p-3 border-0 position-relative" id="varOg">
							<div class="card-body border rounded border-width-medium border-color-1">
								<div class="form-group">
									<label for="variation[]" class="form-label important">Variation</label>
									<input type="text" name="variation[]" class="form-control" value="{{ old("variation.0") }}">
									<small class="text-danger">{{ $errors->first('variation.*') }}</small>
								</div>

								<div class="form-group">
									<label for="price[]" class="form-label important">Price</label>
									<div class="input-group flex-nowrap">
										<div class="input-group-prepend">
											<span class="input-group-text">₱</span>
										</div>

										<div class="input-group-append flex-fill">
											<div class="input-group">
											<input type="number" class="form-control" name="price[]" value="{{ old('price.0') ? old('price.0') : 0 }}" min="0.00" step=".01" />
											<div class="input-group-append">
													<button type="button" class="btn btn-secondary quantity-increment"><i class="fas fa-plus"></i></button>
													<button type="button" class="btn btn-secondary quantity-decrement"><i class="fas fa-minus"></i></button>
												</div>
											</div>
										</div>
									</div>
									<small class="text-danger">{{ $errors->first('price.*') }}</small>
								</div>

								<div class="form-group">
									<label class="form-label" name="remarks[]">Remarks</label>
									<textarea name="remarks[]" id="" rows="5" class="form-control not-resizable">{{ old("remarks.0") }}</textarea>
								</div>
							</div>
						</div>
						@endif

						{{-- Add Button --}}
						<div class="card col-12 col-md-4 p-3 border-0 cursor-pointer" id="addVar">
							<div class="card-body d-flex border-dashed border-width-medium border-color-1">
								<i class="fas fa-circle-plus fa-2x m-auto text-1"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer d-flex">
				<div class="col-4 mx-auto text-center">
					<button class="btn btn-outline-info btn-sm w-50" type="submit" data-type="submit" data-action="submit">Save</button>
				</div>
			</div>
		</form>
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
	const updateOg = () => {
		let container = $("#varContainer");
		let ogVariation = container.find("[name='variation[]']:first()");

		if (container.find("> *").length > 2) {
			if (ogVariation.prop('data-disabled'))
				ogVariation.val(ogVariation.attr('data-value'));

			ogVariation.prop('data-disabled', false);
			ogVariation.prop('readonly', false);
		} else {
			ogVariation.attr('data-value', ogVariation.val());
			ogVariation.val('Default');
			ogVariation.prop('data-disabled', true);
			ogVariation.prop('readonly', true);
		}
	};

	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addVar', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#varOg");
			let container = $("#varContainer");
			let formCopy = form.clone();
			let copy = obj.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove(); updateOg();" style="top: -0.0625rem; right: -0.0625rem;">
					<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
			`);

			obj.remove();
			formCopy.append(remove);
			formCopy.removeAttr("id");
			formCopy.find("textarea, input").val("");
			formCopy.find("textarea, input").prop("readonly", false);
			container.append(formCopy);
			container.append(copy);

			updateOg();
		});

		updateOg();

		// Increment and Decrement price
		$(document).on('click', '.quantity-decrement:not(.disabled)', (e, elm) => {
			$(e.currentTarget).parent().parent().find('[name="price[]"]').trigger('change', ['-', elm]);
		}).on('mousedown', '.quantity-decrement:not(.disabled)', (e) => {
			let obj = $(e.currentTarget);
			let id = setInterval(() => {
				obj.trigger('click', [obj])
			}, 100);
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
			let id = setInterval(() => {
				obj.trigger('click', [obj])
			}, 100);
			obj.attr('data-id', id);
		}).on('mouseup mouseleave', '.quantity-increment:not(.disabled)', (e) => {
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
			} else if (val > 0.0 && operation == '-') {
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
			} else
				$(obj.parent().find('.quantity-increment')).removeClass('disabled');

			// Decrement
			if (val <= 0) {
				$(obj.parent().find('.quantity-decrement')).addClass('disabled');
				obj.val(0);

				if (typeof elm != 'undefined') {
					let id = parseInt(elm.attr('data-id'));
					clearInterval(id);
				}
			} else
				$(obj.parent().find('.quantity-decrement')).removeClass('disabled');
		}).trigger('change');
	});
</script>
@endsection