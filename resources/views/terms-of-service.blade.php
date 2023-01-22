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

    <main class="card mt-5 h-50 mx-auto js-only w-50 w-lg-75 w-md-50 w-xs-75 shadow mb-5 bg-white rounded border-info" id="content">
        <p class="mr-3 ml-3 mt-3 text-justify"><b>Parts of this Agreement</b><br>This Agreement consists of the following terms and services (hereinafter the “General Terms”) and terms and services, if any, specific to the use of individual Services (hereinafter the “Service Specific Terms”). The General Terms and Service Specific Terms are collectively referred to as the “Terms”. In the event of a conflict between the General Terms and Service Specific Terms, the Service Specific Terms shall prevail.</p>
        <p class="mr-3 ml-3 text-justify"><b>Description of Service</b><br>We provide services for online appointments. You may connect to the Services using any Internet browser supported by the Services. You are responsible for obtaining access to the Internet and the equipment necessary to use the Services. You can create an account with your user account also you can set the service you want.</p>
        <p class="mr-3 ml-3 mt-3 text-justify"><b>User Sign-up Obligations</b><br>You need to sign up for a user account by providing all required information including user name, password, email address, contact, and contact to access or use the Services. You agree to a) provide true, accurate, current, and complete information about yourself as prompted by the sign-up process; and b) maintain and promptly update the information provided during sign-up to keep it true, accurate, current, and complete.</p>
        <p class="mr-3 ml-3 text-justify"><b>Registration</b><br>We need to maintain accurate records of our clients and patients. To do so, we will periodically ask you to confirm the details we hold. If your details change, please inform us promptly so we can ensure our database is up to date. This will also ensure that you receive all correspondence regarding your pets health.</p>
        <p class="mr-3 ml-3 text-justify"><b>Appointments, Booking, and Cancellations</b><br>Appointments and Bookings are made accordingly to ensure that our Veterinarians and staff have enough time with our clients and their pet(s) to address their health concerns. Walk-in appointments are sometimes necessary, they can have a massive impact on not only the Veterinary Team but also the wait times of every client waiting for Veterinary Care. We strongly emphasize the importance of bookings and advise that walk-in appointments will have to wait until time allows for us to see them unless it is identified as an emergency. is also best that the number of conditions presented in a standard 20-minute appointment be limited to a maximum of two. This is to ensure that the consulting Veterinarian wont run out of time to discuss your pets health concerns. If you feel like your appointment will require longer or you wish to discuss more than two conditions, please advise reception when booking your appointment. This way we can make sure your booking will have the appropriate time to discuss everything you wish (extra costs will apply). 
        Appointments that run overtime or run out of hours will also incur extra charges. Late cancellation of appointments is a major inconvenience to our Veterinarians and to other clients who are needing Veterinary Care. We understand that in some cases events can occur meaning your appointments may need to.</p>
      
    </main>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</body>

</html>