<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="ltr">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    {{-- CSRF Token --}}
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>@yield('title') | {{ config('app.name') }}</title>

	    {{-- Favicons --}}
	    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" sizes="32x32" />
	    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}" />
	    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" sizes="192x192" />
	    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicon.png') }}" />

	    {{-- CSS Files --}}
	    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	</head>
	
	<body>

		{{-- Content --}}
	    <div id="ebazar-layout" class="theme-blue">
	        <div class="main p-2 py-3 p-xl-5 ">
	        	<div class="body d-flex p-0 p-xl-5">
				    <div class="container-xxl">

				        <div class="row g-0">
				            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
				                <div style="max-width: 25rem;">
				                    <div class="text-center mb-5">
				                    	<i class="icofont-skull-face text-primary" style="font-size: 90px;"></i>
				                    </div>
				                    <div class="mb-5">
				                        <h2 class="color-900 text-center">
				                        	{{ __('Панель управления сайтом') }}
				                        </h2>
				                    </div>
				                    <div>
				                        <img src="{{ asset('assets/img/login-img.png') }}" width="406" alt="login-img">
				                    </div>
				                </div>
				            </div>

				            @yield('content')
				        </div>

				    </div>
				</div>
	        </div>
	    </div>

	    {{-- JS Files --}}
	    <script src="{{ asset('assets/js/libscripts.bundle.js') }}"></script>
	</body>
</html>
