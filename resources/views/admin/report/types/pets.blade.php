
<thead>
	<tr>
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
	@forelse ($data as $p)
	<tr>
		<td>{{ $p->pet_name}}</td>
		<td>{{ $p->breed}}</td>
		<td>{{ $p->colors}}</td>
		<td>{{ $p->birthdate}}</td>
		<td>{{ $p->species}}</td>
		<td>{{ $p->gender}}</td>
		<td>{{ $p->types}}</td>
	</tr>
	@empty
	<tr>
		<td colspan="8">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>
