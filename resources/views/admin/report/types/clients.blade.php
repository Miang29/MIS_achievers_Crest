<thead>
	<tr>
		<th scope="col" class="text-1">Username</th>
		<th scope="col" class="text-1">Name</th>
		<th scope="col" class="text-1">Email</th>
		<th scope="col" class="text-1">Address</th>
		<th scope="col" class="text-1">Created At</th>
		<th scope="col" class="text-1">Last Updated At</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $c)
	<tr>
		<td>{{ $c->username }}</td>
		<td>{{ $c->getName() }}</td>
		<td>{{ $c->email }}</td>
		<td>{{ $c->address }}</td>
		<td>{{ Carbon\Carbon::parse($c->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td>{{ Carbon\Carbon::parse($c->updated_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>