@extends('layouts.admin')

@section('title', 'Report')

@section('content')


<div class="container-fluid px-2 px-lg-6 py-2 h-auto my-3">
	<div class="row">
		<div class="col-12 col-lg text-center text-lg-left">
			<h2 class="text-1">REPORTS</h2>
			<hr class="hr-thick" style="border-color: #707070;">
		</div>
	</div>

<div class="col-lg-12 col-12 col-md-12 mr-auto">
	<div class="row ">
		<div class="dropdown mr-4 ml-auto my-3">
			  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Select Reports
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a href="{{ route('report.index', ['t' => 'users', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'users' ? 'active' : '' }}"><i class="fas fa-user-alt mr-2"></i>Users</a>	
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'clients', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'clients' ? 'active' : '' }}"><i class="fas fa-address-card mr-2"></i>Client</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'pets', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'pets' ? 'active' : '' }}"><i class="fa-solid fa-dog mr-2"></i>Pets</a>			
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'appointments', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'appointments' ? 'active' : '' }}"><i class="fa-solid fa-calendar mr-2"></i>Appointment</a>				
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'inventory', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'inventory' ? 'active' : '' }}"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'transaction-sales', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1"><i class="fas fa-money-check-dollar mr-2"></i>Product Order</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'services', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'services' ? 'active' : '' }}"><i class="fa-solid fa-chart-simple mr-2"></i>Services</a>
			  </div>
		</div>
		<div class="dropdown mr-auto my-3">
			  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Select Transaction Reports
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a href="{{ route('report.index', ['t' => 'transaction-services', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'transaction-services' ? 'active' : '' }}"><i class="fa-solid fa-user-doctor mr-2"></i>Consultation Transaction</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'transaction-vaccination', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'transaction-vaccination' ? 'active' : '' }}"><i class="fa-solid fa-syringe mr-2"></i>Vaccination Transaction</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'transaction-grooming', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'transaction-grooming' ? 'active' : '' }}"><i class="fa-solid fa-scissors mr-2"></i>Grooming Transaction</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'transaction-boarding', 'from' => $from, 'to' => $to]) }}" class="dropdown-item m-1 {{ $type == 'transaction-boarding' ? 'active' : '' }}"><i class="fa-solid fa-house-chimney-medical mr-2"></i>Boarding Transaction</a>
				<div class="dropdown-divider"></div>
				<a href="{{ route('report.index', ['t' => 'transaction-other', 'from' => $from, 'to' => $to]) }}" class="dropdown-item btn-sm m-1 {{ $type == 'transaction-other' ? 'active' : '' }}"><i class="fas fa-solid fa-house mr-2"></i>Home Service</a>
			  </div>
		</div>
	</div>
</div>

	<div class="overflow-x-auto h-100 card mb-3">
		<div class="card-header bg-white">
			<form action="{{ route('report.index') }}" class="" enctype="multipart/form-data">
				<input type="hidden" name="t" value="{{ $type }}">
				<div class="col-lg-12 row mx-auto">
				{{-- FROM --}}
				<div class="col-12 col-lg-6 col-md-4 col-lg-3 my-2 text-center input-group">
					<div class="input-group-prepend">
						<label class="font-weight-bold text-1 input-group-text" for="from_date">From</label>
					</div>
					<input class="form-control" type="date" id="from_date" name="from" value="{{ $from }}"/>
				</div>
		
				{{-- TO --}}
				<div class="col-12 col-lg-6 col-md-4 col-lg-3 my-2 text-center input-group">
					<div class="input-group-prepend">
						<label class="font-weight-bold text-1 input-group-text" name="to" for="to_date">To</label>
					</div>
					<input class="form-control" type="date" id="to_date" name="to" value="{{ $to }}"/>
				</div>
			 </div>
				{{-- SUBMIT --}}
				<div class="col-12 col-lg-4 col-md-3 my-2 text-center mx-auto ">
					<button type="submit" class="btn btn-success btn-sm w-lg-75 w-100 w-md-75 font-weight-bold" data-action="filter">Filter</button>
				</div>

			</form>
		</div>

		<div class="card-body">
			<table class="table table-striped text-center" id="table-content">
				@if (in_array($type, ['users', 'clients', 'pets', 'appointments', 'inventory', 'transaction-sales', 'transaction-services', 'transaction-vaccination', 'transaction-grooming', 'transaction-boarding', 'transaction-other', 'services']))
				@include("admin.report.types.{$type}", ['data' => $data])
				@else
				<tbody>
					<tr>
						<td class="text-center">Report type doesn't exists...</td>
					</tr>
				</tbody>
				@endif
			</table>
		</div>

		<div class="card-footer d-flex justify-content-center flex-wrap">
			<a href="{{ route('report.print', ['output' => 'print', 't' => $type, 'from' => $from, 'to' => $to]) }}" target="_new" class="btn btn-outline-info btn-sm mx-2"><i class="fa-solid fa-print mr-2"></i>Print Report</a>
			<a href="{{ route('report.print', ['output' => 'pdf', 't' => $type, 'from' => $from, 'to' => $to]) }}" target="_new" class="btn btn-outline-info btn-sm mx-2"><i class="fa-solid fa-file-pdf mr-2"></i>Download Report (PDF)</a>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/disable-on-submit.js') }}"></script>
@endsection