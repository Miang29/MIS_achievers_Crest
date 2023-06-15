
<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Service Name</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Total Amount</th>
		<th scope="col" class="text-1">Created at</th>
		{{-- <th scope="col" class="text-1">Last Updated at</th> --}}
	</tr>
</thead>

<tbody>
	@forelse ($data as $bs)
	<tr>
		<td>{{ $bs->reference_no }}</td>
		<td>{{ $bs->mode_of_payment }}</td>
		<td>{{ $bs->boarding[0]->petsInformations->pet_name}} </td>
		<td>{{ $bs->boarding[0]->variations->services->service_name}} - {{ $bs->boarding[0]->variations->variation_name }}</td>
		<td>{{ $bs->boarding[0]->price}} </td>
		<td>₱{{ number_format($bs->boarding()->sum("price"), 2) }}</td>
		<td>{{ Carbon\Carbon::parse($bs->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		{{-- <td>{{ Carbon\Carbon::parse($bs->updated)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>		 --}}
	</tr>
	@empty
	<tr>
		<td colspan="8">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>
