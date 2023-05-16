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

		{{-- JQUERY / SWAL2 / FONTAWESOME 6  SUMMERNOTE --}}
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>

		{{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
		<script type="text/javascript" id="for-js-disabled-js">
			$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');
			$(document).ready(function() {
				$('#js-disabled').remove();
				$('#for-js-disabled').remove();
				$('#for-js-disabled-js').remove();
			});
		</script>

		{{-- CSS --}}
		@yield('pre-css')
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
		<link href="{{ asset('css/user.css') }}" rel="stylesheet">
		@yield('post-css')

		{{-- FAVICON --}}
		<link rel="icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="shortcut icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="apple-touch-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="mask-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">

		{{-- TITLE --}}
		<title>@yield('title') - {{ App\Settings::getValue('web-name') }}</title>
	</head>

	<body style="max-height: 100vh; max-width: 100% ;height: 100vh;" class="overflow-y-hidden position-relative">
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

		{{-- MAIN BODY --}}
		<div class="d-flex flex-column min-vh-100 js-only">
			<!-- HEADER -->
			<header class="header dark-shadow">
				@include('components.user.header')
			</header>

			<!-- CONTENTS -->
			<main class="content-fluid d-flex flex-fill m-0" id="content">
				{{-- CONTENT --}}
				<div class="container-fluid content flex-fill bg-white m-0 px-0" style="z-index: 1;" data-spy="scroll" data-target="#navbar" data-offset="56.3">
					@yield('content')
				</div>
			</main>
		</div>

		@yield('pre-script')
		<script type="text/javascript">
			@if(Session::has('flash_error'))
			Swal.fire({
				{!!Session::has('has_icon') ? "icon: `error`," : ""!!}
				title: `{{Session::get('flash_error')}}`,
				{!!Session::has('message') ? 'html: `'.Session::get('message').'`,' : ''!!}
				position: {!!Session::has('position') ? '`'.Session::get('position').'`' : '`top`'!!},
				showConfirmButton: false,
				toast: {!!Session::has('is_toast') ? Session::get('is_toast'): true!!},
				{!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).',' : `timer: 10000,`) : 'timer: 5000,') : `timer: 10000,`!!}
				background: `#dc3545`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			});
			@elseif(Session::has('flash_info'))
			Swal.fire({
				{!!Session::has('has_icon') ? "icon: `info`," : ""!!}
				title: `{{Session::get('flash_info')}}`,
				{!!Session::has('message') ? 'html: `'.Session::get('message').'`,' : ''!!}
				position: {!!Session::has('position') ? '`'.Session::get('position').'`' : '`top`'!!},
				showConfirmButton: false,
				toast: {!!Session::has('is_toast') ? Session::get('is_toast'): true!!},
				{!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).',' : `timer: 10000,`) : 'timer: 5000,') : `timer: 10000,`!!}
				background: `#17a2b8`,
				customClass: {
					title: `text-white`,
					content: `text-white`,
					popup: `px-3`
				},
			});
			@elseif(Session::has('flash_success'))
			Swal.fire({
				{!!Session::has('has_icon') ? "icon: `success`," : ""!!}
				title: `{{Session::get('flash_success')}}`,
				{!!Session::has('message') ? 'html: `'.Session::get('message').'`,' : ''!!}
				position: {!!Session::has('position') ? '`'.Session::get('position').'`' : '`top`'!!},
				showConfirmButton: false,
				toast: {!!Session::has('is_toast') ? Session::get('is_toast'): true!!},
				{!!Session::has('has_timer') ? (Session::get('has_timer') ? (Session::has('duration') ? ('timer: '.Session::get('duration')).',' : `timer: 10000,`) : 'timer: 5000,') : `timer: 10000,`!!}
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

				$("[data-toggle=tooltip]").tooltip();
			});
		</script>
		@yield('post-script')
	</body>
</html>