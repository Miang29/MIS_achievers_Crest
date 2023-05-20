<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Service Name</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Additional Cost</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Weight</th>
		<th scope="col" class="text-1">Temperature</th>
		<th scope="col" class="text-1">Total</th>
		<th scope="col" class="text-1">Created at</th>
		<th scope="col" class="text-1">Last Updated at</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $c)
	<tr>
		<td>{{ $c->reference_no }}</td>
		<td>{{ $c->mode_of_payment }}</td>
		<td>{{ $c->consultation[0]->serviceVariation->services->service_name }} </td>
		<td>{{ $c->consultation[0]->price }} </td>
		<td>{{ $c->consultation[0]->additional_cost}} </td>
		<td>{{ $c->consultation[0]->petsInformations->pet_name }}</td>
		<td>{{ $c->consultation[0]->weight}} </td>
		<td>{{ $c->consultation[0]->temperature}} </td>
		<td>₱{{ number_format($c->consultation()->sum("total"), 2) }}</td>		
		<td>{{ Carbon\Carbon::parse($c->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td>{{ Carbon\Carbon::parse($c->updated)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td></td>
	</tr>
	@empty
	<tr>
		<td colspan="12">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>