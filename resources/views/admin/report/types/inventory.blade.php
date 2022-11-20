<thead>
	<tr>
		<th scope="col" class="text-1">Category Name</th>
		<th scope="col" class="text-1">Product Name</th>
		<th scope="col" class="text-1">Stocks</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Status</th>
		<th scope="col" class="text-1">Description</th>
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
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>