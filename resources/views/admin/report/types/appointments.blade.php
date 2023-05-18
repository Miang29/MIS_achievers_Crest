<thead>
	<tr>
		<th scope="col" class="text-1">Appointment #</th>
		<th scope="col" class="text-1">Client Name</th>
		<th scope="col" class="text-1">Appointment Date - Time</th>
		<th scope="col" class="text-1">Service Type</th>
		<th scope="col" class="text-1">Pet Name</th>	
	</tr>
</thead>

<tbody>
	@forelse ($data as $ap)
	<tr>
		<td>{{ $ap->appointment_no }}</td>
		<td>{{ $ap->user->getName() }}</td>
		<td>{{ \Carbon\Carbon::parse($ap->reserved_at)->format("M d, Y") }} ({{ $ap->getAppointedTime() }})</td>
		<td>{{ $ap->service->service_name }}</td>
		<td>{{ $ap->petsInformations->pet_name }}</td>
	</tr>
	@empty
	<tr>
		<td colspan="5">Nothing to show~</td>
	</tr>
	@endforelse
</tbody>
