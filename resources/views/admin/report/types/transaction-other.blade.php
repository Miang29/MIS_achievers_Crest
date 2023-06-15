
<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Service Name</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Total</th>
		<th scope="col" class="text-1">Created at</th>
		{{-- <th scope="col" class="text-1">Last Updated at</th> --}}
		<th></th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $ot)
	<tr>
		<td>{{ $ot->reference_no }}</td>
		<td>{{ $ot->mode_of_payment }}</td>
		<td>{{ $ot->otherTransaction[0]->petsInformations->pet_name}} </td>
		<td>{{ $ot->otherTransaction[0]->variations->services->service_name}} - {{ $ot->otherTransaction[0]->variations->variation_name }}</td>
		<td>{{ $ot->otherTransaction[0]->price}} </td>
		<td>₱{{ number_format($ot->otherTransaction()->sum("total"), 2) }}</td>
		<td>{{ Carbon\Carbon::parse($ot->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		{{-- <td>{{ Carbon\Carbon::parse($ot->updated)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td> --}}
		<td></td>		
	</tr>
	@empty
	<tr>
		<td colspan="8">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>
