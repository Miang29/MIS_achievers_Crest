@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class=" card flex-fill mt-3 mb-3 shadow-sm p-3 bg-white rounded">
	<div class="card-body h-100 px-0 pt-0">
		<div class="row">
			<div class="col-12 col-lg text-center text-lg-left my-2">
				<h2 class="text-1">DASHBOARD</h2>
			</div>
		</div>

		{{-- FIRST ROW --}}
		<div class="row mb-3">
			{{-- PATIENTS --}}
			<div class="col-12 col-md-6 col-lg-3 my-3">
				<div class="total-block bg-info text-white dark-shadow invisiborder rounded">
					<div class="row">
						<i class="fas fa-paw fa-5x mx-4 mt-3"></i>
						<div class="d-flex flex-d-col flex-grow-1 text-right">
							<h1 class="my-auto">{{ $patients->count() }}</h1>
						</div>
					</div>

					<div class="d-flex flex-d-col flex-grow-1 text-right">
						<h6 class="mx-auto ml-3 ">Patients</h6>
					</div>
				</div>
			</div>

			{{-- SALES --}}
			<div class="col-12 col-md-6 col-lg-3 my-3">
				<div class="total-block bg-2 text-white dark-shadow invisiborder rounded">
					<div class="row">
						<i class="fa-solid fa-dollar-sign fa-5x mx-4 mt-3"></i>

						<div class="d-flex flex-d-col flex-grow-1 text-right">
							<h1 class="my-auto text-wrap">{{ number_format($sales, 2) }}</h1>
						</div>
					</div>

					<div class="d-flex flex-d-col flex-grow-1 text-right">
						<h6 class="mx-auto ml-3 ">Sales</h6>
					</div>
				</div>
			</div>

			{{-- STOCKS --}}
			<div class="col-12 col-md-6 col-lg-3  my-3">
				<div class="total-block bg-3 text-white dark-shadow invisiborder rounded">
					<div class="row">
						<i class="fa-solid fa-boxes-stacked fa-5x mx-4 mt-3"></i>

						<div class="d-flex flex-d-col flex-grow-1 text-right">
							<h2 class="my-auto">{{ $products}}</h2>
						</div>
					</div>

					<div class="d-flex flex-d-col flex-grow-1 text-right">
						<h6 class="mx-auto ml-3 ">Stocks</h6>
					</div>
				</div>
			</div>

			{{-- CLIENTS --}}
			<div class="col-12 col-md-6 col-lg-3  my-3">
				<div class="total-block bg-4 text-white dark-shadow invisiborder rounded">
					<div class="row">
						<i class="fas fa-users fa-5x mx-4 mt-3"></i>

						<div class="d-flex flex-d-col flex-grow-1 text-right">
							<h1 class="my-auto">{{$client}}</h1>
						</div>
					</div>

					<div class="d-flex flex-d-col flex-grow-1 text-right">
						<h6 class="mx-auto ml-3 ">Clients</h6>
					</div>
				</div>
			</div>
		</div>

		{{-- SECOND ROW --}}
		<div class="row my-3">
			{{-- MONTHLY EARNINGS --}}
			<div class="col-12 col-lg-6 d-flex flex-column my-3 my-xl-0">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header text-center">Monthly Earnings</h5>

					<div class="card-body d-flex">
						<canvas id="monthlyEarnings" class="rounded m-auto" style="border: solid 1px #707070;"></canvas>
					</div>
				</div>
			</div>

			{{-- UNREAD MESSAGES --}}
			<div class="col-12 col-lg-4 d-flex flex-column my-3 my-xl-0">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header text-center">Unread Messages</h5>
					
					<div class="card-body">
					</div>
				</div>
			</div>

			{{-- QUICK ACTIONS --}}
			<div class="col-12 col-lg-2 d-flex flex-column my-3 my-xl-0">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header text-center text-center">Quick Actions</h5>

					<div class="card-body">
					</div>
				</div>
			</div>
		</div>

		<div class="row my-3">
			{{-- LOW STOCKS --}}
			<div class="col-12 col-lg-6">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header text-center">Low Stocks</h5>
					
					<div class="card-body h-100 px-0 pt-0 overflow-x-auto">
						<table class="table table-striped text-center" id="table-content">
							<thead>
								<tr>
									<th scope="col" class="hr-thick text-1">Product Name</th>
									<th scope="col" class="hr-thick text-1">Stocks</th>
									<th scope="col" class="hr-thick text-1">Price</th>
									<th scope="col" class="hr-thick text-1">Status</th>
								</tr>
							</thead>

							<tbody>
								@forelse ($inventory as $i)
								<tr>
									<td>{{ $i->product_name }}</td>
									<td>{{ $i->stocks }}</td>
									<td>₱{{ number_format($i->price, 2) }}</td>

									<td>
										<i class="fas fa-circle text-danger mr-2"></i>Low Inventory
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="4">Nothing to show~</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{-- PENDING APPOINTMENTS --}}
			<div class="col-12 col-lg-6">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header text-center">Pending Appointments</h5>

					<div class="card-body h-100 px-0 pt-0 overflow-x-auto">
						<table class="table table-striped text-center" id="table-content">
							<thead>
								<tr>
									<th scope="col" class="hr-thick text-1">Client Name</th>
									<th scope="col" class="hr-thick text-1">Appointment Date</th>
									<th scope="col" class="hr-thick text-1">Service</th>
								</tr>
							</thead>

							<tbody>
								@forelse ($appointments as $ap)
								<tr>
									<td class="text-center">{{ $ap->user->getName() }}</td>
									<td class="text-center">{{ \Carbon\Carbon::parse($ap->reserved_at)->format("M d, Y") }} ({{ $ap->getAppointedTime() }})</td>
									<td class="text-center">{{ $ap->service->service_name }}</td>
								</tr>
								@empty
								<tr>
									<td colspan="4">Nothing to show~</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	var myChart;
	$(document).ready(() => {
		let target = $('#monthlyEarnings');
		let labels = [
			@foreach ($months as $m)
			'{{$m}}',
			@endforeach
		];
		let dataset = [{
			data: [
				@for ($i = 0; $i < count($months); $i++)
				{{$monthly_earnings[$i]}},
				@endfor
			],
			borderColor: '#707070',
			backgroundColor: '#021f53',
		}];

		myChart = new Chart(target, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: dataset
			},
			options: {
				plugins: {
					legend: {
						display: false,
					}
				},
				responsive: true,
				maintainAspectRatio: true,
				aspectRatio: '1:2'
			}
		});

		myChart.resize(1000, 1000);

		window.addEventListener('beforeprint', () => {
			myChart.resize(1000, 1000);
		});

		window.addEventListener('afterprint', () => {
			myChart.resize();
		});
	});
</script>
@endsection