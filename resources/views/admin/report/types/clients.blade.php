<thead>
	<tr>
		<th scope="col" class="text-1">Pet Owner</th>
		<th scope="col" class="text-1">Email</th>
		<th scope="col" class="text-1">Telephone No</th>
		<th scope="col" class="text-1">Mobile No</th>
		<th scope="col" class="text-1">Address</th>
		<th scope="col" class="text-1">Type</th>
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