@extends('t-components::layouts.blank')

@section('layout-name','tgn-web')
@section('replace-css')
	<link href="{{ asset('vendor/ajtarragona/css/tgn-web.css') }}" rel="stylesheet">
@endsection


@section('content')

	@include('t-components::layouts.tgn-web.bannerzone')

	<main role="main" id="main-container" class="container pt-3">
			@yield('body')
	</main>

@endsection