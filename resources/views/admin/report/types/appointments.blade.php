<thead>
	<tr>
		<th scope="col" class="text-1">Pet Owner</th>
		<th scope="col" class="text-1">Email</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Date</th>
		<th scope="col" class="text-1">Time</th>
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
		<td colspan="5">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>