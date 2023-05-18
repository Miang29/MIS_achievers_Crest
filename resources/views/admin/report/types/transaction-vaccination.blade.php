<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Vaccine Type</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Total</th>
		<th scope="col" class="text-1">Created at</th>
		<th scope="col" class="text-1">Last Updated at</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $vt)
	<tr>
		<td>{{ $vt->reference_no }}</td>
		<td>{{ $vt->mode_of_payment }}</td>
		<td>{{ $vt->vaccination[0]->variations->variation_name }}</td>
		<td>{{ $vt->vaccination[0]->price}} </td>
		<td>{{ $vt->vaccination[0]->petsInformations->pet_name}} </td>
		<td>₱{{ number_format($vt->vaccination()->sum("price"), 2) }}</td>
		<td>{{ Carbon\Carbon::parse($vt->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td>{{ Carbon\Carbon::parse($vt->updated)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>		
	</tr>
	@empty
	<tr>
		<td colspan="9">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>