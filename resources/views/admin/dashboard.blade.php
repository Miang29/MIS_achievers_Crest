@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class=" card flex-fill mt-3 mb-3 shadow-sm p-3 bg-white rounded">
	<div class="card-body h-100 px-0 pt-0">
		<div class="col-12 col-lg text-center text-lg-left my-2 ">
			<h2 class="text-1 ml-2">DASHBOARD</h2>
		</div>

		{{-- FIRST ROW --}}
		<div class="row my-3 mr-2 ml-2">
			{{-- PATIENTS --}}
			<div class="col-12 col-md-6 col-lg-3 my-3">
				<div class="total-block bg-info text-white dark-shadow invisiborder rounded">
					<i class="fas fa-paw fa-5x mx-2 mt-2"></i>
					<div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
						<h6 class="my-auto">Patients</h6>
						<h6 class="my-auto"></h6>
					</div>
				</div>
			</div>

			{{-- VACCINATED --}}
			<div class="col-12 col-md-6 col-lg-3  my-3">
				<div class="total-block bg-2 text-white dark-shadow invisiborder rounded">
					<i class="fas fa-syringe fa-5x mx-2 mt-2"></i>
					<div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
						<h6 class="my-auto">Vaccinated</h6>
						<h6 class="my-auto"></h6>
					</div>
				</div>
			</div>

			{{-- STOCKS --}}
			<div class="col-12 col-md-6 col-lg-3  my-3">
				<div class="total-block bg-3 text-white dark-shadow invisiborder rounded">
					<i class="fas fa-arrow-trend-up fa-5x mx-2 mt-2"></i>
					<div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
						<h6 class="my-auto">Stocks</h6>
						<h6 class="my-auto"></h6>
					</div>
				</div>
			</div>

			{{-- CLIENTS --}}
			<div class="col-12 col-md-6 col-lg-3  my-3">
				<div class="total-block bg-4 text-white dark-shadow invisiborder rounded">
					<i class="fas fa-users fa-5x mx-2 mt-2"></i>
					<div class="d-flex flex-d-col flex-grow-1 text-right ml-3">
						<h6 class="my-auto">Clients</h6>
						<h6 class="my-auto"></h6>
					</div>
				</div>
			</div>
		</div>

		{{-- SECOND ROW --}}
		<div class="row">
			{{-- MONTHLY EARNINGS --}}
			<!-- MONTHLY EARNINGS -->
			<div class="col-12 col-lg-6 d-flex flex-column my-3 my-xl-0 mx-auto">
				<div class="card border rounded dark-shadow h-100">
					<h5 class="card-header">Monthly Earnings</h5>
					<div class="card-body d-flex">
						<canvas id="monthlyEarnings" class="rounded m-auto" style="border: solid 1px #707070;"></canvas>
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