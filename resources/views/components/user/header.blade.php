{{-- Navigation Bar (TOP) --}}
<nav class="navbar navbar-expand-lg navbar-light bg-1 position-sticky position-lg-relative dark-shadow py-0 px-3" style="z-index: 1000;">
	<div class="container-fluid">
		{{-- Branding --}}
		<a class="navbar-brand m-2 py-0 font-weight-bold text-white" href="#" style="height: auto;">
			<img src="{{ asset('uploads/settings/banner-white.png') }}" style="max-height: 2.25rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}" />
			Veterinary Clinic
		</a>

		<div class="d-flex flex-row">
			{{-- Navbar contents --}}
			<div class="navbar-collapse" id="navbar">
				<div class="ml-auto">


					<ul class="navbar-nav mr-auto">

						<li class="nav-item ">
							<a class="nav-link font-weight-bold text-white Active " href="#"><i class="fa-solid fa-house mr-2"></i>Home <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link font-weight-bold text-white" href="#"><i class="fa-solid fa-circle-info mr-2"></i>About</a>
						</li>

						<li class="nav-item">
							<a class="nav-link font-weight-bold text-white" href="#"><i class="fa-solid fa-phone mr-2"></i>Contact Us</a>
						</li>

						<li class="nav-item">
							<a class="nav-link font-weight-bold text-white" href="#"><i class="fa-solid fa-calendar mr-2"></i>Appointment</a>
						</li>

					</ul>

				</div>
			</div>

			{{-- Navbar Toggler --}}
			<button class="sidebar-toggler" type="button" data-toggle="sidebar-collapse" data-target="#sidebar" aria-controls="sidebar" aria-label="Toggle Sidebar" id="sidebar-toggler">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
</nav>