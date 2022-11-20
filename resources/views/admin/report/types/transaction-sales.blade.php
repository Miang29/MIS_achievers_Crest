<thead>
	<tr>
		<th scope="col" class="text-1">Reference No</th>
		<th scope="col" class="text-1">Mode of Payment</th>
		<th scope="col" class="text-1">Product Name</th>
		<th scope="col" class="text-1">Product No</th>
		<th scope="col" class="text-1">Category Type</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Quantity</th>
		<th scope="col" class="text-1">Total Price</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $u)
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>