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

    {{-- JQUERY / SWAL2 / FONTAWESOME 6 / SUMMERNOTE / FULLCALENDAR / CHART.JS --}}
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
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util/floating-label.css') }}" rel="stylesheet">

    {{-- FAVICON --}}
    <link rel="icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
    <link rel="shortcut icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
    <link rel="apple-touch-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
    <link rel="mask-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">

    {{-- TITLE --}}
    <title>Terms of Service</title>
</head>

<body>
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
    
    <main class="card  h-50 mx-auto js-only w-50 w-lg-50 w-md-50 w-xs-75 shadow mb-5 bg-white rounded border-info" id="content">
    </main>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</body>

</html>