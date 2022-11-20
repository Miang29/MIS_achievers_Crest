<thead>
	<tr>
		<th scope="col" class="text-1">Avatar</th>
		<th scope="col" class="text-1">Pet Name</th>
		<th scope="col" class="text-1">Breed</th>
		<th scope="col" class="text-1">Color/s</th>
		<th scope="col" class="text-1">Birthdate</th>
		<th scope="col" class="text-1">Species</th>
		<th scope="col" class="text-1">Gender</th>
		<th scope="col" class="text-1">Types</th>
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
		<td></td>
	</tr>
	@empty
	<tr>
		<td colspan="8">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>