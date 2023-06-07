@extends('layouts.admin')

@section('title', 'Service Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">SERVICES TRANSACTION LIST</h3>
		</div>

		<div class="dropdown mx-auto">
			<button class="btn btn-info dropdown-toggle bg-1 btn-sm mt-3 mr-3 mb-2" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-plus-circle mr-2"></i>New Transaction
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
				<a href="{{ route('consultation.transaction.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-stethoscope mr-2"></i>Consultation</a>
				<a  href="{{ route('transaction.vaccination.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-syringe mr-2"></i>Vaccination</a>
				<a href="{{ route('transaction.grooming.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-scissors mr-2"></i>Grooming</a>
				<a href="{{ route('transaction.boarding.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-paw mr-2"></i>Boarding</a>
				<a href="{{ route('home-service.transaction.create') }}" class="dropdown-item" type="button"><i class="fa-solid fa-sliders mr-2"></i>Home Service</a>
			</div>
		</div>
	</div>

	<div class="overflow-x-auto h-100 card w-lg-100 w-100 w-md-100">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="consultation-tab" data-toggle="tab" href="#consultation" role="tab" aria-controls="consultation" aria-selected="true">Consultation Table</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="vaccination-tab" data-toggle="tab" href="#vaccination" role="tab" aria-controls="vaccination" aria-selected="false">Vaccination Table</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="grooming-tab" data-toggle="tab" href="#grooming" role="tab" aria-controls="grooming" aria-selected="false">Grooming Table</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="boarding-tab" data-toggle="tab" href="#boarding" role="tab" aria-controls="boarding" aria-selected="false">Boarding Table</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Home Service Transaction Table </a>
			</li>
		</ul>

		 <div class="tab-content" id="myTabContent">
			{{-- CONSULTATION --}}
			<div class="tab-pane fade show active" id="consultation" role="tabpanel" aria-labelledby="consultation-tab">
				<div class=" card-body h-100 px-0 pt-0">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1">Reference No</th>
								<th scope="col" class="hr-thick text-1">Service Name</th>
								<th scope="col" class="hr-thick text-1">Pet Name</th>
								<th scope="col" class="hr-thick text-1">Total Amount</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@forelse ($consultService as $cs)
							<tr class="{{ $cs->isVoided() ? "bg-danger text-white" : "" }}">
								<td>{{ $cs->reference_no }}</td>
								<td>{{ $cs->consultation[0]->serviceVariation->services->service_name }}</td>
								<td>
									@php($len = 0)
									@php($pn = "")
										@if ($len >= 2)
											@break
										@endif
										@foreach($cs->consultation as $c)
										@php($pn .= " {$c->petsInformations->pet_name}, ")
										@php($len++)
										@endforeach
									{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "...." }}
								</td>
								<td>₱{{ number_format($cs->consultation()->sum("total"), 2) }}</td>
							    <td class="text-center">
									<div class="btn-group">
										<a class="btn btn-info btn-sm" href="{{route ('consultation.transaction.show', [$cs->id] )}}"><i class="fa-solid fa-eye"></i></a>
										@if (!$cs->isVoided())
										<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.vaccination.void', [$cs->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
										@endif
									</div>	
								</td>
							</tr>
							@empty
							<tr>
								 <td colspan="5">~Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>

					</table>
				</div>
			</div>
			{{-- END OF CONSULTATION --}}

			{{-- VACCINATION --}}
			<div class="tab-pane fade" id="vaccination" role="tabpanel" aria-labelledby="vaccination-tab">
				<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
								<th scope="col" class="hr-thick text-1">Reference No</th>
								<th scope="col" class="hr-thick text-1">Vaccine Type</th>
								<th scope="col" class="hr-thick text-1">Pets Name</th>
								<th scope="col" class="hr-thick text-1">Total Amount</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@forelse ($vacciService as $vs)
							<tr class="{{ $vs->isVoided() ? "bg-danger text-white" : "" }}">
								<td>{{ $vs->reference_no }}</td>
								<td>{{ $vs->vaccination[0]->variations->variation_name }}</td>
								<td>
									@php($len = 0)
									@php($pn = "")
										@if ($len >= 2)
											@break
										@endif
										@foreach($vs->vaccination as $v)
										@php($pn .= " {$v->petsInformations->pet_name}, ")
										@php($len++)
										@endforeach
									{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "...." }}
								</td>
								<td>₱{{ number_format($vs->vaccination()->sum("price"), 2) }}</td>
							    <td class="text-center">
									<div class="btn-group">
										<a class="btn btn-info btn-sm" href="{{ route('vaccination.transaction.show', [$vs->id]) }}"><i class="fa-solid fa-eye"></i></a>
										@if (!$vs->isVoided())
										<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.vaccination.void', [$vs->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
										@endif
									</div>	
								</td>
							</tr>
							@empty
							<tr>
								 <td colspan="5">~Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			{{-- END OF VACCINATION --}}

			{{-- GROOMING --}}
			<div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
					<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1">Reference No</th>
								<th scope="col" class="hr-thick text-1">Grooming Type</th>
								<th scope="col" class="hr-thick text-1">Pet Name</th>
								<th scope="col" class="hr-thick text-1">Total Amount</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@forelse ($groomService as $gs)
							<tr class="{{ $gs->isVoided() ? "bg-danger text-white" : "" }}">
								<td>{{ $gs->reference_no }}</td>
								<td>{{ $gs->grooming[0]->variations->variation_name }}</td>
								<td>
									@php($len = 0)
									@php($pn = "")
										@if ($len >= 2)
											@break
										@endif
										@foreach($gs->grooming as $g)
										@php($pn .= " {$g->petsInformations->pet_name}, ")
										@php($len++)
										@endforeach
									{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "...." }}
								</td>
								<td>₱{{ number_format($gs->grooming()->sum("price"), 2) }}</td>
							    <td class="text-center">
									<div class="btn-group">
										<a class="btn btn-info btn-sm" href="{{route ('grooming.transaction.show', [$gs->id]) }}"><i class="fa-solid fa-eye"></i></a>
										@if (!$gs->isVoided())
										<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.grooming.void', [$gs->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
										@endif
									</div>	
								</td>
							</tr>
							@empty
							<tr>
								 <td colspan="5">~Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			{{-- END OF GROOMING --}}

			{{-- BOARDING --}}
			<div class="tab-pane fade" id="boarding" role="tabpanel" aria-labelledby="boarding-tab">
				<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1">Reference No</th>
								<th scope="col" class="hr-thick text-1">Variation Name</th>
								<th scope="col" class="hr-thick text-1">Pet Name</th>
								<th scope="col" class="hr-thick text-1">Total Amount</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@forelse ($boardService as $bs)
							<tr class="{{ $bs->isVoided() ? "bg-danger text-white" : "" }}">
								<td>{{ $bs->reference_no }}</td>
								<td>{{ $bs->boarding[0]->variations->variation_name }}</td>
								<td>
									@php($len = 0)
									@php($pn = "")
										@if ($len >= 2)
											@break
										@endif
										@foreach($bs->boarding as $b)
										@php($pn .= " {$b->petsInformations->pet_name}, ")
										@php($len++)
										@endforeach
									{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "...." }}
								</td>
								<td>₱{{ number_format($bs->boarding()->sum("price"), 2) }}</td>
							    <td class="text-center">
									<div class="btn-group">
										<a class="btn btn-info btn-sm" href="{{ route('boarding.transaction.show', [$bs->id])}}"><i class="fa-solid fa-eye"></i></a>
										@if (!$bs->isVoided())
										<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.boarding.void', [$bs->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
										@endif
									</div>	
								</td>
							</tr>
							@empty
							<tr>
								 <td colspan="5">~Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			{{-- END OF BOARDING --}}

			{{-- OTHER TRANSATION --}}
			<div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
				<div class=" card-body h-100 px-0 pt-0 ">
					<table class="table table-striped text-center" id="table-content">
						<thead>
							<tr>
								<th scope="col" class="hr-thick text-1">Reference No</th>
								<th scope="col" class="hr-thick text-1">Service Name</th>
								<th scope="col" class="hr-thick text-1">Pet Name</th>
								<th scope="col" class="hr-thick text-1">Total Amount</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@forelse ($otherService as $os)
							<tr class="{{ $os->isVoided() ? "bg-danger text-white" : "" }}">
								<td>{{ $os->reference_no }}</td>
								<td>{{$os->otherTransaction[0]->variations->services->service_name}} - {{ $os->otherTransaction[0]->variations->variation_name }}</td>
								<td>
									@php($len = 0)
									@php($pn = "")
										@if ($len >= 2)
											@break
										@endif
										@foreach($os->otherTransaction as $o)
										@php($pn .= " {$o->petsInformations->pet_name}, ")
										@php($len++)
										@endforeach
									{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "...." }}
								</td>
								<td>₱{{ number_format($os->otherTransaction()->sum("price"), 2) }}</td>
							    <td class="text-center">
									<div class="btn-group">
										<a class="btn btn-info btn-sm" href="{{ route('other.transaction.show', [$os->id])}}"><i class="fa-solid fa-eye"></i></a>
										@if (!$os->isVoided())
										<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.void', [$os->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
										@endif
									</div>	
								</td>
							</tr>
							@empty
							<tr>
								 <td colspan="5">~Nothing to show~</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			{{-- END OF OTHER TRANSACTION --}}
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection