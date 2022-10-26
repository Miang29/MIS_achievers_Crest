<!DOCTYPE html>
<html lang="en-US">

<head>
	{{-- META DATA --}}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	{{-- SITE META --}}
	<meta name="type" content="website">
	<meta name="title" content="{{ App\Settings::getValue('web-name') }}">
	<meta name="description" content="{{ App\Settings::getValue('web-desc') }}">
	<meta name="image" content="{{ asset('images/meta-banner.jpg') }}">
	<meta name="keywords" content="{{ env('APP_KEYW') }}">
	<meta name="application-name" content="{{ App\Settings::getValue('web-name') }}">

	{{-- TWITTER META --}}
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{{ App\Settings::getValue('web-name') }}">
	<meta name="twitter:description" content="{{ App\Settings::getValue('web-desc') }}">
	<meta name="twitter:image" content="{{asset('/images/meta-banner.jpg')}}">

	{{-- OG META --}}
	<meta name="og:url" content="{{Request::url()}}">
	<meta name="og:type" content="website">
	<meta name="og:title" content="{{ App\Settings::getValue('web-name') }}">
	<meta name="og:description" content="{{ App\Settings::getValue('web-desc') }}">
	<meta name="og:image" content="{{asset('/images/meta-banner.jpg')}}">

	@yield('meta')

	{{-- jQuery 3.6.0 --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	{{-- jQuery UI 1.12.1 --}}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	{{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
	<script type="text/javascript" id="for-js-disabled-js">
		$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');
		$(document).ready(function() {
			$('#js-disabled').remove();
			$('#for-js-disabled').remove();
			$('#for-js-disabled-js').remove();
		});
	</script>

	{{-- popper.js 1.16.0 --}}
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	{{-- Bootstrap 4.4 --}}
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	{{-- Sweet Alert 2 --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	{{-- Chart.js 3.1.1 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>

	{{-- Fontawesome --}}
	<script src="https://kit.fontawesome.com/d4492f0e4d.js" crossorigin="anonymous"></script>

	{{-- Input Mask 5.0.5 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>

	{{-- Bootstrap Select 1.13.18 --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>

	{{-- CSS --}}
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

	@yield('css')

	{{-- FAVICON --}}
	<link rel="icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
	<link rel="shortcut icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
	<link rel="apple-touch-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
	<link rel="mask-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">

	{{-- TITLE --}}
	<title>@yield('title') - {{ App\Settings::getValue('web-name') }}</title>
</head>

<body style="max-height: 100vh; height: 100vh;" class="overflow-y-hidden">
	{{-- SHOWS THIS INSTEAD WHEN JAVASCRIPT IS DISABLED --}}
	<div style="position: absolute; height: 100vh; width: 100vw; background-color: #ccc;" id="js-disabled">
		<style type="text/css">
			/* Make the element disappear if JavaScript isn't allowed */
			.js-only {
				display: none !important;
			}
		</style>
		<div class="row h-100">
			<div class="col-12 col-md-4 offset-md-4 py-5 my-auto">
				<div class="card shadow my-auto">
					<h4 class="card-header card-title text-center">Javascript is Disabled</h4>

					<div class="card-body">
						<p class="card-text">This website required <b>JavaScript</b> to run. Please allow/enable JavaScript and refresh the page.</p>
						<p class="card-text">If the JavaScript is enabled or allowed, please check your firewall as they might be the one disabling JavaScript.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="d-flex flex-column min-vh-100 js-only">
		<!-- HEADER -->
		<header class="header dark-shadow">
			@include('components.admin.header')
		</header>

		<!-- CONTENTS -->
		<main class="content-fluid d-flex flex-column flex-fill m-0" id="content">
			<div class="container-fluid d-flex flex-column flex-grow-1 px-0">
				<div class="d-flex flex-d-row flex-grow-1 position-relative h-100" style="overflow: hidden;">
					{{-- SIDEBAR --}}
					@include('components.admin.sidebar')

					{{-- CONTENT --}}
					<div class="container-fluid content flex-fill bg-5 mx-auto">
					@yield('content')
					</div>
				</div>
			</div>
		</main>

		<!-- SCRIPTS -->
		<script type="text/javascript">
			const fiFallbackImage = '{{ asset("uploads/settings/default.png") }}';
		</script>
		<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/util/fallback-image.js') }}"></script>
		<script type="text/javascript">
			@if(Session::has('flash_error'))
			Swal.fire({
				{
					!!Session::has('has_icon') ? "icon: `error`," : ""!!
				}
				title: `{{Session::get('flash_error')}}`,
				{
					!!Session::has('message') ? 'html: `'.Session::get('message').
					'`,' : ''!!
				}
				position: {
					!!Session::has('position') ? '`'.Session::get('position').
					'`' : '`top`'!!
				},
				showConfirmButton: false,
				toast: {
					!!Session::has('is_toast') ? Session::get('is_toast'): true!!
				},
				{
					!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).
						',' : `timer: 10000,`) : '') : `timer: 10000,`!!
				}
				background: `#dc3545`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			});
			@elseif(Session::has('flash_info'))
			Swal.fire({
				{
					!!Session::has('has_icon') ? "icon: `info`," : ""!!
				}
				title: `{{Session::get('flash_info')}}`,
				{
					!!Session::has('message') ? 'html: `'.Session::get('message').
					'`,' : ''!!
				}
				position: {
					!!Session::has('position') ? '`'.Session::get('position').
					'`' : '`top`'!!
				},
				showConfirmButton: false,
				toast: {
					!!Session::has('is_toast') ? Session::get('is_toast'): true!!
				},
				{
					!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).
						',' : `timer: 10000,`) : '') : `timer: 10000,`!!
				}
				background: `#17a2b8`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			});
			@elseif(Session::has('flash_success'))
			Swal.fire({
				{
					!!Session::has('has_icon') ? "icon: `success`," : ""!!
				}
				title: `{{Session::get('flash_success')}}`,
				{
					!!Session::has('message') ? 'html: `'.Session::get('message').
					'`,' : ''!!
				}
				position: {
					!!Session::has('position') ? '`'.Session::get('position').
					'`' : '`top`'!!
				},
				showConfirmButton: false,
				toast: {
					!!Session::has('is_toast') ? Session::get('is_toast'): true!!
				},
				{
					!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).
						',' : `timer: 10000,`) : '') : `timer: 10000,`!!
				}
				background: `#28a745`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			});
			@endif

			$(document).ready(function() {
				$(".col-a").click(function() {
					$('.collapse.show').collapse('hide');
				});
			});
		</script>
		@yield('scripts')
	</div>
</body>

</html>