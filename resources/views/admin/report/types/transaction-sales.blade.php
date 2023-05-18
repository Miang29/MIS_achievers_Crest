
<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Product Name</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Quantity</th>
		<th scope="col" class="text-1">Total Price</th>
		<th scope="col" class="text-1">Created At</th>
		<th scope="col" class="text-1">Last Updated At</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $po)
	<tr>
		<td>{{ $po->reference_no }}</td>
		<td>{{ $po->mode_of_payment }}</td>
		<td>{{ $po->productsOrderItems[0]->product_name }}</td>
		<td>{{ $po->productsOrderItems[0]->price }}</td>
		<td>{{ $po->productsOrderItems[0]->quantity }}</td>
		<td>{{ $po->productsOrderItems[0]->total}}</td>
		<td>{{ Carbon\Carbon::parse($po->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td>{{ Carbon\Carbon::parse($po->updated)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>