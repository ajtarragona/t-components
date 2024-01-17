@extends('t-components::layouts.blank')

@section('layout-name','tgn-form')
@section('pre-css')
	<link href="{{ asset('vendor/ajtarragona/css/tgn-form.css') }}" rel="stylesheet">
@endsection


@section('content')
	<div class="main-container">

		@include('t-components::layouts.tgn-form.header')
		
		<main role="main" id="main-container" class="container pt-3">
				@yield('body')
		</main>

		@include('t-components::layouts.tgn-form.footer')
	</div>
	

@endsection