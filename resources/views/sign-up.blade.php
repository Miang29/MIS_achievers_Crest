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
    <title>User Login-Nano Management Information System, Taytay Rizal</title>
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
    <br><br><br>
    <main class="card  h-50 mx-auto js-only w-50 w-lg-50 w-md-50 w-xs-75 shadow mb-5 bg-white rounded border-info" id="content">
        <div class="card-header text-center d-flex flex-column" style="background-color:#021f53;">
            <h1 class="w-100 w-lg-75 mx-auto text-monospace" style="color:white; font-weight:Bold; font-size: 2.6rem;">Create Your Account</h1>
        </div>
        <div class="card-body d-flex flex-column flex-lg-row min-vh-25 ">

            <div class="col-12 col-lg-8 mx-auto">
                <div class="my-auto">

                    {{-- SIGN UP FORM START --}}
                    <form method="POST" class="form mx-auto">
                        {{ csrf_field() }}

                        <div class="form-group floating-label-group">
                            <input class="form-control border-secondary text-dark floating-label-input" type="text" name="name" value="{{ old('name') }}" aria-label="Name" placeholder=" " />
                            <label class="form-label text-dark bg-transparent floating-label" for="name">Name</label>
                        </div>

                        <div class="form-group floating-label-group">
                            <input class="form-control border-secondary text-dark floating-label-input" type="text" name="email" value="{{ old('email') }}" aria-label="Email" placeholder=" " />
                            <label class="form-label text-dark bg-transparent floating-label" for="email">Email</label>
                        </div>

                        <div class="form-group floating-label-group">
                            <input class="form-control border-secondary text-dark floating-label-input" type="text" name="username" value="{{ old('username') }}" aria-label="Username" placeholder=" " />
                            <label class="form-label text-dark bg-transparent floating-label" for="username">Username</label>
                        </div>

                        <div class="form-group">
                            <div class="input-group floating-label-group">
                                <input class="form-control border-secondary text-dark floating-label-input" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" placeholder=" " />
                                <label class="form-label text-dark bg-transparent floating-label" for="password">Password</label>

                                <button type="button" class="btn text-dark floating-eye-pass p-1" id="toggle-show-password" aria-label="Show Password" data-target="#password">
                                    <i class="fas fa-eye d-none" id="show"></i>
                                    <i class="fas fa-eye-slash" id="hide"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group floating-label-group">
                                <input class="form-control border-secondary text-dark floating-label-input" type="password" name="password_confirmation" id="password_confirmation" aria-label="Password_confirmation" aria-describedby="toggle-show-password" placeholder=" " />
                                <label class="form-label text-dark bg-transparent floating-label" for="password_confirmation">Confirm Password</label>

                                <button type="button" class="btn text-dark floating-eye-pass p-1" id="toggle-show-password" aria-label="Show Password" data-target="#password_confirmation">
                                    <i class="fas fa-eye d-none" id="show"></i>
                                    <i class="fas fa-eye-slash" id="hide"></i>
                                </button>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label text-justify" for="customCheck1">By checking this you accept the terms of use and handling of your data by this website in accordance with our <a href="#">Privacy Policy.</a></label>
                        </div>

                        <div class="form-group text-center my-3">
                            <button type="submit" class="btn btn-outline-dark w-100 font-weight-bold">Register</button>
                        </div>

                        <h6 class="text-center">Already registered? <a href="{{ route('login') }}">Login</a></h6>
                    </form>
                    {{-- LOGIN FORM END --}}
                </div>
            </div>

        </div>
    </main>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
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
                    ',' : `timer: 10000,`) : 'timer: 5000,') : `timer: 10000,`!!
            }
            background: `#28a745`,
            customClass: {
                title: `text-white`,
                content: `text-white`,
                popup: `px-3`
            },
        });
        @endif
    </script>
</body>

</html>