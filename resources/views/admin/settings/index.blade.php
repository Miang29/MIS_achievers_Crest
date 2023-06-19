@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="col-12 col-lg text-center text-lg-left">
		<h3 class="text-1">SETTINGS</h3>
	</div>

	<nav>
		<div class="nav nav-tabs hr-thick border-secondary" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-web-tab" data-toggle="tab" href="#nav-web" role="tab" aria-controls="nav-web" aria-selected="true">Website Information</a>
			<a class="nav-item nav-link" id="nav-inventory-tab" data-toggle="tab" href="#nav-inventory" role="tab" aria-controls="nav-inventory" aria-selected="false">Product Category</a>
			<a class="nav-item nav-link" id="nav-services-tab" data-toggle="tab" href="#nav-services" role="tab" aria-controls="nav-services" aria-selected="false">Services</a>
			<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact Information Messages</a>
			<a class="nav-item nav-link" id="nav-unavailable-dates-tab" data-toggle="tab" href="#nav-unavailable-dates" role="tab" aria-controls="nav-unavailable-dates" aria-selected="false">Unavailable Dates</a>
		</div>
	</nav>

	<div class="tab-content" id="nav-tabContent">
		{{-- WEBSITE INFORMATION --}}
		<div class="tab-pane fade show active" id="nav-web" role="tabpanel" aria-labelledby="nav-web-tab">
			<form method="POST" action="{{ route('settings.update') }}" class="row" id="form-area" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-12 col-lg-12 col-md-12">
					<div class="card my-3 mx-auto">
						<h3 class="card-header font-weight-bold text-white bg-1">Website Related</h3>
						<div class="card-body ">
							<div class="form-group ">

								<div class="row ">
									<div class="col-12 col-md-6 col-lg-6"> 
										{{-- IMAGE INPUT --}}
										<div class="image-input-scope" id="web-logo-scope" data-settings="#image-input-settings" data-fallback-img="{{ asset('uploads/settings/default.png') }}">
											{{-- FILE IMAGE --}}
											<div class="form-group text-center image-input collapse show avatar_holder" id="web-logo-image-input-wrapper">
												<div class="row border rounded border-secondary-light py-2 mx-1">
													<div class="col-12 col-md-6 text-md-right">
														<div class="hover-cam mx-auto avatar rounded overflow-hidden">
															<img src="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}" class="hover-zoom img-fluid avatar" id="web-logo-container" alt="Website Logo" data-default-src="{{ asset('uploads/settings/default.png') }}">
															<span class="icon text-center image-input-float" id="web-logo" tabindex="0" data-target="#web-logo-container">
																<i class="fas fa-camera text-white hover-icon-2x"></i>
															</span>
														</div>
														<input type="file" name="web-logo" class="d-none" accept=".jpg,.jpeg,.png,.webp" data-role="image-input" data-target-image-container="#web-logo-container" data-target-name-container="#web-logo-name">
														<h6 id="web-logo-name" class="text-truncate w-50 mx-auto text-center" data-default-name="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}">{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file, false) }}</h6>
													</div>

													<div class="col-12 col-md-6 text-md-left">
														<label class="form-label font-weight-bold" for="web-logo">Website Logo</label><br>
														<small class="text-muted pb-0 mb-0">
															<b>FORMATS ALLOWED:</b>
															<br>JPEG, JPG, PNG, WEBP
														</small><br>
														<small class="text-muted pt-0 mt-0"><b>MAX SIZE:</b> 5MB</small><br>
														<button class="btn btn-secondary" type="button" id="reset-logo">Remove Logo</button><br>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-6 ">
										<label class="h7 text-1 important font-weight-bold " for="webname">Website Name</label>
										<input class="form-control " type="text" name="web-name" value="{{ App\Settings::getValue('web-name') }}">
										<small class="text-danger small mx-auto">{{ $errors->first('web-name') }}</small><br>

										<label class="h6 important text-1 font-weight-bold " for="webdescription">Website Description</label>
										<textarea class="form-control not-resizable" name="web-desc" rows="3">{{ App\Settings::getValue('web-desc') }}</textarea>
										<small class="text-danger small mx-auto">{{ $errors->first('web-desc') }}</small>
									</div>
								</div>

								<br>

								<div class="card-body mt-1 border-top border-secondary">
									<h4 class="text-1 font-weight-bold text-center mb-3">Reaching Out</h4>

									<div class=" card col-lg-12 col-12 col-md-12 my-3">	
										<div class="row mt-3">
											<div class="form-group ml-auto col-12 col-lg-4 col-md-6">
												<label class="h6 important" for="number">Mobile Number</label>
												<input class="form-control" type="text" name="mobile-no" value="{{ App\Settings::getValue('mobile-no') }}" />
												<small class="text-danger small mx-auto">{{ $errors->first('mobile-no') }}</small>
											</div>

											<div class="form-group mr-auto col-12 col-lg-4 col-md-6">
												<label class="h6 important" for="email">Email Address</label>
												<input class="form-control" type="email" name="email" value="{{ App\Settings::getValue('email') }}" />
												<small class="text-danger small mx-auto">{{ $errors->first('email') }}</small>
											</div>

											<div class="form-group mx-auto col-12 col-lg-8 col-md-6">
												<label class="h6 important mt-3" for="address">Veterinary Clinic Address</label>
												<textarea class="form-control not-resizable" name="address" rows="2">{{ App\Settings::getValue('address') }}</textarea>
												<small class="text-danger small mx-auto">{{ $errors->first('address') }}</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer d-flex">
							<div class="col-12 col-lg-6 col-md-6 mx-auto  text-center ">
								<button type="submit" data-type="submit" class="btn btn-outline-info my-2 btn-sm w-25">Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			{{-- PAYMENT METHOD SETTINGS --}}
			<form class="card my-3" method="POST" action="{{ route('submit.payment.method')}}"  id="form-area" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-lg-12 col-12 col-md-12 my-3">
					<h4 class="font-weight-bold text-center my-3 text-dark">Payment Method Settings</h4>
					<div class="row" id="paymentContainer">
						<div class="card col-lg-5 col-12 col-md-12 my-3 ml-5" id="paymentOriginal">
								<h7 class="text-dark my-2 border-bottom text-center position-relative">Mode of Payment:</h7>
							<div class="row">
								<div class="form-group col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="value[]">Value</label>
									<input class="form-control" type="text" name="value[]" value="" />
									<small class="text-danger small mx-auto">{{ $errors->first('value.*') }}</small>
								</div>

								<div class="form-group col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="name[]">Name</label>
									<input class="form-control" type="text" name="name[]" value=""/>
									<small class="text-danger small mx-auto">{{ $errors->first('name.*') }}</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- ADD --}}
				<div class="form-group col-lg-12 col-md-12 col-12 mx-auto">
					<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .20rem;" id="addpayment">
						<span class="m-auto font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Mode of Payment</span>
					</button>
				</div>

				<div class="card-footer d-flex">
					<div class="col-12 col-lg-6 col-md-6 mx-auto  text-center ">
						<button type="submit" data-type="submit" class="btn btn-outline-info my-2 btn-sm w-25">Save</button>
					</div>
				</div>
			</form>
			{{-- END PAYMENT METHOD SETTINGS --}}

			{{-- PAYMENT METHOD TABLE --}}
			<div class="card h-100 px-0">
				<table class="table table-striped text-center">
					<thead>
						<tr>
							<th scope="col" class="hr-thick text-dark">Payment Method Name</th>
							<th></th>
							<th scope="col" class="hr-thick text-dark">Action</th>
						</tr>
					</thead>

					<tbody>
						@forelse($paymentMode as $p)
						<tr>
							<td class="text-center">{{ $p->name}}</td>
							<td></td>
							<td>
								<a href="javascript:void(0);" onclick="confirmLeave('{{ route('remove.payment', [$p->id]) }}', undefined, 'Are you sure you want to remove this mode of payment?');" class="text-danger"><i class="fa-solid fa-box-archive mr-2"></i>Remove Method</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7">Nothing to show ~</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			{{-- END PAYMENT METHOD TABLE --}}

			{{-- PET INFO SETTINGS --}}
			<form class="card my-3" method="POST" action="{{ route('submit.colors')}}"  id="form-area" enctype="multipart/form-data">
				{{-- ADD COLOR FOR PET INFO --}}
				{{ csrf_field() }}
				<div class="col-lg-12 col-12 col-md-12 my-3">
				<h4 class="font-weight-bold text-center my-3 text-dark">Pet Information Settings</h4>
					<div class="row" id="colorContainer">
						<div class="card col-lg-5 col-12 col-md-12 my-3 ml-5" id="colorOriginal">
						<h7 class="text-dark my-2 border-bottom text-center position-relative">Add new colors:</h7>
							<div class="row">
								<div class="form-group col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="value[]">Color</label>
									<input class="form-control" type="color" name="value[]" />
									<small class="text-danger small mx-auto">{{ $errors->first('value.*') }}</small>
								</div>

								<div class="form-group col-12 col-lg-6 col-md-6">
									<label class="h6 important" for="name[]">Color Name</label>
									<input class="form-control" type="text" name="name[]" />
									<small class="text-danger small mx-auto">{{ $errors->first('name.*') }}</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- ADD --}}
				<div class="form-group col-lg-12 col-md-12 col-12 mx-auto">
					<button class="card mx-auto w-100 h-100 d-flex" type="button" style="border-style: dashed; border-width: .20rem;" id="addColor">
						<span class="m-auto font-weight-bold text-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add Color</span>
					</button>
				</div>

				<div class="card-footer d-flex">
					<div class="col-12 col-lg-6 col-md-6 mx-auto  text-center ">
						<button type="submit" data-type="submit" class="btn btn-outline-info my-2 btn-sm w-25">Save</button>
					</div>
				</div>
			</form>
			{{-- END PET INFO SETTINGS --}}
			{{-- COLOR TABLE --}}
			<div class="card h-100 px-0">
				<table class="table table-striped text-center">
					<thead>
						<tr class="table-primary">
							<th scope="col" class="hr-thick text-dark">Hex Code</th>
							<th scope="col" class="hr-thick text-dark">Color Name</th>
							<th scope="col" class="hr-thick text-dark">Action</th>
						</tr>
					</thead>

					<tbody>
						@forelse($colors as $c)
						<tr>
							<td class="text-center">{{ $c->value}}</td>
							<td class="text-center">{{ $c->name}}</td>
							<td>
								<a href="javascript:void(0);" onclick="confirmLeave('{{ route('remove.color', [$c->id]) }}', undefined, 'Are you sure you want to remove this color?');" class="text-danger"><i class="fa-solid fa-box-archive mr-2"></i>Remove Color</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7">Nothing to show ~</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			{{-- END COLOR TABLE --}}
		</div>

		{{-- PRODUCT CATEGORY --}}
		<div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-inventory-tab">
			<div class="container-fluid m-0">
				<form class="card my-3 mx-auto h-100" method="POST" action="{{ route('submit-category') }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h3 class="card-header font-weight-bold text-white bg-1"><i class="fa-solid fa-plus mr-2 fa-lg"></i>ADD PRODUCT CATEGORY</h3>
					<div class="card-body">
						<div class="card col-lg-6 col-12 col-md-12 mx-auto">
							<div class="form-group mx-auto col-lg-12 col-12 col-md-12 mt-5 ">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text font-weight-bold" id="inputGroup-sizing-default">Category Name</span>
									</div>
									<input name="category_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<small class="text-danger small">{{ $errors->first('category_name') }}</small>
							</div>

							<div class="form-group col-lg-12 col-12 col-md-8">
	                            <label class="h6 important " for="status">Select if the product is perishable or not perishable.</label><br>
	                            <select class="custom-select " name="is_perishable">
	                                <option value="1">Perishable</option>
	                                <option value="0">None Perishable</option>
	                                <option {{ old('is_perishable') ? '' : 'selected' }} disabled>--- SELECT ---</option>
	                            </select>
	                        </div>
							<small class="text-danger small mb-2">{{ $errors->first('is_perishable') }}</small>
	                    </div>
					</div>

					<div class="card-footer d-flex">
						<div class="col-4 mx-auto text-center">
							<button type="submit" data-action="submit" class="btn btn-outline-info mr-1 btn-sm w-75 w-lg-50 w-md-75" data-type="submit">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		{{-- SERVICES CATEGORY --}}
		<div class="tab-pane fade" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
			<div class="container-fluid m-0">
				<form class="card my-3 mx-auto h-100" method="POST" action ="{{ route('submit-service-category') }}" enctype="multipart/form-data">
					{{ csrf_field()}}
					
					<h3 class="card-header font-weight-bold text-white bg-1"><i class="fa-solid fa-plus mr-2 fa-lg"></i>ADD SERVICE CATEGORY</h3>
					
					<div class="card-body d-flex ">
						<div class="card col-lg-6 col-12 col-md-12 mx-auto">
							<div class="form-group mx-auto col-lg-12 colo-12 col-md-12 mt-5 ">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text font-weight-bold" id="inputGroup-sizing-default">Category Name</span>
									</div>
									<input name="service_category_name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
								</div>
								<small class="text-danger small">{{ $errors->first('service_category_name') }}</small>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex">
						<div class="col-4 mx-auto text-center">
							<button type="submit" class="btn btn-outline-info mr-1 btn-sm w-75 w-lg-50 w-md-75" data-action="submit" data-type="submit">Save</button>
						</div>
					</div>
				</form>
				{{-- SERVICES --}}

				<div class="card px-2 px-lg-6 py-2 h-100 my-3">
					<div class="row">
						<div class="col-12 col-lg text-center text-lg-left">
							<h3 class="text-1">SERVICES CATEGORY LIST </h3>
						</div>

						<form method="GET" action="{{ route('service_category.index')}}" class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
							<div class="input-group">
								<input type="text" class="form-control" value="{{ request()->search }}" name="search" placeholder="Search..." />

								<div class="input-group-append">
									<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					<div class="row mb-2">
						<a href="{{ route('service_category.archive')}}" class="btn btn-info btn-sm my-1 bg-1 ml-3 mr-3"><i class="fa-solid fa-box-archive mr-2"></i>Archived Services Category</a>
						<a href="{{ route('service_category.create') }}" class="btn btn-info bg-1 btn-sm my-1"><i class="fas fa-plus-circle mr-2"></i>Create Services</a>
					</div>

					<div class="overflow-x-auto h-100 card">
						<div class=" card-body h-100 px-0 pt-0 ">
							<table class="table table-striped" id="table-content">
								<thead>
									<tr>
										<th scope="col" class="hr-thick text-1 text-center">Services Category Name</th>
										<th scope="col" class="hr-thick text-1 text-center">Total No. of Service</th>
										<th scope="col" class="hr-thick text-1 text-center"></th>
									</tr>
								</thead>

								<tbody>
								@forelse ($servicesCategory as $sc)
									<tr>
										<td class="text-center">{{ $sc->service_category_name }}</td>
										<td class="text-center">{{ $sc->services()->count() }}</td>
										
										<td class="text-center">
											<div class="dropdown">
												<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
													Action
												</button>

												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
													<a href="{{ route('service.index',[$sc->id]) }}" class="dropdown-item"><i class="fa-solid fa-eye mr-2"></i>View Service</a>
													<button onclick="confirmLeave('{{ route("service_category.delete", [$sc->id]) }}', undefined, 'Are you sure you want to archive this category? This will <b>archived all the services and variations</b> encoded within this category.');" class="dropdown-item"><i class="fa-solid fa-box-archive mr-2"></i>Archive</button>
												</div>
											</div>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="2">Nothing to show~</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>

			{{-- END SERVICES --}}

			</div>
		</div>
		
		{{-- CONTACT --}}
		<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
			<div class="container-fluid m-0">
				<div class="card my-3 mx-auto h-100 overflow-x-auto">
					<h3 class="card-header font-weight-bold text-white bg-1"><i class="fa-solid fa-envelope mr-2 fa-lg"></i>MESSAGES</h3>

					<div class="card-body h-100 px-0">
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<th scope="col" class="hr-thick text-1">Client Name</th>
									<th scope="col" class="hr-thick text-1">Email</th>
									<th scope="col" class="hr-thick text-1">Mobile No</th>
									<th scope="col" class="hr-thick text-1">Message</th>
									<th scope="col" class="hr-thick text-1">Status</th>
								</tr>
							</thead>

							<tbody>
								@forelse($contacts as $ci)
								<tr>
									<td class="text-center">{{ $ci->client_name}}</td>
									<td class="text-center">{{ $ci->email}}</td>
									<td class="text-center">{{ $ci->mobile_no}}</td>
									<td class="text-center text-truncate">{{ $ci->message }}</td>
									<td>
										@if ($ci->status == 0)
										<i class="fas fa-circle text-warning mr-2"></i>Pending
										@elseif ($ci->status == 1)
										<i class="fas fa-circle text-success mr-2"></i>Message Viewed
										@else
										<i class="fas fa-circle text-secondary mr-2"></i>Unknown
										@endif
									</td>
									<td>
										<div class="dropdown">
											<button class="btn btn-info bg-1 btn-sm dropdown-toggle mark-affected" type="button" data-toggle="dropdown" id="dropdown" aria-haspopup="true" aria-expanded="false" data-id="$a->id">
												Action
											</button>

											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
												<a href="{{route ('contact.show', [$ci->id]) }}" class="dropdown-item"><i class="fa-solid fa-message mr-2"></i>View Message</a>
												<a href="https://gmail.com/" class="dropdown-item"><i class="fa-solid fa-paper-plane mr-2 text-info"></i>Reply (Opens Gmail)</a>
											</div>
										</div>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="7">Nothing to show ~</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		{{-- UNAVAILABLE DATES --}}
		<div class="tab-pane fade" id="nav-unavailable-dates" role="tabpanel" aria-labelledby="nav-unavailable-dates-tab">
			<div class="container-fuild m-0">
				<div class="card my-3 mx-auto h-100 overflow-x-auto">
					<h3 class="card-header font-weight-bold text-white bg-1">
						<i class="fa-solid fa-calendar-days mr-2 fa-lg"></i>UNAVAILABLE VET DATES
						<a href="{{ route('settings.unavailable-dates.create') }}" class="btn btn-success float-right">
							<i class="fa-solid fa-plus-circle mr-2"></i>Add Entry
						</a>
					</h3>
					
					<div class="card-body h-100 px-0">
						@php ($now = \Carbon\Carbon::now('Asia/Manila'))
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<th scope="col" class="hr-thick text-1">Date</th>
									<th scope="col" class="hr-thick text-1">Time</th>
									<th scope="col" class="hr-thick text-1">Status</th>
									<th scope="col" class="hr-thick text-1"></th>
								</tr>
							</thead>

							<tbody>
								@forelse ($unavailableDates as $d)
								
								@php
								if (!$d->is_whole_day) {
									$fetchedTime = App\Appointments::getAppointmentTimes()[$d->time - 1];
									$convertedTime = preg_split("/(\s*-\s*)/i", $fetchedTime)[1];

									$parsedDate = \Carbon\Carbon::parse("{$d->date} {$convertedTime}");
								}
								@endphp
								
								<tr>
									<td>{{ \Carbon\Carbon::parse($d->date)->format("M d, Y") }}</td>
									<td>
										@if ($d->is_whole_day)
										Whole Day
										@else
										{{ $fetchedTime }}
										@endif
									</td>
									
									<td>
										@php ($isDone = false)
										@if ($d->is_whole_day)
											@if ($now->gt($d->date))
											<i class="fas fa-check text-success mr-2"></i>Done
											@php ($isDone = true)
											@else
											<i class="fas fa-circle text-warning mr-2"></i>Unavailable
											@endif
										@else
											@if ($now->gt($parsedDate))
											<i class="fas fa-check text-success mr-2"></i>Done
											@php ($isDone = true)
											@else
											<i class="fas fa-circle text-warning mr-2"></i>Unavailable
											@endif
										@endif
									</td>
									
									<td>
										@if (!$isDone)
										<a href="javascript:confirmLeave('{{ route ('settings.unavailable-dates.remove', [$d->id]) }}', undefined, 'This action cannot be undone.');" role="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash mr-2"></i>Remove Unavailability</a>
										@endif
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="4">Nothing to show ~</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
	@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util/image-input.css') }}" />
	@endsection

	@section('scripts')
	<script type="text/javascript" src="{{ asset('js/util/image-input.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(() => {
			$("#reset-logo").on('click', (e) => {
				$.post("{{ route('settings.remove-logo') }}", {
					_token: $(`meta[name="csrf"]`).attr('content')
				}).done((response) => {
					console.log(response);
					if (response.success) {
						Swal.fire({
							title: `${response.message}`,
							position: `top`,
							showConfirmButton: false,
							toast: true,
							timer: 5000,
							background: `#28a745`,
							customClass: {
								title: `text-white`,
								content: `text-white`,
								popup: `px-3`
							},
						});

						$("#web-logo-container").attr('src', `${response.image}`);
					} else {
						Swal.fire({
							title: `${response.message}`,
							position: `top`,
							showConfirmButton: false,
							toast: true,
							timer: 5000,
							background: `#dc3545`,
							customClass: {
								title: `text-white`,
								content: `text-white`,
								popup: `px-3`
							},
						});
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(() => {
			// Adding and Removing Variations
			$(document).on('click', '#addColor', (e) => {
				let obj = $(e.currentTarget);
				let form = $("#colorOriginal");
				let container = $("#colorContainer");
				let formCopy = form.clone();
				let copy = obj.clone();

				let remove = $(`
					<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -1.125rem;">
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

	<script type="text/javascript">
		$(document).ready(() => {
			// Adding and Removing Variations
			$(document).on('click', '#addpayment', (e) => {
				let obj = $(e.currentTarget);
				let form = $("#paymentOriginal");
				let container = $("#paymentContainer");
				let formCopy = form.clone();
				let copy = obj.clone();

				let remove = $(`
					<span class="position-absolute cursor-pointer" onclick="$(this).parent().remove();" style="top: -1rem; right: -1.125rem;">
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

	@section('meta')
	<meta name="csrf" content="{{ csrf_token() }}">
	@endsection