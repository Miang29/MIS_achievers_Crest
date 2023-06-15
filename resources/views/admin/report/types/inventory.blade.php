
<thead>
	<tr>
		<th scope="col" class="text-1">Product Name</th>
		<th scope="col" class="text-1">Stocks</th>
		<th scope="col" class="text-1">Price</th>
		<th scope="col" class="text-1">Status</th>
		<th scope="col" class="text-1">Description</th>
	</tr>
</thead>

<tbody>
	@forelse ($data as $p)
	<tr>
		<td>{{ $p->product_name }}</td>
		<td>{{ $p->stocks }}</td>
		<td>₱{{ number_format($p->price, 2) }}</td>
		<td>{{ $p->status }}</td>
		<td>{{ $p->description }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="6">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>