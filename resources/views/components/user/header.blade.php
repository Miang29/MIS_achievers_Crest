{{-- Navigation Bar (TOP) --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light position-sticky position-lg-relative dark-shadow py-0 px-3" style="z-index: 1000;" id="navbar">
	<div class="container-fluid">
		{{-- Branding --}}
		<a class="navbar-brand my-2 m-2 py-0 font-weight-bold" href="#" style="height: auto;">
			<img src="{{ asset('uploads/settings/banner.png') }}" style="max-height: 2.25rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}" />
			<h8  style="font-size:1.5rem; color:#021f53;">Veterinary Clinic</h8>
		</a>

		{{-- Navbar Toggler --}}
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-label="Toggle Navbar" id="navbar-toggler">
			<span class="navbar-toggler-icon"></span>
		</button>

		{{-- Navbar contents --}}
		<div class="navbar-collapse collapse" id="navbar">
			<div class="mx-auto pl-5">
				<ul class="navbar-nav mr-auto">
				@if (Request::is('/'))
					<li class="nav-item active ">
						<a class="nav-link font-weight-bold" href="{{ route('home') }}"><i class="fa-solid fa-house mr-2"></i>Home</a>
						@else
						<a class="nav-link font-weight-bold" href="{{ route('home') }}"><i class="fa-solid fa-house mr-2"></i>Home</a>
						@endif
					</li>

					
					@if (\Request::is('services-offer'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold active"><i class="fa-solid fa-chart-simple mr-2"></i>Services <span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold " href="{{route ('services-offer')}}"><i class="fa-solid fa-chart-simple mr-2"></i>Services</a>
					</li>
					@endif

					@if (Request::is('about-us'))
					<li class="nav-item active">
						<a class="nav-link font-weight-bold" href="{{ route('about-us') }}"><i class="fa-solid fa-circle-info mr-2"></i>About Us</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="{{ route('about-us') }}"> <i class="fa-solid fa-circle-info mr-2"></i>About Us</a>
					</li>
					@endif

					@if (Request::is('contact-us'))
					<li class="nav-item active">
						<a class="nav-link font-weight-bold " href="{{ route('contact-us') }}"><i class="fa-solid fa-phone mr-2"></i>Contact Us</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold " href="{{ route('contact-us') }}"><i class="fa-solid fa-phone mr-2"></i>Contact Us</a>
					</li>
					@endif

					@if (\Request::is('appointment'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold"><i class="fa-solid fa-calendar mr-2"></i>Appointment <span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link font-weight-bold" href="{{ route('appointment') }}"><i class="fa-solid fa-calendar mr-2"></i>Appointment</a>
					</li>
					@endif

			
					<li class="nav-item active">
						<span class="nav-link font-weight-bold"><i class="fa-solid fa-user-plus ml-5"></i><span class="sr-only"></span></span>
					</li>


					@if (\Request::is('login'))
					<li class="nav-item active">
						<span class="nav-link font-weight-bold" data-toggle="tooltip" data-placement="right" title="Login"> <i class="fa-solid fa-right-to-bracket"></i><span class="sr-only">(current)</span></span>
					</li>
					@else
					<li class="nav-item active">
						<a class="nav-link font-weight-bold" href="{{ route('login') }}"  data-toggle="tooltip" data-placement="right" title="Login"><i class="fa-solid fa-right-to-bracket"></i></a>
					</li>
					@endif
				
				</ul>
			</div>
		</div>
	</div>
</nav>