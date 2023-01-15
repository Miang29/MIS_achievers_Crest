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
    <title>Privacy Policy</title>
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

    <main class="card  h-50 mx-auto js-only w-50 w-lg-75 w-md-50 w-xs-75 shadow mt-5 mb-5 bg-white rounded border-info">
        <p class="mr-3 ml-3 mt-3 text-justify"><b>Privacy Policy</b><br>Privacy of personal information is an important principle to the <i>Nano Veterinary Clinic</i>. We are committed to protecting, collecting, using and disclosing your personal information responsibly and developing a website that gives you the most powerful and safe online experience. By using this website you consent to the data practices described in this statement.</p>
        <p class="mr-3 ml-3 text-justify"><b>Collection of your Personal Information</b><br>This Practice collects personally identifiable information, such as your email address, name, home address, or telephone number.This Practice also collects information about your pet such as your pets name, breed and the type of service needed. This Practice does not sell, rent or lease its customer lists to third parties. All such third parties are prohibited from using your personal information except to provide these services, and they are required to maintain the confidentiality of your data. </p>
        <p class="mr-3 ml-3 text-justify"><b>Use of Cookies</b><br>The website uses “cookies” to help this Practice personalize your online experience. A cookie is a text file that is placed on your hard disk by a website server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you and can only be read by a web server in the domain that issued the cookie to you.</p>
        <p class="mr-3 ml-3 text-justify"><b>Security of your Personal Information</b><br>This Practice secures your personal information from unauthorized access, use, or disclosure. This Practice secures the personally identifiable information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. When personal information (such as a credit card number) is transmitted to other websites, it is protected through encryption.</p>
        <p class="mr-3 ml-3 text-justify"><b>Changes to this Policy</b><br>Please note that this Privacy Policy may change over the time to reflect clinic and customer feedback. We encourage you to occasionally review this statement to inform  how this practice is protecting your information.</p> 
    </main>

    <!-- SCRIPTS -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</body>

</html>