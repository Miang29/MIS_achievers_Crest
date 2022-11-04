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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

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

        <div class="d-flex flex-column min-vh-100 js-only">
            <!-- HEADER -->
            <header class="header dark-shadow">
                @include('components.user.header')
            </header>

            <main class="content-fluid d-flex flex-column flex-fill m-0" id="content">
			<div class="container-fluid d-flex flex-column flex-grow-1 px-0">
				<div class="d-flex flex-d-row flex-grow-1 position-relative h-100" style="overflow: hidden;">
                
					{{-- CONTENT --}}
					<div class="container-fluid content flex-fill bg-5 m-0" style="z-index: 1;">
					@yield('content')
					</div>
				</div>
			</div>
		</main>

        </div>
</body>

</html>