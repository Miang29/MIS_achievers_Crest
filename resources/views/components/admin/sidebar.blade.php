<div class="d-flex flex-row dark-shadow position-absolute position-lg-relative h-100 w-100 w-lg-auto" style="overflow: hidden;">
	{{-- Navigation Bar (SIDE) --}}
	<div class="sidebar dark-shadow custom-scroll d-flex flex-column py-3 px-0 collapse-horizontal overflow-y-auto h-100 bg-white" id="sidebar" aria-labelledby="sidebar-toggler" aria-expanded="false">
		{{-- DASHBOARD --}}
		@if (\Request::is('dashboard'))
		<span class="bg-secondary text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</span>
		@elseif (\Request::is('dashboard/*'))
		<a class="text-decoration-none aria-link bg-secondary text-white" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@else
		<a class="text-decoration-none text-dark aria-link" href="{{ route('dashboard') }}" aria-hidden="false" aria-label="Dashboard"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
		@endif

		{{-- ADMIN SETTING AREA --}}
		{{-- @if (Auth::user()->isAdmin()) --}}
			<hr class="w-100 custom-hr">

			{{-- TYPES --}}
			{{-- @if (Auth::user()->isAdmin()) --}}
				@if (\Request::is('admin/departments'))
				<span class="bg-secondary text-white"><i class="fas fa-people-group mr-2"></i>Departments</span>
				@elseif (\Request::is('admin/departments/*'))
				<a class="text-decoration-none aria-link bg-secondary text-white" href="@{{ route('admin.departments.index') }}" aria-hidden="false" aria-label="Departments"><i class="fas fa-people-group mr-2"></i>Departments</a>
				@else
				<a class="text-decoration-none text-dark aria-link" href="@{{ route('admin.departments.index') }}" aria-hidden="false" aria-label="Departments"><i class="fas fa-people-group mr-2"></i>Departments</a>
				@endif
			{{-- @endif --}}

			{{-- USERS --}}
			{{-- @if (Auth::user()->isAdmin()) --}}
				@if (\Request::is('admin/users'))
				<span class="bg-secondary text-white"><i class="fas fa-user-alt mr-2"></i>Users</span>
				@elseif (\Request::is('admin/users/*'))
				<a class="text-decoration-none text-white bg-secondary aria-link" href="@{{ route('admin.users.index') }}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
				@else
				<a class="text-decoration-none text-dark aria-link" href="@{{ route('admin.users.index') }}" aria-hidden="false" aria-label="Users"><i class="fas fa-user-alt mr-2"></i>Users</a>
				@endif
			{{-- @endif --}}

			{{-- SETTINGS --}}
			{{-- @if (Auth::user()->isAdmin()) --}}
				@if (\Request::is('admin/settings'))
				<span class="bg-secondary text-white"><i class="fas fa-gear mr-2"></i>Settings</span>
				@elseif (\Request::is('admin/settings/*'))
				<a class="text-decoration-none text-white bg-secondary aria-link" href="@{{ route('admin.settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
				@else
				<a class="text-decoration-none text-dark aria-link" href="@{{ route('admin.settings.index') }}" aria-hidden="false" aria-label="Settings"><i class="fas fa-gear mr-2"></i>Settings</a>
				@endif
			{{-- @endif --}}
		{{-- @endif --}}

		{{-- SIGNOUT --}}
		<hr class="w-100 custom-hr">

		<a class="text-decoration-none text-dark aria-link" href="@{{ route('logout') }}" aria-hidden="false" aria-label="Logout"><i class="fas fa-sign-out-alt mr-2"></i>Sign Out</a>
	</div>
</div>