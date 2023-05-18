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
	@forelse ($data as $s)
	<tr>
		<td>{{ $s->servicesCategory->service_category_name }}</td>
		<td>{{ $s->service_name }}</td>
		<td>{{ $s->variations[0]->variation_name}}</td>
		<td>₱{{ number_format($s->variations[0]->price, 2) }}</td>
		<td>{{ $s->variations[0]->remarks }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="5">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>