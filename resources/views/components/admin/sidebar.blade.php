<div class="d-flex flex-row dark-shadow position-absolute position-lg-relative h-100 w-100 w-lg-auto" style="overflow: hidden;">
	{{-- Navigation Bar (SIDE) --}}
	<div class="sidebar dark-shadow custom-scroll d-flex flex-column py-3 px-0 collapse-horizontal overflow-y-auto h-100 bg-white" id="sidebar" aria-labelledby="sidebar-toggler" aria-expanded="false">
		{{-- DASHBOARD --}}
		@if (\Request::is('dashboard'))
		<span class="bg-1 text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</span>
		@elseif (\Request::is('dashboard/*'))
		<a class="text-decoration-none aria-link bg-col text-white" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@else
		<a class="text-decoration-none text-dark font-weight-bold aria-link" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@endif

		{{-- ADMIN SETTING AREA --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		<hr class="w-100 custom-hr">

		{{-- Client Profile --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/clientprofile'))
		<span class="bg-secondary text-white"><i class="fas fa-address-card mr-2"></i>Client Profile</span>
		@elseif (\Request::is('admin/clientprofile/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('client-profile')}}" aria-hidden="false" aria-label="Reservation"><i class="fas fa-address-card mr-2"></i>Client Profile</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('client-profile')}}" aria-hidden="false" aria-label="Reservation"><i class="fas fa-address-card mr-2"></i>Client Profile</a>
		@endif
		{{-- @endif --}}

		{{-- Appointment --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/appointments'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-calendar mr-2"></i>Appointments</span>
		@elseif (\Request::is('admin/appointments/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{route('appointments.index')}}" aria-hidden="false" aria-label="Appointments"><i class="fa-solid fa-calendar mr-2"></i>Appointments</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('appointments.index')}}" aria-hidden="false" aria-label="Appointments"><i class="fa-solid fa-calendar mr-2"></i>Appointments</a>
		@endif
		{{-- @endif --}}


		{{-- Transaction --}}
		<a class="btn text-decoration-none text-1 font-weight-bold aria-link text-left" aria-label="transaction" data-toggle="collapse" href="#collapseItem2" role="button" aria-expanded="false" aria-controls="collapseItem2">
			<i class="fa-solid fa-money-check-dollar mr-2"></i>Transaction
		</a>
		<div class="collapse " id="collapseItem2">
			<div class="card card-body">
				<a class="dropdown-item  " href="{{route('products-order')}}"><i class="fas fa-money-check-dollar mr-1 "></i>Products Order</a>
				<a class="dropdown-item  font-weight-bold" href="{{route('services')}}"><i class="fas fa-shield-cat mr-1"></i>Services Transaction</a>
			</div>
		</div>
		{{-- @endif --}}


		{{-- Inventory --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/inventory'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</span>
		@elseif (\Request::is('admin/inventory/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{route('category')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('category')}}" aria-hidden="false" aria-label="Transaction"><i class="fa-solid fa-warehouse mr-2"></i>Inventory</a>
		@endif
		{{-- @endif --}}
	
		<hr class="w-100 custom-hr">

		{{-- Reports --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/reports'))
		<span class="bg-secondary text-white"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</span>
		@elseif (\Request::is('admin/reports/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{ route('report') }}" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{ route('report') }}" aria-hidden="false" aria-label="Reports"><i class="fa-solid fa-chart-simple mr-2"></i>Reports</a>
		@endif
		{{-- @endif --}}


		{{-- USERS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/users'))
		<span class="bg-secondary text-white"><i class="fas fa-user-alt mr-2"></i>Users</span>
		@elseif (\Request::is('admin/users/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{route('user-account')}}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{route('user-account')}}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
		@endif
		{{-- @endif --}}

		{{-- SETTINGS --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
		@if (\Request::is('admin/settings'))
		<span class="bg-secondary text-white"><i class="fas fa-gear mr-2"></i>Settings</span>
		@elseif (\Request::is('admin/settings/*'))
		<a class="text-decoration-none text-white bg-secondary aria-link" href="{{ route('settings') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
		@else
		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{ route('settings') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
		@endif
		{{-- @endif --}}
		{{-- @endif --}}

		{{-- SIGNOUT --}}
		<hr class="w-100 custom-hr">

		<a class="text-decoration-none text-1 font-weight-bold aria-link" href="{{ route('logout') }}" aria-hidden="false" aria-label="Logout"><i class="fas fa-sign-out-alt mr-2"></i>Sign Out</a>

		<hr class="w-100 custom-hr">
		<!-- DATE - TIME -->
		<small class="text-lg-center px-3 font-weight-bold text-1">{{ \Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y') }} - <span id="time">{{ \Carbon\Carbon::now()->timezone('Asia/Manila')->format('g:i:s A') }}</span></small>

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