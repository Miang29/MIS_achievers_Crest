<thead>
	<tr>
		<th scope="col" class="text-1">Category Name</th>
		<th scope="col" class="text-1">Service Name</th>
		<th scope="col" class="text-1">Variation</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Remarks</th>
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
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>