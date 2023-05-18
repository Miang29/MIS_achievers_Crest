<!DOCTYPE html>
<html lang="en">
	<head>
		{{-- META DATA --}}
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		{{-- SITE META --}}
		<meta name="author" content="Code Senpai, Project on Rush">
		<meta name="type" content="website">
		<meta name="title" content="{{ env('APP_NAME') }}">
		<meta name="description" content="{{ env('APP_DESC') }}">
		<meta name="image" content="{{asset('/images/main/logo2.png')}}">
		<meta name="keywords" content="Soulace, Funeral, Parlor, Funeral Parlor">
		<meta name="application-name" content="{{ env('APP_NAME') }}">

		{{-- TWITTER META --}}
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="{{ env('APP_NAME') }}">
		<meta name="twitter:description" content="{{ env('APP_DESC') }}">
		<meta name="twitter:image" content="{{asset('/images/main/logo2.png')}}">

		{{-- OG META --}}
		<meta name="og:url" content="{{Request::url()}}">
		<meta name="og:type" content="website">
		<meta name="og:title" content="{{ env('APP_NAME') }}">
		<meta name="og:description" content="{{ env('APP_DESC') }}">
		<meta name="og:image" content="{{asset('/images/main/logo2.png')}}">

		{{-- JQUERY / SWAL2 / FONTAWESOME 6 / SUMMERNOTE --}}
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

		{{-- Removes the code that shows up when script is disabled/not allowed/blocked --}}
		<script style="display: none;" type="text/javascript" id="for-js-disabled-js">$('head').append('<style id="for-js-disabled">#js-disabled { display: none; }</style>');$(document).ready(function() {$('#js-disabled').remove();$('#for-js-disabled').remove();$('#for-js-disabled-js').remove();});</script>

		{{-- Custom CSS --}}
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<style type="text/css"> * { -webkit-print-color-adjust: exact!important; } </style>

		{{-- html2pdf 0.10.1 --}}
		<script type="application/javascript" src="{{ asset('js/lib/html2pdf.js') }}"></script>

		{{-- Favicon --}}
		<link rel="icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="shortcut icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="apple-touch-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		<link rel="mask-icon" href="{{ App\Settings::getInstance('web-logo')->getImage(!App\Settings::getInstance('web-logo')->is_file) }}">
		
		{{-- Title --}}
		<title>Print Report - {{ App\Settings::getValue('web-name') }}
			
		</title>
	</head>

	<body>
		<div class="container-fluid my-2 mx-0 px-3">
			<h2 class="mb-3"><b>{{ ucfirst($type) }}</b></h2>
			<h4>{{ $from->format('M d, Y') }} - {{ $to->format('M d, Y') }}</h4>

			<div class="col-lg-12 col-12 col-md-12 mx-auto">
				<img src="{{ asset('uploads/settings/banner.png') }}" style="max-height: 2.15rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}"/> Veterinary Clinic</h2>
			</div>
			{{-- TABLE START --}}
			<table class="table table-striped m-0 p-0 text-center" id="asd">
				@if (in_array($type, ['users', 'clients', 'pets', 'appointments', 'inventory', 'transaction-sales', 'transaction-services', 'transaction-vaccination', 'transaction-grooming', 'transaction-boarding', 'transaction-other', 'services']))
					@include("admin.report.types.{$type}", ['data' => $data])
				@else
				<tbody>
					<tr>
						<td class="text-center">Report type doesn't exists...</td>
					</tr>
				</tbody>
				@endif
			</table>
			{{-- TABLE END --}}
		</div>

		<script type="text/javascript">
			$(document).ready(() => {
				@if ($output == 'print')
				document.getElementById("asd");

				window.onload = () => { 
					window.print();
				};

				window.onafterprint = () => {
					window.close();
				}
				@elseif ($output == 'pdf')

				let isConverted = html2pdf()
					.from($('html').html())
					.save(
						"Report for {{ ucfirst($type) }} ({{ $from->format('M d, Y') }} - {{ $to->format('M d, Y') }})"
						);

				let interval = setInterval(() => {
					if (isConverted._state == 1) {
						console.log("Finished...");
						clearInterval(interval);
						window.close();
					}
				}, 0);
				@endif
			});
		</script>
	</body>
</html>