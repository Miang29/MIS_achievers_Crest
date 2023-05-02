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
		
		{{-- CSS --}}
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
		<link href="{{ asset('css/user.css') }}" rel="stylesheet">
	
		{{-- Title --}}
		<title>	  
		Print Clinical History - {{ App\Settings::getValue('web-name') }}
	
		</title>

	</head>

	<body>

		<div class="container-fluid my-2 mx-0 px-3" id="history">
			<div class="card">
				<h2 class="card-header text-center text-white bg-1">
							<img src="{{ asset('uploads/settings/banner-white.png') }}" style="max-height: 2.25rem;" class="m-0 p-0" alt="MIS Nano" data-fallback-img="{{ asset('uploads/settings/default.png') }}"/> Veterinary Clinical History</h2>

				<div class="card-body">
					{{-- PET OWNER INFORMATION --}}
	            
	                    <div class="input-group flex-nowrap col-lg-12 col-12 col-md-12">
						  <div class="input-group-prepend">
						    <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Pet Owner :</span>
						  </div>
						  	<input value="{{ $pet->user->getName() }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
						</div>

						<div class="input-group flex-nowrap col-lg-12 col-12 col-md-12">
						  <div class="input-group-prepend">
						    <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Address :</span>
						  </div>
						  	<input value="{{ $pet->user->address }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
						</div>
					
						<div class="input-group flex-nowrap col-lg-12 col-12 col-md-12">
						  <div class="input-group-prepend">
						    <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Email :</span>
						  </div>
						  	<input value="{{ $pet->user->email }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
						</div>
	                
	                {{-- PET INFORMATION --}}
		            <div class="card border border-white mx-auto col-lg-12 col-12 col-md-12 mt-5">
                		 <div class="card col-lg-12 ml-2">
                		 	<h3 class="mx-auto mt-3">Pet Information</h3>

                		 	  <div class="col-lg-4 col-12 col-md-4 mx-auto text-center">  
							   	<img src="{{ $pet->getImage() }}" alt="Pet Image" class="img-thumbnail getImage mt-3">
                        		<span class="font-weight-bold mx-auto text-center mt-2">{{ $pet->pet_name }}</span>
							  </div>

                		 	<div class="row">
	                           <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mx-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Birthdate :</span>
						 		 </div>
						  			<input value="{{ $pet->birthdate }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>

							   <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mr-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Gender :</span>
						 		 </div>
						  			<input value="{{ $pet->gender }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>
							</div>

							<div class="row">
	                           <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mx-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Color/s :</span>
						 		 </div>
						  			<input value="{{ $pet->colors }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>

							   <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mr-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Breed :</span>
						 		 </div>
						  			<input value="{{ $pet->breed }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>
							</div>

							<div class="row">
	                           <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mx-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Species :</span>
						 		 </div>
						  			<input value="{{ $pet->species }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>

							   <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mr-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Type :</span>
						 		 </div>
						  			<input value="{{ $pet->types }}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>
							 </div>
						</div>
		            </div>
		             {{-- CLINICAL HISTORY --}}
		             <div class="card mt-3 border border-white">
		             	 <div class="card my-3 ml-3">
                		 	<h3 class="mx-auto mt-3">Clinical History</h3>
	                		 <div class="row">
	                           <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mx-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Weight :</span>
						 		 </div>
						  			<input value="{{-- $pet->species --}}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>

							   <div class="input-group flex-nowrap col-lg-5 mb-3 mt-3 mr-auto">
							 	 <div class="input-group-prepend">
							        <span class="input-group-text border border-white bg-white font-weight-bold" id="addon-wrapping">Temperature :</span>
						 		 </div>
						  			<input value="{{-- $pet->types --}}" type="text" class="form-control border-right-0 border-left-0 border-top-0 border-bottom border-secondary" aria-describedby="addon-wrapping">
							   </div>
							</div>
                		 </div>
		             </div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(() => {
				@if ($output == 'print')
				document.getElementById("history");
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
						"Clinical History {{ $pet->pet_name }}"
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
