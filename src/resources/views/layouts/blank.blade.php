<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto" class="@yield('layout-name','blank')">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{ url('') }}">
	<meta name="lang" content="{{ app()->getLocale() }}">

	{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
	<meta name="viewport" content="minimum-scale=1,initial-scale=1,width=device-width">

	@yield('meta')

	<title>@yield('title') | {{ config('app.name')}}</title>


	{{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css"> --}}

	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

	@yield('pre-css')
	
	@hasSection('replace-css')
		@yield('replace-css')
	@else
	<link href="{{ asset('vendor/ajtarragona/css/t-components-style.css') }}" rel="stylesheet">
	@endif
	
	@livewireStyles

	@yield('css')
	
	
	
	@hasSection('pre-js')
		@yield('pre-js')
	@endif
	<!-- Alpine Plugins -->
	{{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script> --}}
	{{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script> --}}
	{{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script> --}}
	{{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script> --}}

	<!-- Alpine Core -->
	{{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

	{{-- <script defer src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script> --}}

	{{-- <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script> --}}

	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


	{{-- <script src="{{ asset('vendor/ajtarragona/js/tComponents.js') }}" data-turbolinks-suppress-warning></script> --}}
	<script src="{{ asset('vendor/ajtarragona/js/tComponents.js') }}" ></script>

    @livewireScripts 

	@yield('js')


</head>

<body class="on-top">
		
	@yield('content')
	
	<div id="calendars-container"></div>
	@include('t-components::layouts.common.confirm')
	@yield('footer-js')

</body>
</html>