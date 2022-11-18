<thead>
	<tr>
		<th scope="col" class="text-1">Username</th>
		<th scope="col" class="text-1">Name</th>
		<th scope="col" class="text-1">Email</th>
		<th scope="col" class="text-1">User Type</th>
		<th scope="col" class="text-1">Created At</th>
		<th scope="col" class="text-1">Last Updated At</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $u)
	<tr>
		<td>{{ $u->username }}</td>
		<td>{{ $u->getName() }}</td>
		<td>{{ $u->email }}</td>
		<td>{{ $u->userType->name }}</td>
		<td>{{ Carbon\Carbon::parse($u->created_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
		<td>{{ Carbon\Carbon::parse($u->updated_at)->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>