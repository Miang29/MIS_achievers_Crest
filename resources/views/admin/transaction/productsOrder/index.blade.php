@extends('layouts.admin')

@section('title', 'Product Order Transaction')

@section('content')

<div class="container-fluid px-2 px-lg-6 py-2 h-100 my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h3 class="text-1">PRODUCT ORDERS</h3>
		</div>

		<div class="col-12 col-md-6 col-lg my-2 text-center text-md-left text-lg-right">
			<a href="{{route('transaction.products.create')}}" class="btn btn-info bg-1 btn-sm w-50 my-1"><i class="fas fa-plus-circle mr-2"></i>Add transaction</a>
		</div>

		<div class=" col-12 col-md-6 col-lg my-2 text-center text-lg-right">
			<div class="input-group">
				<input type="text" class="form-control" name="search" placeholder="Search..." />
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div class="overflow-x-auto h-100 card">
		<div class=" card-body h-100 px-0 pt-0">
			<table class="table table-striped text-center" id="table-content">
				<thead>
					<tr>
						<th scope="col" class="hr-thick text-1">Reference No</th>
						<th scope="col" class="hr-thick text-1">Product Name</th>
						<th scope="col" class="hr-thick text-1">Quantity</th>
						<th scope="col" class="hr-thick text-1">Total Amount</th>
						<th scope="col" class="hr-thick text-1"></th>
					</tr>
				</thead>

				<tbody>
					@forelse ($productOrder as $po)
					<tr class="{{ $po->isVoided() ? "bg-danger text-white" : "" }}">
						<td>{{ $po->reference_no }}</td>
						
						<td>
							@php($len = 0)
							@php($pn = "")
							@foreach ($po->productsOrderItems as $pi)
								@if ($len >= 2)
									@break
								@endif

								@php($pn .= " {$pi->product_name},")
								@php($len++)
							@endforeach
							{{ substr($pn, 1, strlen($pn)-2)  }}{{ $len <= 2 ? "" : "..." }}
						</td>
						
						<td>{{ $po->productsOrderItems()->sum("quantity") }}</td>
						<td>₱{{ number_format($po->productsOrderItems()->sum("total"), 2) }}</td>
						<td class="text-center">
							<div class="btn-group">
								<a class="btn btn-info btn-sm" href="{{route ('transaction.products.view', [1]) }}"><i class="fa-solid fa-eye"></i></a>
								@if (!$po->isVoided())
								<button class="btn btn-outline-danger btn-sm" onclick="confirmLeave('{{ route('transaction.product.order.void', [$po->id]) }}', undefined, 'Are you sure you want to void the transaction?');"><i class="fa-solid fa-ban"></i></button>
								@endif
							</div>

						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4">Nothing to show~</td>
					</tr>
					@endforelse
				</tbody>

			</table>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection