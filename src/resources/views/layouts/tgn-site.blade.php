<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto" class="tgn-site">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{ url('') }}">
	<meta name="lang" content="{{ app()->getLocale() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

	<title>@yield('title') | {{ config('app.name')}}</title>
	
	<link href="{{ asset('vendor/ajtarragona/css/tgn-site.css') }}" rel="stylesheet">

	@yield('css')
	
	@livewireStyles

	
	<!-- Alpine Plugins -->
	<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>

	<!-- Alpine Core -->
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

	<script defer src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
	<script src="{{ asset('vendor/ajtarragona/js/t-components.js') }}" data-turbolinks-suppress-warning></script>

	@livewireScripts
	@yield('js')
	

</head>

<body class="on-top">



	@include('t-components::layouts.tgn-site.bannerzone')

	<main role="main" id="main-container" class="container pt-3">
			@yield('body')
	</main>

	<div id="calendars-container"></div>
	<livewire:t-modals-container /> 

</body>
</html>