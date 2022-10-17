<!DOCTYPE html>
<html>
	<head>
		{{-- META DATA --}}
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@yield('meta-data')

		{{-- SITE META --}}
		<meta name="url" content="">
		<meta name="type" content="website">
		<meta name="title" content="{{ env('APP_NAME') }}">
		<meta name="description" content="{{ env('APP_DESC') }}">
		<meta name="image" content="/images/UI/banners/faculty.jpg">
		<meta name="image:alt" content="/images/UI/banners/faculty.jpg">
		<meta name="keywords" content="">
		<meta name="application-name" content="Defensive Measures Add-on Guide">

		{{-- OG META --}}
		<meta name="og:url" content="">
		<meta name="og:type" content="website">
		<meta name="og:title" content="{{ env('APP_NAME') }}">
		<meta name="og:description" content="{{ env('APP_DESC') }}">
		<meta name="og:image" content="images/UI/banners/faculty.jpg">
		<meta name="og:image:alt" content="images/UI/banners/faculty.jpg">

		{{-- jQuery 3.6.0 --}}
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->

		{{-- jQuery UI 1.12.1 --}}
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		{{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
		<script type="text/javascript" id="for-js-disabled-js">$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');$(document).ready(function() {$('#js-disabled').remove();$('#for-js-disabled').remove();$('#for-js-disabled-js').remove();});</script>

		{{-- popper.js 1.16.0 --}}
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

		{{-- Bootstrap 4.4 --}}
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		{{-- Slick Carousel 1.9.0 --}}
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

		{{-- Sweet Alert 2 --}}
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		{{-- Chart.js 3.1.1 --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

		{{-- Summernote 0.8.18 --}}
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>

		{{-- Custom CSS --}}

		@yield('css')

		{{-- Fontawesome --}}
		<script src="https://kit.fontawesome.com/d4492f0e4d.js" crossorigin="anonymous"></script>

		{{-- Input Mask 5.0.5 --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
		{{-- Favicon --}}
		<link rel='icon' type='image/png' href='{{ asset("images/UI/favicon.png") }}'>
		
		{{-- Title --}}
		<title>{{ env('APP_NAME') }} | @yield('title')</title>
	</head>
	
	<body class="min-vh-100">
		{{-- NEW NAVBAR --}}
		<nav class="navbar navbar-expand-lg navbar-dark bg-light bg-custom">
			<a class="navbar-brand text-info font-weight-bold text-uppercase" href="#">
			<img src="{{asset('img/logo.png')}}" style= "max-height: 2.0rem">
			Veterinary Clinic </a>

			<button class="navbar-toggler bg-dark " type="button" data-toggle="collapse" data-target="#navcontent" aria-controls="navcontent" aria-expanded="false" aria-label="Toggle Navbar Content">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navcontent">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item">
						<a href="{{route('menu')}}" class="nav-link text-dark font-weight-bold"><i class="fa-solid fa-house"></i> Home</a>
					</li>

					<li class="nav-item dropdown">
       				 	 <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        				  Registration </a>

						  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         			 	<a class="dropdown-item" href="{{route('client')}}">Client Registration</a>
          				<a class="dropdown-item" href="#">Pet Registration</a>
						</div>
					
						<li class="nav-item dropdown">
       				 	 <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        				  Services </a>

						  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         			 	<a class="dropdown-item" href="#">Consultation</a>
						  <a class="dropdown-item" href="#">Pet Grooming</a>
						  <a class="dropdown-item" href="#">Pet Boarding</a>
						  <a class="dropdown-item" href="#">Vaccination</a>
						  <a class="dropdown-item" href="#">Stocks</a>
						</div>    

					<li class="nav-item">
						<a href="#" class="nav-link text-dark font-weight-bold"><i class="fa-solid fa-cash-register"></i> Transaction</a>
					</li>


					<li class="nav-item">
						<a href="#" class="nav-link text-dark font-weight-bold"><i class="fa-sharp fa-solid fa-print mr-2"></i>Reports</a>
					</li>

                    <li class="nav-item">
						<a href="#" class="nav-link text-dark font-weight-bold"><i class="fa fa-fw fa-user mr-2"></i>Users</a>
					</li>

					<li class="nav-item">
						<a href="#" class="nav-link text-dark font-weight-bold"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<div>
			@yield('content')
		</div>
	</body>
</html>