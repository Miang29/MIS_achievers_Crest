@extends('layouts.admin')

@section('title', 'Create Product Category')

@section('content')
<div class="container-fluid m-0">
	<h2 class="mt-3"><a href="javascript:void(0);" onclick="confirmLeave('{{route('inventory')}}');" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Category List</a></h2>
	<hr class="hr-thick" style="border-color: #707070;">

	<div class="row" id="form-area">
		<div class="col-12">

			<form method ="POST" Action="{{ route('submit-products') }}"class="card my-3 mx-auto" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">	
			<h3 class="card-header font-weight-bold text-white gbg-1"><i class="fa-solid fa-cart-plus mr-2 fa-lg"></i>CREATE CATEGORY</h3>

				<div class="card-body d-flex">
					<div class="form-group mx-auto w-100">
						<div class="col-12 col-md-12">
							<div class="input-group mb-3 col-lg-12">
								<div class="input-group-prepend">
									<label class="input-group-text font-weight-bold bg-white" for="inputGroupSelect01">Category Name</label>
								</div>

								<select class="custom-select" id="inputGroupSelect01" name="category">
									@foreach ($productCty as $pcty)
									<option value="{{ $pcty->id}}">{{ $pcty->category_name }}</option>
									@endforeach
								</select>
								<small class="text-danger small">{{-- $errors->first('category_name') --}}</small>
							</div>
						</div>

						<div class="row" id="prodContainer">
							{{-- PRODUCT FORM --}}
							@if (old('product_name') != null && count(old('product_name')) > 1)
							@for ($i = 0; $i < count(old('product_name')); $i++) <div class="card col-12 col-md-6 p-3 border-0 position-relative" id="prodOg">
								<div class="card-body border rounded border-width-medium border-color-1">
									<div class="form-group">
										<label class="important" for="productname">Product Name</label>
										<input class="form-control" type="text" name="product_name[]" value="{{ old("product_name.{$i}") }}" />
										<small class="text-danger small">{{ $errors->first('product_name.*') }}</small>
									</div>

									<div class="row">
										<div class="col-12 col-lg-4 form-group">
											<label class="important" for="stocks">Stocks</label>
											<input class="form-control" type="number" name="stocks[]" min="0" value="{{ old("stocks.{$i}") ? old("stocks.{$i}") : 0 }}" />
											<small class="text-danger small">{{ $errors->first('stocks.*') }}</small>
										</div>

										<div class="col-12 col-lg-4 form-group">
											<label class="important">Price</label>
											<div class="input-group ">
												<div class="input-group-prepend">
													<span class="input-group-text">₱</span>
												</div>
												<input type="number" class="form-control" name="price[]" value="{{ old("price.{$i}") ? old("price.{$i}") : 0 }}" min="0" step="1" />
											</div>
											<small class="text-danger small">{{ $errors->first('price.*') }}</small>
										</div>

										<div class="col-12 col-lg-4 form-group">
											<label class="important" for="status">Status</label><br>
											<select class="custom-select" name="status[]">
												<option value="active" {{ old("status.{$i}") == 'active' ? 'selected' : '' }}>Active</option>
												<option value="inactive" {{ old("status.{$i}") == 'inactive' ? 'selected' : '' }}>Inactive</option>
											</select>
											<small class="text-danger small">{{ $errors->first('status.*') }}</small>
										</div>
									</div>

									<div class="form-group">
										<label class="important" for="description">Description</label>
										<textarea class="form-control not-resizable" name="description[]" rows="5">{{ old("description.{$i}") }}</textarea>
									</div>
								</div>
						</div>
						@endfor
						@else
						<div class="card col-12 col-md-6 p-3 border-0 position-relative" id="prodOg">
							<div class="card-body border rounded border-width-medium border-color-1">
								<div class="form-group">
									<label class="important" for="productname">Product Name</label>
									<input class="form-control" type="text" name="product_name[]" value="{{ old('product_name.0') }}" />
									<small class="text-danger small">{{ $errors->first('product_name.*') }}</small>
								</div>

								<div class="row">
									<div class="col-12 col-lg-4 form-group">
										<label class="important" for="stocks">Stocks</label>
										<input class="form-control" type="number" name="stocks[]" min="0" value="{{ old('stocks.0') ? old('stocks.0') : 0 }}" />
										<small class="text-danger small">{{ $errors->first('stocks.*') }}</small>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="important">Price</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">₱</span>
											</div>
											<input type="number" class="form-control" name="price[]" value="{{ old('price.0') ? old('price.0') : 0 }}" min="0.00" step=".01" />
										</div>
										<small class="text-danger small">{{ $errors->first('price.*') }}</small>
									</div>

									<div class="col-12 col-lg-4 form-group">
										<label class="important" for="status">Status</label><br>
										<select class="custom-select" name="status[]">
											<option value="active" {{ old("status.0") == 'active' ? 'selected' : '' }}>Active</option>
											<option value="inactive" {{ old("status.0") == 'inactive' ? 'selected' : '' }}>Inactive</option>
										</select>
										<small class="text-danger small">{{ $errors->first('status.*') }}</small>
									</div>
								</div>

								<div class="form-group">
									<label class="important" for="description">Description</label>
									<textarea class="form-control not-resizable" name="description[]" rows="5">{{ old('description.0') }}</textarea>
								</div>
							</div>
						</div>
						@endif
						{{-- PRODUCT FORM END --}}

						{{-- Add Button --}}
						<div class="card col-12 col-md-6 p-3 border-0 cursor-pointer" id="addProd">
							<div class="card-body d-flex border-dashed border-width-medium border-color-1">
								<i class="fas fa-circle-plus fa-2x m-auto text-1"></i>
							</div>
						</div>
					</div>
				</div>
		</div>

		<div class="card-footer d-flex">
			<div class="col-4 mx-auto text-center">
				<button class="btn btn-outline-info mr-1 btn-sm w-50" data-action ="submit" type="submit" data-type="submit">Save</button>
				 <a href="javascript:void(0);" onclick="confirmLeave('{{ route('inventory') }}');" class="btn btn-outline-danger btn-sm ml-1 w-lg-50 mr-auto w-50">Cancel</a>
			</div>
		</div>
		</form>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
<script type="text/javascript">
	$(document).ready(() => {
		// Adding and Removing Variations
		$(document).on('click', '#addProd', (e) => {
			let obj = $(e.currentTarget);
			let form = $("#prodOg");
			let container = $("#prodContainer");
			let formCopy = form.clone();
			let copy = obj.clone();

			let remove = $(`
				<span class="position-absolute cursor-pointer" onclick="$(this).parent().css('opacity', 0); setTimeout(() => {$(this).parent().remove();}, 375);" style="top: -0.0625rem; right: -0.0625rem;">
					<i class="fas fa-circle-xmark fa-lg p-2 text-custom-1"></i>
				</span>
			`);

			obj.remove();
			formCopy.append(remove)
				.removeAttr("id")
				.css('transition', '0.375s ease-in-out')
				.css('opacity', 0);
			setTimeout(() => {
				formCopy.css('opacity', 1);
			});
			container.append(formCopy);
			container.append(copy);
		});
	});
</script>
@endsection