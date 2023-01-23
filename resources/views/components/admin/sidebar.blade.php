<div class="d-flex flex-row dark-shadow position-absolute position-lg-relative h-100 w-100 w-lg-auto" style="overflow: hidden;">
	{{-- Navigation Bar (SIDE) --}}
	<div class="sidebar dark-shadow p-2 bg-white custom-scroll d-flex flex-column py-3 px-0 collapse-horizontal overflow-y-auto h-100 bg-white" id="sidebar" aria-labelledby="sidebar-toggler" aria-expanded="false">
		{{-- DASHBOARD --}}
		@if (\Request::is('dashboard'))
		<span class="bg-1 text-white"><i class="fas fa-tachometer-alt  mr-3 fa-lg"></i>Dashboard</span>
		@elseif (\Request::is('dashboard/*'))
		<a class="text-decoration-none aria-link bg-col text-white" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt  mr-3 fa-lg"></i>Dashboard</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-3 fa-lg"></i>Dashboard</a>
		@endif

		{{-- ADMIN SETTING AREA --}}
		
		{{-- @if (Auth::user()->user_type_id == 1) --}}
		{{-- // Open admin side --}}
		{{-- @elseif  (Auth::user()->user_type_id == 2) --}}
		
		
		{{-- Client Profile --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/client-profile'))
		<span class="bg-secondary text-white"><i class="fas fa-address-card  mr-3 fa-lg"></i>Pet Information</span>
		@elseif (\Request::is('admin/client-profile/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('client-profile')}}" aria-hidden="false" aria-label="Reservation"><i class="fas fa-address-card  mr-3 fa-lg"></i>Pet Information</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{route('client-profile')}}" aria-hidden="false" aria-label="Reservation"><i class="fas fa-address-card  mr-3 fa-lg"></i>Pet Information</a>
		@endif
		{{-- @endif --}}

		{{-- Appointment --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/appointments'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-calendar  mr-3 fa-lg"></i>Appointments</span>
		@elseif (\Request::is('admin/appointments/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('appointments.index')}}" aria-hidden="false" aria-label="Appointments"><i class="fa-solid fa-calendar  mr-3 fa-lg"></i>Appointments</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{route('appointments.index')}}" aria-hidden="false" aria-label="Appointments"><i class="fa-solid fa-calendar  mr-3 fa-lg"></i>Appointments</a>
		@endif
		{{-- @endif --}}


		{{-- Services --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/service-category'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Services</span>
		@elseif (\Request::is('admin/service-category/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('service_category.index')}}" aria-hidden="false" aria-label="Reservation"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Services</a>
		@else
		<a class="text-decoration-none text-1  aria-link" href="{{route('service_category.index')}}" aria-hidden="false" aria-label="Reservation"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Services</a>
		@endif
		{{-- @endif --}}


		{{-- Inventory --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/inventory'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-warehouse  mr-2 fa-lg"></i>Inventory</span>
		@elseif (\Request::is('admin/inventory/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{route('category')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse mr-3 fa-lg"></i>Inventory</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{route('category')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse  mr-2 fa-lg"></i>Inventory</a>
		@endif
		{{-- @endif --}}


		{{-- Transaction --}}
		<a class="btn text-decoration-none text-1 aria-link text-left" aria-label="transaction" data-toggle="collapse" href="#collapseItem2" role="button" aria-expanded="false" aria-controls="collapseItem2">
			<i class="fa-solid fa-money-check-dollar  mr-2 fa-lg"></i>Transaction
		</a>
		<div class="collapse" id="collapseItem2">
			<div class="card">
				<a class="dropdown-item" href="{{route('transaction.products-order')}}"><i class="fas fa-money-check-dollar mr-2 fa-lg "></i>Products Order</a>
				<a class="dropdown-item" href="{{route('transaction.service')}}"><i class="fas fa-shield-cat mr-2 fa-lg"></i>Services</a>
			</div>
		</div>
		{{-- @endif --}}

		<hr class="w-100 custom-hr">


		{{-- Reports --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/report'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Reports</span>
		@elseif (\Request::is('admin/report/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{ route('report.index') }}" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Reports</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{ route('report.index') }}" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple  mr-3 fa-lg"></i>Reports</a>
		@endif
		{{-- @endif --}}


		{{-- USERS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/users'))
		<span class="bg-secondary text-white"><i class="fas fa-user-alt  mr-3 fa-lg"></i>Users</span>
		@elseif (\Request::is('admin/users/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{route('user.index')}}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-3 fa-lg"></i>Users</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{route('user.index')}}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt  mr-3 fa-lg"></i>Users</a>
		@endif
		{{-- @endif --}}

		{{-- SETTINGS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/settings'))
		<span class="bg-secondary text-white"><i class="fas fa-gear  mr-3 fa-lg"></i>Settings</span>
		@elseif (\Request::is('admin/settings/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{ route('settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear  mr-3 fa-lg"></i>Settings</a>
		@else
		<a class="text-decoration-none text-1 aria-link" href="{{ route('settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear  mr-3 fa-lg"></i>Settings</a>
		@endif
		{{-- @endif --}}
		{{-- @endif --}}

		{{-- SIGNOUT --}}
		<hr class="w-100 custom-hr">

		<a class="text-decoration-none text-1 aria-link" href="{{ route('logout') }}" aria-hidden="false" aria-label="Logout"><i class="fas fa-sign-out-alt  mr-3 fa-lg"></i>Sign Out</a>

		<hr class="w-100 custom-hr">
		<!-- DATE - TIME -->
		<small class="text-lg-center font-weight-bold px-2 text-1">{{ \Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y') }} - <span id="time">{{ \Carbon\Carbon::now()->timezone('Asia/Manila')->format('g:i:s A') }}</span></small>

		<!-- SCRIPT -->
		<script type="text/javascript">
			$(document).ready(() => {
				setInterval(() => {
					$('#time').text(new Date().toLocaleTimeString());
				}, 500);
			});
		</script>

	</div>

</div>