{{-- Navigation Bar (TOP) --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white  border-bottom position-sticky position-lg-relative py-0 px-3" style="z-index: 1000;" id="navbar">
	<div class="container-fluid">
		{{-- Branding --}}
		<a class="navbar-brand my-2 m-2 py-0 font-weight-bold" href="#" style="height: auto;">
			<img src="{{ asset('uploads/settings/banner.png') }}" style="max-height: 2.25rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}" />
			<h8 style="font-size:1.5rem; color:#021f53;">Veterinary Clinic</h8>
		</a>

		{{-- Navbar Toggler --}}
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-label="Toggle Navbar" id="navbar-toggler">
			<span class="navbar-toggler-icon"></span>
		</button>

		{{-- Navbar contents --}}
		<div class="navbar-collapse collapse bg-white" id="navbar">
			<div class="mx-auto pl-5">
				<ul class="navbar-nav mr-auto">
					@if (Request::is('/'))
					<li class="nav-item active ">
						<a class="nav-link font-weight-bold active" style="color:#021f53; border-bottom: #4D6C85 solid;" href="{{ route('home') }}"><i class="fa-solid fa-house mr-2"></i>Home</a>
						@else
					</li>
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="{{ route('home') }}"><i class="fa-solid fa-house mr-2"></i>Home</a>
						@endif
					</li>

					@if (\Request::is('services-offer'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold active" style="color:#021f53; border-bottom: #4D6C85 solid;"><i class="fa-solid fa-chart-simple mr-2"></i>Services <span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold " href="{{route ('services-offer')}}"><i class="fa-solid fa-chart-simple mr-2"></i>Services</a>
					</li>
					@endif


					@if (\Request::is('appointment'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold active" style="color:#021f53; border-bottom: #4D6C85 solid;"><i class="fa-solid fa-calendar-check mr-2 "></i>Appointment<span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item">
						@if(Auth::check())
						<a class="nav-link font-weight-bold" href="{{ route('appointment') }}"><i class="fa-solid fa-calendar-check mr-2"></i>Appointment</a>
						@else
						<a class="nav-link font-weight-bold" href="{{ route('login') }}"><i class="fa-solid fa-calendar-check mr-2"></i>Appointment</a>
						@endif
					</li>
					@endif

					@if (Request::is('about-us'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold active" style="color:#021f53; border-bottom: #4D6C85 solid;"><i class="fa-solid fa-circle-info mr-2"></i>About Us <span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="{{ route('about-us') }}"> <i class="fa-solid fa-circle-info mr-2"></i>About Us</a>
					</li>
					@endif

					@if (Request::is('contact-us'))
					<li class="nav-item active">
						<a class="nav-link font-weight-bold active " style="color:#021f53; border-bottom: #4D6C85 solid;" href="{{ route('contact-us') }}"><i class="fa-solid fa-phone mr-2"></i>Contact Us</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold " href="{{ route('contact-us') }}"><i class="fa-solid fa-phone mr-2"></i>Contact Us</a>
					</li>
					@endif

					{{-- LOGIN --}}
					@if(!Auth::check())
					<a class="nav-link font-weight-bold" style="color:#021f53;" data-toggle="tooltip" data-placement="top" title="Login" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket ml-5"></i></a>
					<a class="nav-link font-weight-bold" style="color:#021f53;" data-toggle="tooltip" data-placement="top" title="Sign Up" href="{{ route('sign-up') }}"><i class="fa-solid fa-user-plus ml-5"></i></a>
					@else

					{{-- PROFILE --}}
					<div class="dropdown ml-5">
						<a class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->getName() }}
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu">
							<a class="dropdown-item" href="{{ route('profile', [Auth::user()->id]) }}"><i class="fa-solid fa-user mr-2"></i>My Profile</a>
							<div class="dropdown-divider"></div>
							@if(Auth::user()->user_type_id != 4)
							<a class="dropdown-item" href="{{ route('dashboard')}}"><i class="fa-solid fa-chart-simple mr-2"></i>Dashboard</a>
							<div class="dropdown-divider"></div>
							@endif
							{{-- LOGOUT --}}
							<a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a>
						</div>
					</div>
					@endif
				</ul>
			</div>
		</div>
	</div>
</nav>